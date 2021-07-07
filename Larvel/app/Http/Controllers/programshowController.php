<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin_info;
use App\Models\Program;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class programshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enrolled-program');
        // return Photo::all();
        $programs = DB::table('programs')->where('programs.id', $id)
            ->join('addresses', 'addresses.id', '=', 'programs.address_id')
            ->join('times', 'times.id', '=', 'programs.time_id')
            ->select('programs.*', 'addresses.*', 'times.*')->get();
        return view('program-info', ["programs"=> $programs]);
            // return Program::find(2)->getPhoto;
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
        $admin = new Admin_info;
        $admin->name = $request->name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->password = $request->password;
        $admin->save();



        return view('notenrolled-program');
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
        $programs = DB::table('programs')->where('id',2)->get();
        // return $programs;

        return view('program-info', ['programs'=>$progrms]);

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
