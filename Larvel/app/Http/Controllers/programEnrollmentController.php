<?php

namespace App\Http\Controllers;
use App\Models\Program;
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
        if($request->path() === 'memberEnrollmentForProgram'){
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
                        return redirect('memberProfile/'.$request->member_id);
                        
                    }
                    elseif($request->user_address === 'facilitator')
                    {
                        
                        return redirect('facilitatorProfile/'.$request->member_id);
                    }
                    else{
                        return redirect('participantProfile/'.$request->member_id);
                    }
                }
                else{
                    return back()->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د تسهیلونکي په حیث ګډون لری!");
                }
               
            }
            elseif(count($programForParticipant) !== 0)
            {
                $history =  Programsparticipant::where([
                    ['program_id', '=', $programForParticipant[0]->id],
                    ['participant_id', '=', $request->member_id]
                ])->get();
                if(count($history) === 0)
                {
                    $partEnrollment = new Programsparticipant;
                    $partEnrollment->participant_id = $request->member_id;
                    $partEnrollment->program_id = $programForParticipant[0]->id;
                    $partEnrollment->save();
                    if($request->user_address === 'member')
                    {
                        return redirect('memberProfile/'.$request->member_id);
                        
                    }
                    elseif($request->user_address === 'facilitator')
                    {
                        
                        return redirect('facilitatorProfile/'.$request->member_id);
                    }
                    else{
                        return redirect('participantProfile/'.$request->member_id);
                    } 
                } 
                else{
                    return back()->with('program_code_not_found', "تاسي د دې دمخه لا په یاد پروګرام کي د ګډونوال په حیث ګډون لری!");
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
        
        if($request->path() === 'memberEnrollmentForProgram/'.$id)
        {
            $member_id = $id;
            $user_address = 'member';
            return view('pdc-program-enrollment', compact('member_id', 'user_address'));
        }
        elseif($request->path() === 'facilitatorEnrollmentForProgram/'.$id)
        {
            $member_id = $id;
            $user_address = 'facilitator';

            return view('pdc-program-enrollment', compact('member_id', 'user_address'));
        }
        else{
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