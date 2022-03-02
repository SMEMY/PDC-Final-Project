<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Role_user;
use Illuminate\Support\Facades\DB;

use App\Models\Programsfacilitator;
use App\Models\Programsparticipant;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class programEnrollmentController extends Controller
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
        // return "sldfksdlf";
        // $validate = $request->validate([
        //     'program_enrollment_code' => 'bail|required|string',

        // ]);
        if ($request->path() === 'user/memberEnrollmentForProgram') {
            $programForFacilitator = Program::where('facilitator_code', $request->program_enrollment_code)->get();
            $programForParticipant =  Program::where('participant_code', $request->program_enrollment_code)->get();
            if (count($programForFacilitator) !== 0) {
                // return "shhhhhhhhdfsdf";
                $history =  DB::table('programs')
                    ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                    ->where([
                        ['programs.facilitator_code', '=', $request->program_enrollment_code],
                        ['role_user.user_id', '=', auth()->user()->id],
                        ['role_id', 2]
                    ])->get();
                if (count($history) === 0) {
                    // return  auth()->user()->id;
                    DB::table('role_user')->insert(
                        [
                            'user_id' => auth()->user()->id,
                            'program_id' => $programForFacilitator[0]->id,
                            'role_id' => 2
                        ]
                    );
                    // return count($history);
                    return redirect('user/userEnroledPrograms/' . $programForFacilitator[0]->id)->with('registered_to_program', ' تاسي په کامیابۍ سره د ' . $programForFacilitator[0]->name . ' پروګرام ته ثبت کړل سواست! ');
                    // if ($request->user_address === 'member') {
                    //     return redirect('admin/memberProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم غړی په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                    // } elseif ($request->user_address === 'facilitator') {

                    //     return redirect('admin/facilitatorProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم تسهیلونکی په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                    // } else {
                    //     return redirect('admin/participantProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم ګډونوال په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                    // }
                } else {
                    return back()->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د تسهیلونکي په حیث ګډون لری!");
                }
            } elseif (count($programForParticipant) !== 0) {
                $history =  DB::table('programs')
                    ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                    ->where([
                        ['programs.participant_code', '=', $request->program_enrollment_code],
                        ['role_user.user_id', '=', auth()->user()->id],
                        ['role_id', 3]
                    ])->get();
                // return $history;
                if (count($history) == 0) {
                    DB::table('role_user')->insert(
                        array(
                            'user_id'     =>   auth()->user()->id,
                            'program_id'   =>    $programForParticipant[0]->id,
                            'role_id'   =>   3
                        )
                    );
                    if ($request->user_address === 'member') {
                        return redirect('user/userEnroledPrograms/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم غړی په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                    } elseif ($request->user_address === 'facilitator') {

                        return redirect('admin/facilitatorProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم تسهیلونکی په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                    } else {
                        return redirect('admin/participantProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم ګډونوال په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                    }
                } else {
                    return redirect('admin/participantProfile/' . $request->member_id)->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د ګډونوال په حیث ګډون لری!");
                }
            } else {
                return back()->with('program_code_not_found', "یاد کوډ په سیسټم کي هیڅ شتون نلري!");
            }
        }
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/memberEnrollmentForProgram') {
                $programForFacilitator = Program::where('facilitator_code', $request->program_enrollment_code)->get();
                $programForParticipant =  Program::where('participant_code', $request->program_enrollment_code)->get();
                if (count($programForFacilitator) !== 0) {
                    $history =  DB::table('programs')
                        ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                        ->where([
                            ['programs.facilitator_code', '=', $request->program_enrollment_code],
                            ['role_user.user_id', '=', $programForFacilitator[0]->id],
                            ['role_id', 2]
                        ])->get();
                    if (count($history) === 0) {
                        $partEnrollment = new Role_user;
                        $partEnrollment->user_id = $request->member_id;
                        $partEnrollment->program_id = $programForFacilitator[0]->id;
                        $partEnrollment->role_id = 2;
                        $partEnrollment->save();
                        // return count($history);
                        if ($request->user_address === 'member') {
                            return redirect('admin/memberProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم غړی په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                        } elseif ($request->user_address === 'facilitator') {

                            return redirect('admin/facilitatorProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم تسهیلونکی په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                        } else {
                            return redirect('admin/participantProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم ګډونوال په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                        }
                    } else {
                        return back()->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د تسهیلونکي په حیث ګډون لری!");
                    }
                } elseif (count($programForParticipant) !== 0) {
                    $history =  DB::table('programs')
                        ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                        ->where([
                            ['programs.participant_code', '=', $request->program_enrollment_code],
                            ['role_user.user_id', '=', $programForParticipant[0]->id],
                            ['role_id', 3]
                        ])->get();
                    // return $history;
                    if (count($history) == 0) {
                        $partEnrollment = new Role_user;
                        $partEnrollment->user_id = $request->member_id;
                        $partEnrollment->program_id = $programForParticipant[0]->id;
                        $partEnrollment->role_id = 3;
                        $partEnrollment->save();
                        if ($request->user_address === 'member') {
                            return redirect('admin/memberProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم غړی په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                        } elseif ($request->user_address === 'facilitator') {

                            return redirect('admin/facilitatorProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم تسهیلونکی په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                        } else {
                            return redirect('admin/participantProfile/' . $request->member_id)->with('added_to_program', 'یاد  د سیسټم ګډونوال په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                        }
                    } else {
                        return redirect('admin/participantProfile/' . $request->member_id)->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د ګډونوال په حیث ګډون لری!");
                    }
                } else {
                    return back()->with('program_code_not_found', "یاد کوډ په سیسټم کي هیڅ شتون نلري!");
                }
            }
        } else {
            dd('you need to be admin');
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
        if ($request->path() === 'user/programEnrolment/' . $id) {
            // return "no access allowed!";
            if (Gate::denies(ability: 'logged-in')) {
                return "no access allowed!";
            }
            // return "sjdh";

            $member_id = $id;
            $user_address = 'member';
            return view('users.pdc-program-enrollment', compact('member_id', 'user_address'));
        }
        // return 'asldkf';
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/memberEnrollmentForProgram/' . $id) {
                $member_id = $id;
                $user_address = 'member';
                return view('admin.pdc-program-enrollment', compact('member_id', 'user_address'));
                $member_id = $id;
                $user_address = 'facilitator';

                return view('admin.pdc-program-enrollment', compact('member_id', 'user_address'));
            } elseif ($request->path() === 'admin/facilitatorEnrollmentForProgram/' . $id) {
            } else {
                // return "sdfsd";
                $member_id = $id;
                $user_address = 'participant';

                return view('admin.pdc-program-enrollment', compact('member_id', 'user_address'));
            }
        } else {
            // dd('you need to be admin');
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
