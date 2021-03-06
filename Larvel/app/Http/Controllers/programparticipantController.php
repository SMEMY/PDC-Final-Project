<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilandpart;
use App\Models\Program;
use App\Models\User_info;
use App\Models\User;
use App\Models\Facilitatorsandparticipant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class programparticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows(ability: 'is-admin')) {
            $members =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->select('users.*', 'user_infos.*')
                ->distinct()
                ->where([
                    ['role_user.role_id', 3],
                    // ['users.id', '=', 'user_infos.user_id']
                ])
                ->paginate(12);
            // return $members;
            // $searchPath = '/searchParticipant';
            // $path = 'participant';
            // $page = 'د پروګرامونو ګډونوال';

            return view('admin.pdc-list-all-participant', compact('members'));
        } else {
            dd('you need to be admin');
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
        // return "fdads";
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/searchParticipant') {
                if ($request->search_type === null || $request->search_content === null) {
                    return redirect('admin/participantList');
                } else {
                    $members =  DB::table('users')
                        ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->distinct()
                        ->where($request->search_type, $request->search_content)->paginate(10);
                    $path = 'particiapnt';
                    $searchPath = '/searchParticipant';
                    return view('admin.pdc-list-all-participant', compact('members', 'path', 'searchPath'));
                }
            } elseif ($request->path() === 'admin/searchProgramParticipant') {
                // return "sdjf";
                $request->validate([
                    'search_type' => 'bail|required|string|in:name,email,phone_number',
                    'search_content' => 'bail|required',
                ]);
                 $participants =  DB::table('users')
                    ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.*', 'user_infos.*', 'role_user.*')
                    ->where([
                        ['role_user.program_id', $request->program_id],
                        ['users.' . $request->search_type,  $request->search_content],
                        ['role_user.role_id', 3]
                    ])
                    ->orderBy('users.name', 'asc')
                    ->get();
                $programs = Program::find($request->program_id);
                $programID = $request->program_id;
                $program_id = $request->program_id;
                // return $request->program_id;
                if (count($participants) === 0) {
                    return back()->with('warn_search', "یاد کس ونه موندل سو!");
                } else {
                    return view('admin.pdc-program-participants-list', compact('participants', 'programID', 'program_id', 'programs'));
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
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/participantProfile/' . $id) {
                $userProfile = DB::table('users')
                    ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.*', 'user_infos.*')
                    ->where([
                        ['users.id', $id],
                    ])
                    ->get();

                // $name = 'ګډونوال';
                // $path = 'participantList';
                // return $userProfile;
                $user_request = 'participant';
                return view('admin.pdc-participant-info', compact('userProfile', 'user_request'));
            } elseif ($request->path() === 'admin/specificeProgramParticipants/' . $id) {
                // return "alskdfjalfkdj";
                $participants =  DB::table('users')
                    ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.name', 'users.email', 'user_infos.*', 'role_user.program_id')
                    ->where([
                        ['role_user.role_id', 3],
                        ['role_user.program_id', $id]
                    ])
                    ->orderBy('name', 'asc')
                    ->get();
                // return $participants;
                $programs = Program::find($id);

                $programID = $id;
                $program_id = $id;
                if (count($participants) !== 0) {
                    return view('admin.pdc-program-participants-list', compact('participants', 'programID', 'program_id', 'programs'));
                } else {
                    return back()->with('warn', "د پروګرام لپاره تر اوسه ګډونوال ندي اضافه کړل سوي!");
                }
            } elseif ($request->path() === 'admin/participantEnrolledPrograms/' . $id) {
                $enrolledPrograms = DB::table('programs')
                    ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                    ->select('programs.*')
                    ->where([
                        ['role_user.user_id', $id],
                        ['role_user.role_id', 3]
                    ])
                    ->get();
                return view('admin.pdc-admin-participant-enrolled-programs', compact('enrolledPrograms'));
            } else {
                return "no path matched!";
            }
        } else {
            dd('you need to be admin');
        }



        if ($request->path() === 'programSpecificParticipant/' . $id) {
            return "i am login";
            if ($request->name !== null && $request->phone_number === null) {
                $participants = DB::table('facilitatorsandparticipants')
                    ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
                    ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
                    ->where('facilitatorsandparticipants.name', $request->name)
                    ->get();
                $programID = $id;
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            } elseif ($request->phone_number !== null && $request->name == null) {
                $participants = DB::table('facilitatorsandparticipants')
                    ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
                    ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
                    ->where('facilitatorsandparticipants.phone_number', $request->phone_number)
                    ->get();
                $programID = $id;
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            } elseif ($request->phone_number !== null && $request->name !== null) {
                $participants = DB::table('facilitatorsandparticipants')
                    ->join('programsparticipants', 'facilitatorsandparticipants.id', '=', 'programsparticipants.participant_id')
                    ->select('facilitatorsandparticipants.*', 'programsparticipants.program_id')
                    ->where([
                        ['facilitatorsandparticipants.phone_number', '=', $request->phone_number],
                        ['facilitatorsandparticipants.name', '=', $request->name]
                    ])
                    ->get();
                $programID = $id;
                return view('pdc-program-participants-list', compact('participants', 'programID'));
            }
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
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/participantList/' . $id . "/edit") {
                // $member = Facilitatorsandparticipant::find($id);

                $member =  DB::table('users')
                    ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.*', 'user_infos.*', 'role_user.program_id')
                    // ->where('programsfacilitators.program_id', $id)
                    ->where([
                        ['role_user.user_id', $id],
                        ['role_user.role_id', 3]
                    ])
                    ->get();
                // return $member;
                $path = 'participant';
                return view('admin.pdc-edit-specific-member', compact('member', 'path'));
            } elseif ($request->path() === 'admin/participantAllList/' . $id . "/edit") {
                $member =  DB::table('users')
                    ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.*', 'user_infos.*', 'role_user.program_id')
                    // ->where('programsfacilitators.program_id', $id)
                    ->where([
                        ['role_user.user_id', $id],
                        ['role_user.role_id', 3]
                    ])
                    ->get();
                // return $member;
                $path = 'participant';
                return view('admin.pdc-edit-participant', compact('member', 'path'));
            }
        } else {
            dd('you need to be admin');
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
        if (Gate::allows(ability: 'is-admin')) {
            // return $id;
            // return $request->path();
            if ($request->path() === 'admin/specificeProgramParticipants/' . $id) {
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
                // ->update([
                //     'name' => $request->member_name,
                //     'email' =>  $request->email
                // ]);
                // $member = User::with('userInfos')->find($id);
                // $member->name = $request->member_name;
                // $member->email = $request->email;
                // $member->save();
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'name' => $request->member_name,
                        'email' =>  $request->email
                    ]);
                if ($request->office_position_category === 'اداري') {
                    $user = User_info::where('user_id', $id)
                        ->update([
                            'last_name' => $request->last_name,
                            'phone_number' => $request->phone_number,
                            'gender' => $request->gender,
                            'office_campus' => $request->office_campus,
                            'office_building' =>  $request->office_building,
                            'office_department' =>  $request->office_department,
                            'office_position' =>  $request->office_position,
                            'office_position_category' =>  $request->office_position_category,
                            'educational_rank' => ""
                        ]);
                } else {
                    $user = User_info::where('user_id', $id)
                        ->update([
                            'last_name' => $request->last_name,
                            'phone_number' => $request->phone_number,
                            'gender' => $request->gender,
                            'office_campus' => $request->office_campus,
                            'office_building' =>  $request->office_building,
                            'office_department' =>  $request->office_department,
                            'office_position' =>  $request->office_position,
                            'office_position_category' =>  $request->office_position_category,
                            'educational_rank' => $request->educational_rank
                        ]);
                }
                return back()->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            } elseif ($request->path() === 'admin/participantAllList/' . $id) {
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
                $member = User::find($id);
                $user = User_info::where('user_id', $id)->first();
                // return $request->last_n/ame;
                // return $user;
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
                $member->save();
                $user->save();
                return redirect('admin/participantList')->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            } else {

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
                $member->save();
                $user->save();
                // return redirect('admin/participantList')->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            }
        } else {
            dd('you need to be admin');
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
        // return $request->path();


        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/participantList/' . $id) {
                return "ksjdfds";
                $deleteParticipant = Facilitatorsandparticipant::find($id);
                $deleteParticipant->delete();

                // return $facilitator =  DB::table('role_user')
                //     ->select('role_user.*')
                //     ->where([
                //         ['role_user.user_id', $id],
                //         ['role_user.role_id', 3],
                //         ['role_user.program_id', $request->program_id]
                //     ])
                //     ->get();

                return redirect('admin/participantList');
            } elseif ($request->path() === 'admin/participantAllList/' . $id) {
                // return "kssdfsdfsdfssjdfds";
                // $deleteParticipant = Facilitatorsandparticipant::find($id);
                $participant =  DB::table('role_user')
                    ->select('role_user.*')
                    ->where([
                        ['role_user.user_id', $id],
                        ['role_user.role_id', 3]
                    ])
                    ->delete();
                // $deleteParticipant->delete();

                // return $facilitator =  DB::table('role_user')
                //     ->select('role_user.*')
                //     ->where([
                //         ['role_user.user_id', $id],
                //         ['role_user.role_id', 3],
                //         ['role_user.program_id', $request->program_id]
                //     ])
                //     ->get();

                return redirect('admin/participantList')->with('success', "یاد ګډونوال له سیسټم څخه له منځه ولاړ!");
            }
        } else {
            dd('you need to be admin');
        }
        if ($request->page == 'pdc-program-participants-list') {
            // return $id;
            $facilitator =  DB::table('role_user')
                ->select('role_user.*')
                ->where([
                    ['role_user.user_id', $id],
                    ['role_user.role_id', 3],
                    ['role_user.program_id', $request->program_id]
                ])
                ->delete();
            $check = DB::table('role_user')
                ->select('role_user.*')
                ->where([
                    ['role_user.role_id', 3],
                    ['role_user.program_id', $request->program_id]
                ])
                ->get();
            if (count($check) !== 0) {
                if (count(DB::table('user_attendances')->where('user_id', $id)->get()) != 0) {
                    DB::table('user_attendances')->where('user_id', $id)->delete();
                }
                if (count(DB::table('role_user')->where('role_user.program_id', $request->program_id)->get()) !== 0) {
                    return back()->with('success', "یاد ګډونوال له سیسټم څخه له منځه ولاړ!");
                } else {
                    return redirect('pdcProgramInfo/' . $request->program_id)->with('warn', "د یاد پروګرام ټوله ګدونوال له سیسټم څخه پاک کړل سوه!");
                }
            } else {
                return back()->with('warn', "یاد کس په پروګرام کي شتون نلري د له منځه وړلو لپاره!");
            }
        }
    }
}
