<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/passwordChange') {
                $request->validate([
                    'password' => 'required|string|confirmed',
                    'password_confirmation' => 'required|string',
                    'old_password' => 'bail|required|string',
                ]);
                // return Hash::make($request->new_password);
                if (Hash::check($request->old_password, auth()->user()->password)) {
                    // return "dfsdklfj";
                    DB::table('users')
                        ->where('id', auth()->user()->id)
                        ->update([
                            'password' => Hash::make($request->password),
                        ]);
                    return redirect('admin/profile/' . auth()->user()->id)->with('password_changed', 'د اډمېن پاسورډ بدلون وموند!');
                } else {
                    throw ValidationException::withMessages(['old_password' => 'پخوانی پاسورډ صحیح ندی!']);

                    return "old password incorrect!!!!!";
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        // return "sdkljfsl";
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/profile/' . auth()->user()->id) {
                $admin_info = DB::table('users')
                    ->join('user_infos', 'users.id', '=', "user_infos.user_id")
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->where([
                        ['role_user.role_id', 1],
                        ['role_user.user_id',  $request->user()->id]
                    ])
                    ->get();
                return view('admin.admin-profile', compact('admin_info'));
            } elseif ($request->path() == 'admin/passwordChange/' . auth()->user()->id) {
                // return "slkdfjskldfjsdlkfjsdlfksdjflksdjf";
                return view('admin.admin-change-password');
            } else {
                return "no path matched!";
            }
        } else {
            dd('you need to be admin');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //

        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/profile/' . auth()->user()->id . '/edit') {
                $admin_info = DB::table('users')
                    ->join('user_infos', 'users.id', '=', "user_infos.user_id")
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->where([
                        ['role_user.role_id', 1],
                        ['role_user.user_id',  $request->user()->id]
                    ])
                    ->get();
                return view('admin.admin-profile-edit', compact('admin_info'));
            }
        } else {
            dd('you need to be admin');
        }
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
        // return "sdlfjk";
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() == 'admin/profile/' . auth()->user()->id) {
                DB::table('users')
                    ->where('id', $request->admin_id)
                    ->update([
                        'name' => $request->name,
                        'email' =>  $request->email
                    ]);
                DB::table('user_infos')
                    ->where('user_id', $request->admin_id)
                    ->update([
                        'last_name' => $request->last_name,
                        'phone_number' => $request->phone_number
                    ]);
                return redirect('/admin/profile/' . auth()->user()->id)->with('profile_edited', 'د اډمېن معلومات اصلاح کړل سوه!');
            }
        }
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
