<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Facilitatorsandparticipant;
use App\Models\Programsparticipant;
use App\Models\Programsfacilitator;
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
        if($request->path() === 'admin/memberList')
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
            $page = 'عمومي ګډونوال';

            return view('pdc-list-all-member', compact('members', 'path', 'searchPath', 'page'));
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
        
        if($request->path() === 'admin/memberStore')
        {
            $validate = $request->validate([
                'member_name' => 'bail|required|string|max:30',
                'last_name' => 'bail|required|string|max:30',
                'father_name' => 'bail|required|string|max:30',
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
            $member->father_name = $request->father_name;
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
        }
        elseif($request->path() === 'admin/memberStoreTwo')
        {
            if($request->member_type != null)
            {

                // return $request->member_type;
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
                    'member_type' => 'bail|string|in:تسهیلونکی,ګډونوال|required',
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
                if($request->member_type === 'ګډونوال')
                {
                    $participant_id = DB::table('facilitatorsandparticipants')->max('id');
                    $reg = new Programsparticipant;
                    // return "par";
                    $reg->participant_id = $participant_id;
                    $reg->program_id = $request->program_id;
                    $reg->save();
                    return redirect('admin/pdcProgramList')->with('member_added', 'پروګرام ته ګډونکوونکی اضافه کړل سو!');
                }
                elseif ($request->member_type === 'تسهیلونکی')
                {
                    $facilitator_id = DB::table('facilitatorsandparticipants')->max('id');
                    $reg = new Programsfacilitator;
                    // return "facil";
                    $reg->facilitator_id = $facilitator_id;
                    $reg->program_id = $request->program_id;
                    $reg->save();
                    return redirect('admin/pdcProgramList')->with('member_added', 'پروګرام ته تسهیلونکی اضافه کړل سو!');
                }
                else{
                    return "nullllllllllll member registration!";
                }
            }
           
            else{
                return "facil and part controller has faced with error in store function!";
            }
            
        }
        elseif($request->path() === 'publicMemberStore')
        {
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
            return back()->with('add', 'تاسي په کامیابۍ سره سیستم کي ثبت سولاست!');
        }
        elseif($request->path() === 'admin/memberList')
        {
            // return "i am member List!";
            $request->validate([
                'search_type' => 'bail|required|string|in:office_position_category,office_position,office_department,office_building,gender,educational_rank,phone_number,email,name',
                'search_content' => 'bail|required',
            ]);
            $path = '/pdcMemberList';
            $members =  DB::table('facilitatorsandparticipants')->where($request->search_type, $request->search_content)->get();
            // return $programs;
            // return count($members);

            if(count($members) == 0 )
            {
                
                return back()->with('warn_search', 'یاد شخص په سیسټم کي ونه موندل سو!');
            }
            else{
                $path = 'member';
                $searchPath = '/searchMember';
                $page = 'عمومي ګډونوال';
    
                return view('pdc-list-all-member', compact('members', 'path', 'searchPath', 'page'))->with('success_search', 'لاندي ستاسي پلټل سوی شخص دی!');;
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
        // return "jhgj";
        
        if($request->path() === 'admin/memberProfile/'.$id)
        {
            $userProfile = DB::table('facilitatorsandparticipants')->where('id', $id)->get();
            $name  = 'ثبت سوی شخص';
            $path = 'admin/memberList';
            $user_request = 'member';
            return view('pdc-user-info', compact('userProfile', 'name', 'path', 'user_request'));
        }

        elseif($request->path() === 'admin/memberRegisterationTwo/'.$id)
        {
            $program_id = $id;
            return view('pdc-add-member-two', compact('program_id'));

        }
        else
        {
            return "askdfjas";
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
        if($request->path() === 'admin/memberList/'.$id.'/edit')
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
        if($request->path() === 'admin/memberList/'.$id){
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
            return redirect('admin/memberList')->with('member_edited', 'د یاد تسهیلونکی معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');

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
        if($request->path() === 'admin/memberList/'.$id)
        {
            Facilitatorsandparticipant::find($id)->delete();
            return redirect('admin/memberList');
        }
    }
}
