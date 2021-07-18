<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Result;
use App\Models\Facility;
use App\Models\Agenda;
use App\Models\Material;
use App\Models\Photo;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



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
        $addProgram->days_duration = $request->days_duration;;
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
            return view('not-enreolled-program-info', compact('programs'));
       }
        //participantEnrolledPrograms
      
       elseif($request->path() == 'pdcProgramInfo/'.$id){
        $programs = Program::with('getFacilities', 'getResults', 'getEvaluations', 'getAgendas', 'getPhotos')->find($id);
        return view('pdc-program-info', compact('programs'));
       }
       elseif($request->path() == 'enrolledPdcProgramInfo/'.$id){
        $programs = Program::with('getFacilities', 'getResults', 'getEvaluations')->find($id);
        return view('facil-part-enroll-program-info', compact('programs'));

       }
       elseif($request->path() === 'pdcProgramAttendance/'.$id){

        
        $attendancedParticipants =  DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where('attendances.program_id', $id)
            ->get();
            $attendancedParticipantsIDs = array();
            foreach ($attendancedParticipants as $attendancedParticipant)
            {
            array_push( $attendancedParticipantsIDs, $attendancedParticipant->id);
            }
            // return $part_IDs;

            $enrolledProgramParticipants =  DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where('programsparticipants.program_id', $id)
            ->get();
            $enrolledProgramParticipantsIDs = array();
            foreach ($enrolledProgramParticipants as $enrolledProgramParticipant)
            {
            array_push( $enrolledProgramParticipantsIDs, $enrolledProgramParticipant->id);
            }
            // return $ePart_IDs;
            $notAttendancedParticipantsIDs;
            if(count($enrolledProgramParticipantsIDs) >count( $attendancedParticipantsIDs))
            {
                $notAttendancedParticipantsIDs = array_diff( $enrolledProgramParticipantsIDs, $attendancedParticipantsIDs);
            }
            else{
                $notAttendancedParticipantsIDs = array_diff( $attendancedParticipantsIDs ,$enrolledProgramParticipantsIDs);
            }
            $finalIDs = array();
            foreach($notAttendancedParticipantsIDs as $t)
            {
                array_push($finalIDs, $t);
            }
            //  return $finalIDs;



            $participants =  DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->whereIn('programsparticipants.participant_id', $finalIDs)
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
