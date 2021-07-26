<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Facilitatorsandparticipant;
use Illuminate\Support\Facades\DB;


class facilitatorandparticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if($request->path() === 'memberList')
        {
            //  $facilitators =  DB::table('facilitatorsandparticipants')
            // ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
            // ->select('facilitatorsandparticipants.*')
            // ->distinct()
            // ->get();
            // $participants =  DB::table('facilitatorsandparticipants')
            // ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
            // ->select('facilitatorsandparticipants.*')
            // ->distinct()
            // ->get();
            // $enrlledIDs = array();
            // foreach($facilitators as $facilitator){
            //     array_push( $enrlledIDs, $facilitator->id);
            // }
            // foreach($participants as  $participant){
            //     array_push( $enrlledIDs, $participant->id);
            // }
            // $members = DB::table('facilitatorsandparticipants')
            // ->select('facilitatorsandparticipants.*')
            // ->whereNotIn('id', $enrlledIDs)
            // ->get();
            $members = Facilitatorsandparticipant::all();
            // return $enrlledIDs;
            // return DB::table('facilitatorsandparticipants')->groupBy('phone_number')->having('Phone_number', '!=', '0008343043')->get();
            $path = 'member';
            $searchPath = '/searchMember';
            return view('pdc-list-all-member', compact('members', 'path', 'searchPath'));
        }

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
        // $record = Facilitatorsandparticipant::find(10);
        // if (Hash::check('۱۲۳', $record->password)) {
        //     // The passwords match...
        //     return "hahaha";
        //  }
        //  else{
        //      return "woy";
        //  }
        if($request->path() === 'memberStore')

        $member = new Facilitatorsandparticipant;

        $member->name = $request->name;
        $member->last_name = $request->last_name;
        $member->phone_number = $request->phone_number;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->office_campus = $request->office_campus;
        $member->office_building = $request->office_building;
        $member->office_department = $request->office_department;
        $member->office_position = $request->office_position;
        $member->office_position_category = $request->office_position_category;
        if ( $request->educational_rank != null) {
            $member->educational_rank = $request->educational_rank;
        }
        if ($request->password === $request->password_confirm) {
            $member->password = Hash::make($request->password);
        }
        $member->save();

        // return "data saved";
        if($request->return === 'facilitator')
        {
            return redirect('facilitatorList');
        }
        else if($request->return === 'participant')
        {
            return redirect('participantList');

        }
        else{
            return redirect('showPrograms');
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
        if($request->path() === 'memberProfile/'.$id)
        {
            $userProfile = DB::table('facilitatorsandparticipants')->where('id', $id)->get();
            $name  = 'ثبت سوی شخص';
            $path = 'memberList';
            $user_request = 'member';
        return view('pdc-user-info', compact('userProfile', 'name', 'path', 'user_request'));
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
        if($request->path() === 'memberList/'.$id.'/edit')
        {
            $member = Facilitatorsandparticipant::find($id);
            $path= 'member';
            return view('pdc-edit-member', compact('member', 'path'));
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
        if($request->path() === 'memberList/'.$id){
            $member = Facilitatorsandparticipant::find($id);
            // return $request->last_name;
            $member->name = $request->name;
            $member->last_name = $request->last_name;
            $member->phone_number = $request->phone_number;
            $member->email = $request->email;
            $member->gender = $request->gender;
            $member->office_campus = $request->office_campus;
            $member->office_building = $request->office_building;
            $member->office_department = $request->office_department;
            $member->office_position = $request->office_position;
            $member->office_position_category = $request->office_position_category;
            if ( $request->educational_rank != null) {
                $member->educational_rank = $request->educational_rank;
            }
            if ($request->password == $request->password_confirm) {
                $member->password = $request->password;
            }
            $member->save();
            return redirect('memberList');

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
        if($request->path() === 'memberList/'.$id)
        {
            Facilitatorsandparticipant::find($id)->delete();
            return redirect('memberList');
        }
    }
}
