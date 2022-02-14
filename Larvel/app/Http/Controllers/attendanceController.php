<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\Program;
use App\Models\Facilitatorsandparticipant;
use PDF;
use Illuminate\Http\Request;

class attendanceController extends Controller
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
        // return "store function!";

        // for($index = 0; $index<count($request->participant_id); $index++){
            $validate = $request->validate([
                // 'presence' => 'bail|required|integer|between:1,1000',
                'presence.*' => 'bail|required|integer|between:1,1000',
                // 'absence' => 'bail|required|integer|between:1,1000',
                'absence.*' => 'bail|required|integer|between:1,1000',
            ]);
        // }
        // return "done";
        for($index = 0; $index<count($request->participant_id); $index++){
            $total_days = Program::find($request->program_id);
            // return $total_days->days_duration;
            if($total_days->days_duration === $request->presence[$index] + $request->absence[$index] ){

                if($request->absence[$index] != null && $request->presence[$index] != null){
                    $participantAttendance = new Attendance;
                    $participantAttendance->presence_days = $request->presence[$index];
                    $participantAttendance->absence_days = $request->absence[$index];
                    $participantAttendance->participant_id = $request->participant_id[$index];
                    $participantAttendance->program_id = $request->program_id;
                    $participantAttendance->total_days = $request->presence[$index] +$request->absence[$index];
                    $participantAttendance->save();
                    return redirect('admin/pdcProgramInfo/'.$request->program_id)->with('attandance_added', "د پروګرام د ګډونوالو حاضري په کامیابي سره سیسټم داخل کړل سوه!");
                }
            }
            else{
            return back()->with('attendance_not_added', "د ګدونوالو د حاضري جمع، په سیسټم کي د پروګرام د ورځو د تعداد سره مساوي نه وو. نو یاد معلومات سیسټم ته اضافه نسول!");
                
            }

        }

        return redirect('admin/pdcProgramInfo/'.$request->program_id);
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
        if($request->path() === 'admin/pdcProgramAttendancePaper/'.$id){
            $participants = DB::table('facilitatorsandparticipants')
           ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
           ->select('facilitatorsandparticipants.*')
           ->where('programsparticipants.program_id', $id)
           ->get();
           $programID = $id;
           $program = DB::table('programs')
           ->select('programs.year', 'programs.month', 'programs.start_day', 'programs.end_day', 'programs.days_duration')
           ->where('programs.id', $programID)
           ->get();
           return view('pdc-program-attendance-paper', compact('participants', 'program'));
        }
        elseif($request->path() == 'admin/pdcProgramAttendanceReport/'.$id){
            $attendanceReport =  DB::table('facilitatorsandparticipants')
            ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
            ->select('facilitatorsandparticipants.id as p_id', 'facilitatorsandparticipants.name', 'facilitatorsandparticipants.last_name', 'attendances.*')
            ->where('attendances.program_id', $id)
            ->get();
            $programID = $id;
            if(count($attendanceReport) === 0)
            {
                return back()->with('warn', "تر اوس د یاد پروګرام حاضري سیسټم ته نده اضافه کړل سوې!");
            }
            else
            {
                return view('pdc-program-attendance-report',compact('attendanceReport','programID'));
            }
        }
        elseif($request->path() === 'admin/pdcProgramAttendance/'.$id){        
            $Participants =  DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where('programsparticipants.program_id', $id)
            ->get();
            $ParticipantsIDs = array();
            foreach ($Participants as $participant)
            {
            array_push( $ParticipantsIDs, $participant->id);
            }
            $participantsAttendanced =  DB::table('facilitatorsandparticipants')
            ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where('attendances.program_id', $id)
            ->get();
            $attendancedParticipantsIDs = array();
            foreach ($participantsAttendanced as $participant)
            {
            array_push( $attendancedParticipantsIDs, $participant->id);
            }
            $notAttendancedParticipantsIDs = array_diff( $ParticipantsIDs, $attendancedParticipantsIDs);
            $remainAttendance = array();
            foreach($notAttendancedParticipantsIDs as $notID)
            {
                array_push( $remainAttendance,$notID);
            }
            $participants =  DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->whereIn('programsparticipants.participant_id', $remainAttendance)
            ->distinct()
            ->get();
            $programID = $id;
            $check =  DB::table('facilitatorsandparticipants')
            ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            ->select('facilitatorsandparticipants.*')
            ->where('programsparticipants.program_id', $id)
            ->get();
            if(count($check) !== 0)
            {
                return view('pdc-program-attendance', compact('participants', 'programID'));
            }
            else
            {
                return back()->with('warn', "یاد پروګرام لپاره تر اوسه ګډونوال ندي اضافه کړل سوي!");
            }
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
        $participantAttendance =  DB::table('facilitatorsandparticipants')
        ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
        ->select('facilitatorsandparticipants.name', 'facilitatorsandparticipants.last_name', 'attendances.*')
        ->where('attendances.id', $id)->get();
        return view('edit-pdc-program-attendance', compact('participantAttendance'));
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
        if($request->path() === 'pdcProgramAttendanceReport/'.$id) {
            if($request->presence === null && $request->absence !== null){
                $upddateRecord =  Attendance::find($id);
                $upddateRecord->absence_days = $request->absence;
                $upddateRecord->total_days = $upddateRecord->presence_days + $request->absence;
                $upddateRecord->save();
                return redirect('admin/pdcProgramAttendanceReport/'.$request->program_id);
            }
            elseif($request->presence !== null && $request->absence === null){
                $upddateRecord =  Attendance::find($id);
                $upddateRecord->presence_days = $request->presence;
                $upddateRecord->total_days = $request->presence + $upddateRecord->absence_days;
                $upddateRecord->save();
                return redirect('admin/pdcProgramAttendanceReport/'.$request->program_id);
            }
            else{
                $upddateRecord =  Attendance::find($id);
                $upddateRecord->presence_days = $request->presence;
                $upddateRecord->absence_days = $request->absence;
                $upddateRecord->total_days = $request->presence + $request->absence;
                $upddateRecord->save();
                return redirect('admin/pdcProgramAttendanceReport/'.$request->program_id);
            }
        }
        else{
            return "in update function path not matched";
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
        if($request->path() === 'admin/pdcProgramAttendanceReport/'.$id)
        {

            Attendance::where('participant_id', $id)->delete();
            $check = DB::table('attendances')->where('Program_id', $request->program_id)->get();
            if(count($check) === 0)
            {
                return redirect('admin/pdcProgramInfo/'.$request->program_id)->with('success', "د یاد پروګرام د حاضرۍ راپور په بښپړه ډول له  سیسټم څخه له منځه ولاړ!");

            }
            else{
                return back()->with('success', "د یاد ګدونوال د حاضرۍ راپور د سیسټم څخه له منځه ولاړ!");

            }
        }
    }
}
