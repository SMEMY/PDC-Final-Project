<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\eduProgram;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
// use App\Models\Program;

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


            $programsInYear = Program::select(
                DB::raw("(DATE_FORMAT(start_date, '%Y')) as year"),
                DB::raw("(count(id)) as programs")
            )
                ->groupBy(DB::raw("DATE_FORMAT(start_date, '%Y')"))
                ->get();

            $programsYear = array();
            $programsCount = array();

            foreach ($programsInYear as $programInYear) {
                array_push($programsYear, $programInYear->year);
                array_push($programsCount, $programInYear->programs);
            }
            $Pcount =  implode(",", $programsCount);
            $Pyear =  implode(",", $programsYear);




            $eduProgramsInYear = eduProgram::select(
                DB::raw("(DATE_FORMAT(date, '%Y')) as year"),
                DB::raw("(count(id)) as programs")
            )
                ->groupBy(DB::raw("DATE_FORMAT(date, '%Y')"))
                ->get();

            $eduProgramsYear = array();
            $eduProgramsCount = array();

            foreach ($eduProgramsInYear as $programInYear) {
                array_push($eduProgramsYear, $programInYear->year);
                array_push($eduProgramsCount, $programInYear->programs);
            }
            $eduPcount =  implode(",", $eduProgramsCount);
            $eduPyear =  implode(",", $eduProgramsYear);



            $users = count(DB::table('users')->get());

            $eduPrograms = count(DB::table('eduPrograms')->get());

            $participants = count(DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->where('role_user.role_id', 3)->distinct()->get());

            $facilitators = count(DB::table('users')->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->where('role_user.role_id', 2)->distinct()->get());



            return view('admin.index', compact('programs', 'users', 'participants', 'facilitators', 'eduPrograms', 'Pyear', 'Pcount', 'eduPcount', 'eduPyear'));
        } else {
            if (Gate::denies(ability: 'logged-in')) {
                return "no access allowed!";
            }
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
