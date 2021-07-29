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
        $validate = $request->validate([
            'member_name' => 'bail|required|string|max:30',
            'last_name' => 'bail|required|string|max:30',
            'phone_number' => 'bail|required|string|max:13',
            'email' => 'bail|required|email|max:50',
            'gender' => 'bail|required|string|in:نارینه,ښځینه',
            'office_campus' => 'bail|nullable|string|in:کندهار پوهتون',
            'office_building' => 'bail|required|string|in:ساینس,ادبیات,شرعیات,اقتصاد,زراعت,ژورنالیزم,حقوق,ساینس,انجنیري,طب,اداري معاونیت,ریاست مقام,محصلینو چارو معاونیت,تعلیم او تربیه,اداره ئې عامه,کمپیوټر ساینس',
            'office_department' => 'bail|required|string|max:30',
            'office_position' => 'bail|required|string|in:اداري کارمند,ښوونکی,مرستیال,رئیس',
            'office_position_category' => 'bail|required|string|in:اداري,تدریسي,اداري او تدریسي',
            'educational_rank' => 'bail|required_if:office_position_category,=,تدریسي,اداري او تدریسي|string|in:پوهاند,پوهنمل,پوهنیار,پوهایالی',
            'password' => 'bail|string|min:8|max:20|confirmed:password_confirmation',
            'password_confirmation' => 'bail|string|min:8|max:20|',
        ]);
        $member = new Facilitatorsandparticipant;
        $member->name = $request->member_name;
        $member->last_name = $request->last_name;
        $member->phone_number = $request->phone_number;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->office_campus = $request->office_campus;
        $member->office_building = $request->office_building;
        $member->office_department = $request->office_department;
        $member->office_position = $request->office_position;
        $member->office_position_category = $request->office_position_category;
        $member->educational_rank = $request->educational_rank;
        $member->password = Hash::make($request->password);
        $member->save();
        return back()->with('member_added', 'یاد شخص سسیسټم ته په کامیابۍ سره ثبت کړل سو!');
        // // return "data saved";
        // if($request->return === 'facilitator')
        // {
        //     return redirect('facilitatorList');
        // }
        // else if($request->return === 'participant')
        // {
        //     return redirect('participantList');
        // }
        // else{
        //     return redirect('showPrograms');
        // }
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
        $validate = $request->validate([
            'member_name' => 'bail|required|string|max:30',
            'last_name' => 'bail|required|string|max:30',
            'phone_number' => 'bail|required|string|max:13',
            'email' => 'bail|required|email|max:50',
            'gender' => 'bail|required|string|in:نارینه,ښځینه',
            'office_campus' => 'bail|nullable|string|in:کندهار پوهتون',
            'office_building' => 'bail|required|string|in:ساینس,ادبیات,شرعیات,اقتصاد,زراعت,ژورنالیزم,حقوق,ساینس,انجنیري,طب,اداري معاونیت,ریاست مقام,محصلینو چارو معاونیت,تعلیم او تربیه,اداره ئې عامه,کمپیوټر ساینس',
            'office_department' => 'bail|required|string|max:30',
            'office_position' => 'bail|required|string|in:اداري کارمند,ښوونکی,مرستیال,رئیس',
            'office_position_category' => 'bail|required|string|in:اداري,تدریسي,اداري او تدریسي',
            'educational_rank' => 'bail|required_if:office_position_category,=,تدریسي,اداري او تدریسي|string|in:پوهاند,پوهنمل,پوهنیار,پوهایالی',
        ]);
        if($request->path() === 'memberList/'.$id){
            $member = Facilitatorsandparticipant::find($id);
            // return $request->last_name;
            $member->name = $request->member_name;
            $member->last_name = $request->last_name;
            $member->phone_number = $request->phone_number;
            $member->email = $request->email;
            $member->gender = $request->gender;
            $member->office_campus = $request->office_campus;
            $member->office_building = $request->office_building;
            $member->office_department = $request->office_department;
            $member->office_position = $request->office_position;
            $member->office_position_category = $request->office_position_category;
            $member->educational_rank = $request->educational_rank;
            $member->save();
            return redirect('memberList')->with('member_edited', 'د یاد تسهیلونکی معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');

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
