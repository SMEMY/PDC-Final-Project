<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin_info;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin-registeration');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:Admin_info',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $request->validate([
            'name' => 'bail|required|string|max:30',
            'last_name' => 'bail|required|string|max:30',
            'email' => 'required|string|email|max:255|unique:Admin_info',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => 'bail|required|string|max:13',
            'first_question' => 'bail|required|string',
            'first_answer' => 'bail|required|string',
            'second_question' => 'bail|required|string',
            'second_answer' => 'bail|required|string',
            'third_question' => 'bail|required|string',
            'third_answer' => 'bail|required|string',
            'confirm_password' => 'bail|required|string',

        ]);
        $admin = Admin_info::create([
            'name' => $request->name,
            'last_name' => $request->last-name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_question' => $request->first_question,
            'first_answer' => $request->first_answer,
            'second_question' => $request->second_question,
            'second_answer' => $request->second_answer,
            'third_question' => $request->third_question,
            'third_answer' => $request->third_answer,
        ]);

        event(new Registered($admin));

        Auth::login($admin);

        return redirect(RouteServiceProvider::HOME);
    }
}
