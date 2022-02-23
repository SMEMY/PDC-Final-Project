<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Programsfacilitator;
use App\Models\Programsparticiapant;
use App\Models\User_info;
use App\Models\Photo;
use App\Models\Facilitatorsandparticipant;

use App\Models\User;
use Illuminate\Support\Facades\DB;




class programfacilitatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return "under cnostruction";
        // return Programsfacilitator::all();
        $members =  DB::table('users')
            ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->select('users.*', 'user_infos.*')
            ->distinct()
            ->where([
                ['user_roles.role_id', 2]
            ])
            ->get();
        // return DB::table('facilitatorsandparticipants')->groupBy('phone_number')->having('Phone_number', '!=', '0008343043')->get();
        $path = 'facilitator';
        $page = 'تسهیلونکی';
        $searchPath = '/searchFacilitator';
        return view('pdc-list-all-facilitator', compact('members', 'path', 'searchPath', 'page'));
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
        // return "sadfasdf";
        // if ($request->path() === 'admin/searchFacilitator') {
        //     $members = DB::table('facilitatorsandparticipants')
        //         ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
        //         ->select('facilitatorsandparticipants.*')
        //         ->where($request->search_type, $request->search_content)
        //         ->get();
        //     $path = 'facilitator';

        //     $searchPath = '/searchFacilitator';
        //     return view('ListfacilitatorAndParticipant', compact('members', 'path', 'searchPath'));
        // }
        if ($request->path() === 'admin/searchFacilitator') {
            // return "i am member List!";
            $request->validate([
                'search_type' => 'bail|required|string|in:office_position_category,office_position,office_department,office_building,gender,educational_rank,phone_number,email,name',
                'search_content' => 'bail|required',
            ]);
            // $path = '/admin/facilitatorList';
            $members =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->where($request->search_type, $request->search_content)->get();
            // return $programs;
            // return count($members);

            if (count($members) == 0) {

                return back()->with('warn_search', 'یاد شخص په سیسټم کي ونه موندل سو!');
            } else {
                // $path = 'facilitor';
                // $searchPath = '/admin/searchMember';
                // $page = 'عمومي ګډونوال';

                return view('pdc-list-all-facilitator', compact('members'))->with('success_search', 'لاندي ستاسي پلټل سوی شخص دی!');;
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
        if ($request->path() === 'admin/facilitatorProfile/' . $id) {
            $userProfile = DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->select('users.*', 'user_infos.*')
                ->where('users.id', $id)
                ->get();
            $name = 'تسهیلونکی';
            $path = 'facilitatorList';
            $user_request = 'facilitator';
            return view('pdc-user-info', compact('userProfile', 'name', 'path', 'user_request'));
        } elseif ($request->path() === 'admin/facilitatorProfileForProgram/' . $id) {

            $userProfile =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
                ->select('users.*', 'user_infos.*')
                // ->where('programsfacilitators.program_id', $id)
                ->where([
                    ['user_roles.program_id', $id],
                    ['user_roles.role_id', 2]
                ])
                ->get();
            $name = 'تسهیلونکی';
            $program_id = $id;
            if (count($userProfile) !== 0) {
                return view('pdc-program-user-info', compact('userProfile', 'name', 'program_id'));
            } else {
                return back()->with('warn', "د پروګرام لپاره تر اوسه تسهیلونکي ندی اضافه کړل سوی!");
            }
        }
        //facilitatorEnrolledPrograms
        elseif ($request->path() === 'admin/facilitatorEnrolledPrograms/' . $id) {
            $enrolledPrograms = DB::table('programs')
                ->join('programsfacilitators', 'programs.id', '=', 'programsfacilitators.program_id')
                ->select('programs.*')
                ->where('programsfacilitators.facilitator_id', '=', $id)
                ->get();
            $rec = DB::table('programsfacilitators')->where('programsfacilitators.facilitator_id', $id)->select('program_id')->get();
            $programsID = array();
            foreach ($rec as $r) {
                array_push($programsID, $r->program_id);
            }
            $notEnrolledPrograms = DB::table('programs')
                ->select('programs.*')
                ->whereNotIn('id', $programsID)
                ->get();
            return view('pdc-facilitator-participant-enrolled-programs', compact('enrolledPrograms', 'notEnrolledPrograms'));
        } elseif (0) {
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
        // return "klzcja";
        if ($request->path() === 'admin/facilitatorList/' . $id . "/edit") {
            // $member = Facilitatorsandparticipant::find($id);
            $member = DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->select('users.*', 'user_infos.*')
                ->where('users.id', $id)
                ->get();
            $path = 'facilitator';
            return view('pdc-edit-member', compact('member', 'path'));
        } elseif ($request->path() === 'admin/facilitatorProfileForProgram/' . $id . "/edit") {
            // $member = Facilitatorsandparticipant::find($id);
            // $program_id =  DB::table('facilitatorsandparticipants')
            //     ->join('programsfacilitators', 'facilitatorsandparticipants.id', '=', 'programsfacilitators.facilitator_id')
            //     ->select('programsfacilitators.program_id')
            //     ->where('programsfacilitators.facilitator_id', $id)
            //     ->get();

            $member =  DB::table('users')
                ->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
                ->select('users.*', 'user_infos.*', 'user_roles.program_id')
                // ->where('programsfacilitators.program_id', $id)
                ->where([
                    ['user_roles.user_id', $id],
                    ['user_roles.role_id', 2]
                ])
                ->get();
            $path = 'facilitatorProfileForProgram';
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
        if ($request->path() === 'admin/facilitatorProfileForProgramList/' . $id) {
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
            // return redirect('admin/facilitatorProfileForProgram/' . $request->program_id)->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');

            // if ($request->path() === 'admin/facilitatorList/' . $id) {
            //     return redirect('admin/facilitatorList')->with('member_edited', 'د یاد تسهیلونکی معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            // }
            if ($request->path() === 'admin/facilitatorProfileForProgramList/' . $id) {
                return redirect('admin/facilitatorProfileForProgram/' . $request->program_id)->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            }
        } elseif ($request->path() === 'admin/facilitatorList/' . $id) {
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
            // return "slkdfjsdlkf";
            $member = User::find($id);
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
            return back()->with('member_edited', 'د یاد تسهیلونکی معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            // return redirect('admin/facilitatorProfileForProgram/' . $request->program_id)->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');

            // if ($request->path() === 'admin/facilitatorList/' . $id) {
            //     return redirect('admin/facilitatorList')->with('member_edited', 'د یاد تسهیلونکی معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            // }
            if ($request->path() === 'admin/facilitatorProfileForProgramList/' . $id) {
                return redirect('admin/facilitatorProfileForProgram/' . $request->program_id)->with('member_edited', 'د یاد غړي معلومات په کامیابۍ سره په سیسټم کي اصلاح کړل سو!');
            }
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
        if ($request->path() === 'admin/deleteFacilitatorForProgram/' . $id) {
            // return count($request->program_id);
            $facilitator =  DB::table('user_roles')
                ->select('user_roles.*')
                ->where([
                    ['user_roles.user_id', $id],
                    ['user_roles.role_id', 2],
                    ['user_roles.program_id', $request->program_id]
                ])
                ->delete();
            // return count($facilitator);
            // Programsfacilitator::where([['facilitator_id', $id], ['program_id', $request->program_id]])->delete();
            $check =  DB::table('user_roles')
                ->select('user_roles.*')
                ->where([
                    ['user_roles.role_id', 2],
                    ['user_roles.program_id', $request->program_id]
                ])
                ->get();
            if (count($check) != 0) {
                return back()->with('facilitator_deleted', "د یاد پروګرام تسهیلونکی له سیسټم څخه پاک کړل سوه!");
            } else {
                return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('all_facilitator_deleted', "د یاد پروګرام ټوله تسهیلونکي له سیسټم څخه پاک کړل سوه!");
            }
        } elseif ($request->path() === 'admin/facilitatorList/' . $id) {
            // return "xadfsf";
            // $deleteFacilitator = Programsfacilitator::where('facilitator_id', $id)->delete();
            $userProfile = DB::table('user_roles')
                ->where('user_roles.user_id', $id)
                ->delete();
            return redirect('admin/facilitatorList')->with('facilitator_deleted', 'یاد تسهیلونکي له سیسټم څخه ایسته کړل سو!');;
        }

        //    $deleteParticipant = Programsfacilitator::where('facilitator_id', $id)->get();
        //     $deleteParticipant->delete();
        //     return redirect('facilitatorList');
    }
}
