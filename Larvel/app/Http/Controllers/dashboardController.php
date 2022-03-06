<?php

namespace App\Http\Controllers;

use App\Models\Program;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return auth()->user();
        if (Gate::allows(ability: 'is-admin')) {
            $programs = count(DB::table('programs')->get());
            $users = count(DB::table('users')->get());
            $eduPrograms = count(DB::table('eduPrograms')->get());
            $participants = count(DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', 3)->distinct()->get());
            $facilitators = count(DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', 2)->distinct()->get());
            // $users = $users - 1;

            return view('admin.index', compact('programs', 'users', 'participants', 'facilitators', 'eduPrograms'));
        } else {
            return redirect('user/userEnroledPrograms/' . auth()->user()->id);
        }
        // dd('you need to be admin');
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
