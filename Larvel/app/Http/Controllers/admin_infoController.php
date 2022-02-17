<?php

namespace App\Http\Controllers;
use App\Models\Admin_info;


use Illuminate\Http\Request;

class admin_infoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin-registeration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
// id	name	last_name	email	phone_number	password	remember_token	created_at	updated_at	


        $admin = new Admin_info;
        $validate = $request->validate([
            'name' => 'bail|required|string|max:30',
            'last_name' => 'bail|required|string|max:30',
            'email' => 'bail|required|email|max:50',
            'phone_number' => 'bail|required|string|max:13',
            'password' => 'bail|required|string',
            'first_question' => 'bail|required|string',
            'first_answer' => 'bail|required|string',
            'second_question' => 'bail|required|string',
            'second_answer' => 'bail|required|string',
            'third_question' => 'bail|required|string',
            'third_answer' => 'bail|required|string',
            'confirm_password' => 'bail|required|string',

        ]);

        $admin->name = $request->name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone_number = $request->password;
        if($request->password === $request->confirm_password)
        {
            $admin->password = $request->password;
            if($request->first_question !== $request->second_question && $request->second_question !== $request->third_question && $request->first_question !== $request->third_question)
            {
                $admin->first_question = $request->first_question;
                $admin->first_answer = $request->first_answer;
                $admin->second_question = $request->second_question;
                $admin->second_answer = $request->second_answer;
                $admin->third_question = $request->third_question;
                $admin->third_answer = $request->third_answer;

                $admin->save();
                return redirect('login');
            }
            else{
                return back()->with('dif_questions', "د آدمېن محافظوي پوښتني باید بېل بېل وي!");
            }

        }
        else{
            return back()->with('confirm_password', "د اډمېن پاسورډ او د پاسورډ تائیدي یو شان ندي!");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
