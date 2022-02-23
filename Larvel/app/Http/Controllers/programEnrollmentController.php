<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\User_role;
use Illuminate\Support\Facades\DB;

use App\Models\Programsfacilitator;
use App\Models\Programsparticipant;

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
        if($request->path() === 'admin/memberEnrollmentForProgram'){
            $programForFacilitator = Program::where('facilitator_code', $request->program_enrollment_code)->get();
            $programForParticipant =  Program::where('participant_code', $request->program_enrollment_code)->get();
            if(count($programForFacilitator) !== 0){
                $history =  Programsfacilitator::where([
                    ['program_id', '=', $programForFacilitator[0]->id],
                    ['facilitator_id', '=', $request->member_id]
                ])->get();
                if(count($history) === 0)
                {
                    $facilEnrollment = new Programsfacilitator;
                    $facilEnrollment->facilitator_id = $request->member_id;
                    $facilEnrollment->program_id = $programForFacilitator[0]->id;
                    $facilEnrollment->save();
                    if($request->user_address === 'member')
                    {
                        return redirect('admin/memberProfile/'.$request->member_id)->with('added_to_program', 'یاد  د سیسټم غړی په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');

                    }
                    elseif($request->user_address === 'facilitator')
                    {

                        return redirect('admin/facilitatorProfile/'.$request->member_id)->with('added_to_program', 'یاد  د سیسټم تسهیلونکی په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                    }
                    else{
                        return redirect('admin/participantProfile/'.$request->member_id)->with('added_to_program', 'یاد  د سیسټم ګډونوال په کامیابۍ سره و پروګرام ته د تسهیلونکی په حیث شامل کړل سو!');
                    }
                }
                else{
                    return back()->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د تسهیلونکي په حیث ګډون لری!");
                }

            }
            elseif(count($programForParticipant) !== 0)
            {
                $history =  DB::table('programs')
                ->join('user_roles', 'programs.id', '=', 'user_roles.program_id' )
                ->where([
                    ['programs.participant_code', '=', $request->program_enrollment_code],
                    ['user_roles.user_id', '=', $programForParticipant[0]->id],
                    ['role_id', 3]
                ])->get();
                // return $history;
                if(count($history) == 0)
                {
                    $partEnrollment = new User_role;
                    $partEnrollment->user_id = $request->member_id;
                    $partEnrollment->program_id = $programForParticipant[0]->id;
                    $partEnrollment->role_id = 3;
                    $partEnrollment->save();
                    if($request->user_address === 'member')
                    {
                        return redirect('admin/memberProfile/'.$request->member_id)->with('added_to_program', 'یاد  د سیسټم غړی په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');

                    }
                    elseif($request->user_address === 'facilitator')
                    {

                        return redirect('admin/facilitatorProfile/'.$request->member_id)->with('added_to_program', 'یاد  د سیسټم تسهیلونکی په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                    }
                    else{
                        return redirect('admin/participantProfile/'.$request->member_id)->with('added_to_program', 'یاد  د سیسټم ګډونوال په کامیابۍ سره و پروګرام ته د ګډونوال په حیث شامل کړل سو!');
                    }
                }
                else{
                    return redirect('admin/participantProfile/'.$request->member_id)->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د ګډونوال په حیث ګډون لری!");
                }
            }
            else{
                return back()->with('program_code_not_found', "یاد کوډ په سیسټم کي هیڅ شتون نلري!");
            }
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

        if($request->path() === 'admin/memberEnrollmentForProgram/'.$id)
        {
            $member_id = $id;
            $user_address = 'member';
            return view('pdc-program-enrollment', compact('member_id', 'user_address'));
        }
        elseif($request->path() === 'admin/facilitatorEnrollmentForProgram/'.$id)
        {
            $member_id = $id;
            $user_address = 'facilitator';

            return view('pdc-program-enrollment', compact('member_id', 'user_address'));
        }
        else{
            // return "sdfsd";
            $member_id = $id;
            $user_address = 'participant';

            return view('pdc-program-enrollment', compact('member_id', 'user_address'));
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
