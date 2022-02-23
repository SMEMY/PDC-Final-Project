<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\User_attendance;
use App\Models\User;
use App\Models\User_info;
use PDF;

class userAttendanceController extends Controller
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
        // return "store function!";

        // for($index = 0; $index<count($request->participant_id); $index++){
        // $validate = $request->validate([
        //     // 'presence' => 'bail|required|integer|between:1,1000',
        //     'presence.*' => 'bail|required|integer|between:1,1000',
        //     // 'absence' => 'bail|required|integer|between:1,1000',
        //     'absence.*' => 'bail|required|integer|between:1,1000',
        // ]);
        // }
        // return "done";
        $total_days = Program::find($request->program_id);
        // return count($request->participant_id);
        for ($index = 0; $index < count($request->participant_id); $index++) {
            // return $total_days->days_duration;
            if ($total_days->days_duration === $request->presence[$index] + $request->absence[$index]) {
                if ($request->absence[$index] != null && $request->presence[$index] != null) {
                    $attendance = new User_attendance;
                    $attendance->presence_days = $request->presence[$index];
                    $attendance->absence_days = $request->absence[$index];
                    $attendance->user_id = $request->participant_id[$index];
                    $attendance->program_id = $request->program_id;
                    $attendance->total_days = $request->presence[$index] + $request->absence[$index];
                    // return "dfjs";
                    $attendance->save();
                }
            } else {
                return back()->with('attendance_not_added', "د ګدونوالو د حاضري جمع، په سیسټم کي د پروګرام د ورځو د تعداد سره مساوي نه وو. نو یاد معلومات سیسټم ته اضافه نسول!");
            }
        }
        return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('attandance_added', "د پروګرام د ګډونوالو حاضري په کامیابي سره سیسټم داخل کړل سوه!");

        // return redirect('admin/pdcProgramInfo/' . $request->program_id);
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
        if ($request->path() === 'admin/pdcProgramAttendancePaper/' . $id) {
            // return "ksdjsdfsdfsdfsdffhds";
            $participants = DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
                ->select('users.*', 'user_infos.*')
                ->where('user_roles.program_id', $id)
                ->get();
            $programID = $id;
            $program = DB::table('programs')
                ->select('programs.*')
                ->where('programs.id', $programID)
                ->get();
            return view('pdc-program-attendance-paper', compact('participants', 'program'));
        } elseif ($request->path() == 'admin/pdcProgramAttendanceReport/' . $id) {
            $attendanceReport =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->join('user_attendances', 'users.id', '=', 'user_attendances.user_id')
                ->select('users.id as p_id', 'users.name', 'user_infos.last_name', 'user_attendances.*')
                ->where('user_attendances.program_id', $id)
                ->get();
            $programID = $id;
            if (count($attendanceReport) === 0) {
                return back()->with('warn', "تر اوس د یاد پروګرام حاضري سیسټم ته نده اضافه کړل سوې!");
            } else {
                return view('pdc-program-attendance-report', compact('attendanceReport', 'programID'));
            }
        } elseif ($request->path() === 'admin/pdcProgramAttendance/' . $id) {
            $participants =  DB::table('users')
                ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->select('users.*', 'user_infos.*')
                ->where([
                    ['user_roles.program_id', $id],
                    ['user_roles.role_id', 3]
                ])
                ->get();
            $programID = $id;
            // return $participants;
            $genrallParticipantIds = array();

            foreach ($participants as $participant) {
                array_push($genrallParticipantIds, $participant->id);
            }

            $enteredAttendanceParticipantIds = array();

            $unAttendancedParticipants =  DB::table('users')
                // ->join('user_attendances', 'users.id', '=', 'user_attendances.user_id')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->select('users.*', 'user_infos.*')
                // ->where([
                //     ['user_roles.program_id', $id],
                //     ['user_roles.role_id', 3]
                //     ])
                ->whereNotIn('users.id', function ($q) {
                    $q->select('user_id')->from('user_attendances');
                })
                ->get();

            // return $unAttendancedParticipants;
            if ($unAttendancedParticipants != null) {
                return view('pdc-program-attendance', compact('unAttendancedParticipants', 'programID'));
            } else {
                return back()->with('warn', "یاد پروګرام لپاره تر اوسه ګډونوال ندي اضافه کړل سوي!");
            }
            // $ParticipantsIDs = array();
            // foreach ($Participants as $participant) {
            //     array_push($ParticipantsIDs, $participant->id);
            // }
            // $participantsAttendanced =  DB::table('facilitatorsandparticipants')
            //     ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
            //     ->select('facilitatorsandparticipants.*')
            //     ->where('attendances.program_id', $id)
            //     ->get();
            // $attendancedParticipantsIDs = array();
            // foreach ($participantsAttendanced as $participant) {
            //     array_push($attendancedParticipantsIDs, $participant->id);
            // }
            // $notAttendancedParticipantsIDs = array_diff($ParticipantsIDs, $attendancedParticipantsIDs);
            // $remainAttendance = array();
            // foreach ($notAttendancedParticipantsIDs as $notID) {
            //     array_push($remainAttendance, $notID);
            // }
            // $participants =  DB::table('facilitatorsandparticipants')
            //     ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            //     ->select('facilitatorsandparticipants.*')
            //     ->whereIn('programsparticipants.participant_id', $remainAttendance)
            //     ->distinct()
            //     ->get();
            // $programID = $id;
            // $check =  DB::table('facilitatorsandparticipants')
            //     ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            //     ->select('facilitatorsandparticipants.*')
            //     ->where('programsparticipants.program_id', $id)
            //     ->get();
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
        // $participantAttendance =  DB::table('facilitatorsandparticipants')
        // ->join('attendances', 'facilitatorsandparticipants.id', '=', 'attendances.participant_id')
        // ->select('facilitatorsandparticipants.name', 'facilitatorsandparticipants.last_name', 'attendances.*')
        // ->where('attendances.id', $id)->get();

        $participantAttendance =  DB::table('users')
        ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
        ->join('user_attendances', 'users.id', '=', 'user_attendances.user_id')
        ->select('users.name','user_infos.last_name','user_attendances.*')
        ->where('user_attendances.id', $id)
        ->get();
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
        $validate = $request->validate([
            'absence' => 'bail|required|integer',
            'presence' => 'bail|required|integer',

        ]);
        if($request->path() === 'admin/pdcProgramAttendanceReport/'.$id) {

                $upddateRecord =  User_attendance::find($id);
                $upddateRecord->presence_days = $request->presence;
                $upddateRecord->absence_days = $request->absence;
                $upddateRecord->total_days = $request->presence + $request->absence;
                $upddateRecord->save();
                return redirect('admin/pdcProgramAttendanceReport/'.$request->program_id);
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

            User_attendance::where('user_id', $id)->delete();
            $check = DB::table('user_attendances')->where('Program_id', $request->program_id)->get();
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
