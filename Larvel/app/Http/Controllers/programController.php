<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Result;
use App\Models\Facility;
use App\Models\Agenda;
use App\Models\Evaluation;
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
           return view('pdc-list-all-program', compact('programs', 'path'));
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
        if($request->path() === 'searchPdcProgram')
        {
            $path = '/pdcProgramList';
            $programs =  Program::where($request->search_type, $request->search_content)->get();
            return view('pdc-list-all-program', compact('programs', 'path'));
        }
        elseif($request->path() === 'pdcProgramList'){
            $request->validate([
                'name' => 'bail|required|max:255',
                'type' => 'bail|required|max:7',
                'sponsor' => 'bail|required|max:50',
                'supporter' => 'bail|required|max:50',
                'manager' => 'bail|required|max:50',
                'facilitator' => 'bail|nullable|max:50',
                'info_mobile_number' => 'bail|required|max:13',
                'participant_amount' => 'bail|required|max:3',
                'fund' => 'bail|required|max:8',
                'fund_type' => 'bail|required|max:6',
                'fee_able' => 'bail|required|max:1',
                'fee' => 'bail|required_if:fee_able,=,1|integer',
                'fee_type' => 'bail|required_if:fee_able,=,1|max:6',
                'campus_name' => 'bail|required|max:50',
                'block_name' => 'bail|required|max:50',
                'block_number' => 'bail|required|integer|between:1,30',
                'room_number' => 'bail|required|integer|between:1,30',
                'year' => 'bail|required|integer|between:1900,3000',
                'month' => 'bail|required|integer|between:1,12',
                'start_day' => 'bail|required|integer|between:1,31',
                'end_day' => 'bail|required|integer|between:1,31',
                'start_time' => 'bail|required|date_format:H:i',
                'end_time' => 'bail|required|date_format:H:i',
                'days_duration' => 'bail|required|max:2|min:1',
                'program_description' => 'bail|required|max:2000',
            ]);
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
            
            // return "done";
            // $request->session()->put('program_added', "پروګرام يه کامیابۍ سره سیسټم ته اضافه سو!");
            return back()->with('program_added', "پروګرام په کامیابۍ سره سیسټم ته اضافه سو!");
        }
        
        

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
            $programs = Program::with('getFacilities', 'getResults', 'getEvaluations', 'getAgendas', 'getPhotos', )->find($id);
            $program_id = $id;
        
            return view('pdc-program-info', compact('programs', 'program_id'));
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
    public function edit(Request $request, $id)
    {
        //
        if($request->path() === 'pdcProgramList/'.$id."/edit")
        {
            $editProgram = Program::with('getResults', 'getFacilities', 'getAgendas', 'getEvaluations')->find($id);
            return view('pdc-edit-program', compact('editProgram'));
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
        if($request->path() === 'pdcProgramList/'.$id)
        {
            
            $addProgram = Program::with('getResults', 'getFacilities', 'getAgendas', 'getEvaluations')->find($id);
            $addProgram->name = $request->name;
            $addProgram->type = $request->type;
            $addProgram->sponsor = $request->sponsor;
            $addProgram->supporter = $request->supporter;
            $addProgram->manager = $request->manager;
            $addProgram->facilitator = $request->facilitator;
            $addProgram->participant_amount = $request->participant_amount;
            $addProgram->fund = $request->fund;
            $addProgram->info_mobile_number = $request->info_mobile_number;
            $addProgram->fund_type = $request->fund_type;
            $addProgram->fee_able = $request->fee_able;
            $addProgram->fee = $request->fee;
            $addProgram->fee_type = $request->fee_type;
            $addProgram->program_description = $request->program_description;
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
            Facility::where('program_id', $id)->delete();
            foreach ($request->facility as  $value) {
                $programFacility = new Facility;
                $programFacility->facility = $value;
                $programFacility->program_id = $id;
                $programFacility->save();
                // sleep(1);
            }
            // this part belongs to Agenda Model
            Agenda::where('program_id', $id)->delete();
            foreach ($request->agenda as  $value) {
                $programAgenda = new Agenda;
                $programAgenda->agenda = $value;
                $programAgenda->program_id = $id;
                $programAgenda->save();
                // sleep(1);
            }
            // this part belongs to result Model
            Result::where('program_id', $id)->delete();
            foreach ($request->result as  $value) {
                $programResult = new Result;
                $programResult->result = $value;
                $programResult->program_id = $id;
                $programResult->save();
                // sleep(1);
            }
            // this part belongs to evaluation Model
            Evaluation::where('program_id', $id)->delete();
            foreach ($request->evaluation as  $value) {
                $programEvaluation = new Evaluation;
                $programEvaluation->evaluation = $value;
                $programEvaluation->program_id = $id;
                $programEvaluation->save();
                // sleep(1);
            }
            
            // return "done";
            return redirect('pdcProgramList');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

        if($request->path() === 'pdcProgramDelete/'.$id){
            $deleteProgram = Program::find($id);
            $deleteProgram->delete();
            return redirect('/pdcProgramList');
        }
        return $id;
    }
}
