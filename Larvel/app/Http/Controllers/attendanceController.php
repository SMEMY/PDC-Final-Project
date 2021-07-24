<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
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
        //
        // return $request->program_id;
        for($index = 0; $index<count($request->participant_id); $index++){
            if($request->presence[$index] != null && $request->absence[$index]){
            $participantAttendance = new Attendance;
            $participantAttendance->presence_days = $request->presence[$index];
            $participantAttendance->absence_days = $request->absence[$index];
            $participantAttendance->participant_id = $request->participant_id[$index];
            $participantAttendance->program_id = $request->program_id;
            $participantAttendance->total_days = $request->presence[$index] +$request->absence[$index];
            $participantAttendance->save();
            }

        }

        return redirect('pdcProgramInfo/'.$request->program_id);
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
        if($request->path() === 'pdcProgramAttendancePaper/'.$id){
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
        elseif($request->path() == 'pdcProgramAttendanceReport/'.$id){
            $attendanceReport =  DB::table('facilitatorsandparticipants')
            ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
            ->select('facilitatorsandparticipants.id as p_id', 'facilitatorsandparticipants.name', 'facilitatorsandparticipants.last_name', 'attendances.*')
            ->where('attendances.program_id', $id)
            ->get();
            $programID = $id;
            $pdf = PDF::loadView('pdc-program-attendance-report',compact('attendanceReport','programID'));
            return $pdf->download('p.pdf');
            return view('pdc-program-attendance-report',compact('attendanceReport','programID'));
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
                return redirect('pdcProgramAttendanceReport/'.$request->program_id);
            }
            elseif($request->presence !== null && $request->absence === null){
                $upddateRecord =  Attendance::find($id);
                $upddateRecord->presence_days = $request->presence;
                $upddateRecord->total_days = $request->presence + $upddateRecord->absence_days;
                $upddateRecord->save();
                return redirect('pdcProgramAttendanceReport/'.$request->program_id);
            }
            else{
                $upddateRecord =  Attendance::find($id);
                $upddateRecord->presence_days = $request->presence;
                $upddateRecord->absence_days = $request->absence;
                $upddateRecord->total_days = $request->presence + $request->absence;
                $upddateRecord->save();
                return redirect('pdcProgramAttendanceReport/'.$request->program_id);
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
        if($request->path() === 'pdcProgramAttendanceReport/'.$id)
        {
            $attendance = Attendance::where('participant_id', $id)->get();
            $attendance[0]->delete();
            return redirect('pdcProgramAttendanceReport/'.$request->program_id);
        }
    }
}
