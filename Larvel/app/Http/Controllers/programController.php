<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Result;
use App\Models\Facility;
use App\Models\Agenda;
use App\Models\Material;
Use Illuminate\Support\Facades\DB;


class programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // return $request->path();
       $programs =  Program::orderBy('id', 'desc')->get();
     
       
       $path = '/pdcProgramList';

       if($request->path() === 'pdcProgramList')
       {
           return view('list-pdc-program', compact('programs', 'path'));
       }
       else if($request->path() === 'comAllPrograms')
       {
        return view('notenrolled-program', compact('programs'));
       }
       else{
        return "path not matched!";
       }


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
        // this part is belongs to Program Model
        $addProgram = new Program;
        $addProgram->name = $request->name;
        $addProgram->type = $request->type;
        $addProgram->sponsor = $request->sponsor;
        $addProgram->supporter = $request->supporter;
        $addProgram->manager = $request->manager;
        $addProgram->facilitator = $request->facilitator;
        $addProgram->participant_amount = $request->participant_amount;
        $addProgram->fund = $request->fund;
        $addProgram->fund_type = $request->fund_type;
        $addProgram->fee_able = $request->fee_able;
        $addProgram->fee = $request->fee;
        $addProgram->fee_type = $request->fee_type;
        $addProgram->program_description = $request->program_description;
        $addProgram->facilitator_code = rand(1000000, 9000000);
        $addProgram->participant_code = rand(1000000, 9000000);
        $addProgram->year = $request->year;
        $addProgram->month = $request->month;
        $addProgram->start_day = $request->start_day;
        $addProgram->end_day = $request->end_day;
        $addProgram->start_time = $request->start_time;
        $addProgram->end_time = $request->end_time;
        $addProgram->days_duration = 12;
        $addProgram->hours_duration = 12;
        $addProgram->campus_name = $request->campus_name;
        $addProgram->block_name = $request->block_name;
        $addProgram->block_number = $request->block_number;
        $addProgram->room_number = $request->room_number;
        $addProgram->save();
        // this part belongs to Facility Model
        foreach ($request->facility as  $value) {
            $programFacility = new Facility;
            $programFacility->facility = $value;
            $programFacility->program_id = Program::max('id');
            $programFacility->save();
        }
        // this part belongs to Agenda Model
        foreach ($request->agenda as  $value) {
            $programAgenda = new Agenda;
            $programAgenda->agenda = $value;
            $programAgenda->program_id = Program::max('id');
            $programAgenda->save();
        }
      
        
        // return "done";
        return redirect('pdcProgramList');
        
        

        // $add_program->name = 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // comAllPrograms
        if($request->path() === 'comAllPrograms/'.$id)
        {
            $programs = Program::with('getFacilities', 'getResults')->find($id);
            return view('program-info', compact('programs'));
       }
        //participantEnrolledPrograms
       elseif($request->path() === 'participantEnrolledPrograms/'.$id)
       {
         $enrolledPrograms = DB::table('programs')
        ->join('programsparticipants', 'programs.id', '=', 'programsparticipants.program_id')
        ->select('programs.*')
        ->where('programsparticipants.participant_id','=' ,$id)
        ->get();
        $programsID = array();
        $rec = DB::table('programsparticipants')->where('programsparticipants.participant_id', $id)->select('program_id')->get();
        foreach ($rec as $r)
        {
           array_push( $programsID, $r->program_id);
        }
        $notEnrolledPrograms = DB::table('programs')
        ->select('programs.*')
        ->whereNotIn('id', $programsID)
        ->get();
        return view('enrolled-program', compact('enrolledPrograms','notEnrolledPrograms'));

       }
        //facilitatorEnrolledPrograms
       elseif($request->path() === 'facilitatorEnrolledPrograms/'.$id)
       {
         $enrolledPrograms = DB::table('programs')
        ->join('programsfacilitators', 'programs.id', '=', 'programsfacilitators.program_id')
        ->select('programs.*')
        ->where('programsfacilitators.facilitator_id','=' ,$id)
        ->get();
        $programsID = array();
        $rec = DB::table('programsfacilitators')->where('programsfacilitators.facilitator_id', $id)->select('program_id')->get();
        foreach ($rec as $r)
        {
           array_push( $programsID, $r->program_id);
        }
        $notEnrolledPrograms = DB::table('programs')
        ->select('programs.*')
        ->whereNotIn('id', $programsID)
        ->get();
        return view('enrolled-program', compact('enrolledPrograms','notEnrolledPrograms'));

       }
       elseif($request->path() == 'pdcProgramInfo/'.$id){
        $programs = Program::with('getFacilities', 'getResults', 'getEvaluations')->find($id);

        return view('pdc-program-info', compact('programs'));
       }
       elseif($request->path() === 'pdcProgramAttendance/'.$id){
        $participants =  DB::table('facilitatorsandparticipants')
        ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
        ->where('programsparticipants.program_id', $id)
        ->select('facilitatorsandparticipants.*')
        ->get();
        $programID = $id;
        return view('pdc-program-attendance', compact('participants', 'programID'));
       }
       else{
           return "path not found!";
       }
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
        return $id;
        return view('program-enrollment');
        // return Program::find($id);
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

        return $id;
    }
}
