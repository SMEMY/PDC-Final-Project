<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Facilitatorsandparticipant;
use App\Models\User;
use App\Models\User_info;
use App\Models\User_role;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->path() === 'admin/memberList') {
            $members = User::join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->get(['users.*', 'user_infos.*']);
            $path = 'member';
            $searchPath = '/searchMember';
            $page = 'عمومي ګډونوال';

            // return $members;

            return view('pdc-list-all-member', compact('members', 'path', 'searchPath', 'page'));
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
        //
        if ($request->path() === 'admin/memberStoreTwo') {
            // return "slkdfj";
            if ($request->member_type != null) {

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



                $member = new User;
                $member->name = $request->member_name;
                $member->email = $request->email;
                $member->password = Hash::make($request->password);
                $member->save();

                DB::table('user_infos')->insert([
                    'user_id' => $member->id,
                    'last_name' => $request->last_name,
                    'phone_number' => $request->phone_number,
                    'gender' => $request->gender,
                    'office_campus' => $request->office_campus,
                    'office_building' =>   $request->office_building,
                    'office_department' => $request->office_department,
                    'office_position' => $request->office_position,
                    'office_position_category' => $request->office_position_category,
                    'educational_rank' =>  $request->educational_rank,
                ]);

                if ($request->member_type === 'ګډونوال') {
                    // $participant_id = DB::table('users')->max('id');
                    $memberRole = new User_role;
                    // return "par";
                    $memberRole->user_id = $member->id;
                    $memberRole->program_id = $request->program_id;
                    $memberRole->role_id = 3;
                    $memberRole->save();
                    return redirect('admin/pdcProgramList')->with('member_added', 'پروګرام ته ګډونکوونکی اضافه کړل سو!');
                } elseif ($request->member_type === 'تسهیلونکی') {
                    $memberRole = new User_role;
                    // return "par";
                    $memberRole->user_id = $member->id;
                    $memberRole->program_id = $request->program_id;
                    $memberRole->role_id = 2;
                    $memberRole->save();
                    return redirect('admin/pdcProgramList')->with('member_added', 'پروګرام ته تسهیلونکی اضافه کړل سو!');
                } else {
                    return "nullllllllllll member registration!";
                }
            } else {
                return "facil and part controller has faced with error in store function!";
            }
        } elseif ($request->path() === 'admin/memberStore') {
            $validate = $request->validate([
                'member_name' => 'bail|required|string|max:30',
                'last_name' => 'bail|required|string|max:30',
                // 'father_name' => 'bail|required|string|max:30',
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
            $member = new User;
            $member->name = $request->member_name;
            $member->email = $request->email;
            if ($request->password === $request->password_confirmation) {
                $member->password = Hash::make($request->password);
                $member->save();
            }
            // else
            // {
            //     return
            // }

            DB::table('user_infos')->insert([
                'user_id' => $member->id,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'office_campus' => $request->office_campus,
                'office_building' =>   $request->office_building,
                'office_department' => $request->office_department,
                'office_position' => $request->office_position,
                'office_position_category' => $request->office_position_category,
                'educational_rank' =>  $request->educational_rank,
            ]);
            return back()->with('member_added', 'یاد شخص سسیسټم ته په کامیابۍ سره ثبت کړل سو!');
        } elseif ($request->path() === 'admin/memberList') {
            // return "i am member List!";
            $request->validate([
                'search_type' => 'bail|required|string|in:office_position_category,office_position,office_department,office_building,gender,educational_rank,phone_number,email,name',
                'search_content' => 'bail|required',
            ]);
            $path = '/admin/pdcMemberList';
            $members =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->where($request->search_type, $request->search_content)->get();
            // return $programs;
            // return count($members);

            if (count($members) == 0) {

                return back()->with('warn_search', 'یاد شخص په سیسټم کي ونه موندل سو!');
            } else {
                $path = 'member';
                $searchPath = '/admin/searchMember';
                $page = 'عمومي ګډونوال';

                return view('pdc-list-all-member', compact('members', 'path', 'searchPath', 'page'))->with('success_search', 'لاندي ستاسي پلټل سوی شخص دی!');;
            }
        }
        elseif ($request->path() === 'admin/facilitorList') {
            // return "i am member List!";
            $request->validate([
                'search_type' => 'bail|required|string|in:office_position_category,office_position,office_department,office_building,gender,educational_rank,phone_number,email,name',
                'search_content' => 'bail|required',
            ]);
            $path = '/admin/pdcMemberList';
            $members =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->where($request->search_type, $request->search_content)->get();
            // return $programs;
            // return count($members);

            if (count($members) == 0) {

                return back()->with('warn_search', 'یاد شخص په سیسټم کي ونه موندل سو!');
            } else {
                $path = 'member';
                $searchPath = '/admin/searchMember';
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
        // return "sdfjksldf";
        if ($request->path() === 'admin/memberRegisterationTwo/' . $id) {
            $program_id = $id;
            return view('pdc-add-member-two', compact('program_id'));
        } elseif ($request->path() === 'admin/memberProfile/' . $id) {
            $userProfile = User::join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->get(['users.*', 'user_infos.*']);
            $name  = 'ثبت سوی شخص';
            $path = 'admin/memberList';
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
        // User::join('posts', 'posts.user_id', '=', 'users.id')
        //     ->where('users.status', 'active')
        //     ->where('posts.status','active')
        //     ->get(['users.*', 'posts.descrption']);
        //
        if ($request->path() === 'admin/memberList/' . $id . '/edit') {
            $member = User::join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->where('users.id', $id)
                ->get(['users.*', 'user_infos.*']);
            $path = 'member';
            // return $member;

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
        if ($request->path() === 'admin/memberList/' . $id) {
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
            $member = User::with('userInfos')->find($id);
            $user = User_info::find($id);
            // return $user;
            // return $user->last_name;
            // return $request->last_name;
            $member->name = $request->member_name;
            $member->email = $request->email;
            $user->last_name = $request->last_name;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->office_campus = $request->office_campus;
            $user->office_building = $request->office_building;
            $user->office_department = $request->office_department;
            $user->office_position = $request->office_position;
            $user->office_position_category = $request->office_position_category;
            $user->educational_rank = $request->educational_rank;
            $user->save();
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

        if ($request->path() === 'admin/memberList/' . $id) {
            Facilitatorsandparticipant::find($id)->delete();
            return redirect('admin/memberList');
        }
    }
}
