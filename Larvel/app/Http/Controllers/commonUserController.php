<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use App\Models\User_info;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class commonUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // if ($request->path() === 'user/register') {
        //     return view('users.facilitatorParticipantRegisteration');
        // }
        if ($request->path() === 'forgotPassword') {
            return view('username-email');
            // return view('forgot-password');
        } elseif ($request->path() === 'getForgotPasswordQuestions') {
            $request->validate([
                'user_name' => 'required|string',
            ]);
            $questions = DB::table('users')
                ->where('users.email', $request->user_name)
                ->select('users.f_q', 'users.s_q', 'users.t_q', 'users.email')
                ->get();
            $user_name = $request->user_name;
            return view('forgotten-password-questions', compact('questions', 'user_name'));
        } elseif ($request->path() === 'userChangePassword') {
            $user_name =  $request->user_name;
            $request->validate([
                'f_q' => 'required|string',
                's_q' => 'required|string',
                't_q' => 'required|string',
                'f_a' => 'required|string',
                's_a' => 'required|string',
                't_a' => 'required|string',
            ]);
            $questions = DB::table('users')
                ->where('users.email', $request->user_name)
                ->select('users.f_q', 'users.s_q', 'users.t_q', 'users.email', 'users.f_a', 'users.s_a', 'users.t_a')
                ->get();


            if (Hash::check($request->f_a, $questions[0]->f_a)) {
                if (Hash::check($request->s_a, $questions[0]->s_a)) {
                    if (Hash::check($request->t_a, $questions[0]->t_a)) {
                        return view('change-forgotten-password', compact('user_name'));
                    } else {
                        return "third anwser failed!";
                    }
                } else {
                    return "second answer failed!";
                }
            } else {
                return "first answer failed!";
            }
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
        if (Gate::allows(ability: 'is-facilitator') || Gate::allows(ability: 'is-facilitator')) {

            if ($request->path() == 'user/passwordChange') {
                $request->validate([
                    'password' => 'required|string|confirmed',
                    'password_confirmation' => 'required|string',
                    'old_password' => 'bail|required|string',
                ]);
                // return Hash::make($request->new_password);
                if (Hash::check($request->old_password, auth()->user()->password)) {
                    // return "dfsdklfj";
                    DB::table('users')
                        ->where('id', auth()->user()->id)
                        ->update([
                            'password' => Hash::make($request->password),
                        ]);
                    return redirect('user/profile/' . auth()->user()->id)->with('password_changed', 'ستاسي پاسورډ بدلون وکړ!');
                } else {
                    throw ValidationException::withMessages(['old_password' => 'پخوانی پاسورډ صحیح ندی!']);

                    return "old password incorrect!!!!!";
                }
            }
            if ($request->path() === 'addNewPassword') {
                $request->validate([
                    'password' =>  ['required', 'string', new Password, 'confirmed'],
                    'password_confirmation' => 'required|string',
                ]);
                DB::table('users')
                    ->where('email', $request->user_name)
                    ->update([
                        'password' => Hash::make($request->password),
                    ]);
                return redirect('login');
            } elseif ($request->path() === 'userRegister') {
                // return "sdklfjsd";
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
                    'password' => ['required', 'string', new Password, 'confirmed'],
                    'password_confirmation' => 'required|string',
                    'f_q' => 'required|string',
                    's_q' => 'required|string',
                    't_q' => 'required|string',
                    'f_a' => 'required|string',
                    's_a' => 'required|string',
                    't_a' => 'required|string',
                ]);
                $member = new User;
                $member->name = $request->member_name;
                $member->email = $request->email;
                $member->password = Hash::make($request->password);
                $member->f_q = $request->f_q;
                $member->f_a = $request->f_a;
                $member->s_q = $request->s_q;
                $member->s_a = $request->s_a;
                $member->t_q = $request->t_q;
                $member->t_a = $request->t_a;
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
                return back()->with('member_added', 'یاد شخص سسیسټم ته په کامیابۍ سره ثبت کړل سو!');
            } elseif ($request->path() == 'user/questionsChange') {
                // return $request->f_a;
                $request->validate([
                    'f_q' => 'required|string',
                    's_q' => 'required|string',
                    't_q' => 'required|string',
                    'f_a' => 'required|string',
                    's_a' => 'required|string',
                    't_a' => 'required|string',
                    'old_password' => 'required|string',
                ]);
                if ($request->f_q !== $request->s_q && $request->s_q !== $request->t_q && $request->f_q !== $request->t_q) {
                    if (Hash::check($request->old_password, auth()->user()->password)) {
                        DB::table('users')
                            ->where('id', auth()->user()->id)
                            ->update([
                                'f_q' => $request->f_q,
                                'f_a' => $request->f_a,
                                's_q' => $request->s_q,
                                's_a' => $request->s_a,
                                't_q' => $request->t_q,
                                't_a' => $request->t_a,
                            ]);
                        return redirect('user/profile/' . auth()->user()->id)->with('questions_changed', 'مخاظوي پوښتني بدلون وموند!');
                    } else {
                        throw ValidationException::withMessages(['old_password' => 'پخوانی پاسورډ صحیح ندی!']);
                    }
                } else {
                    return back()->with('questions_dif', 'پوښتني باید بېل بېل وي!');
                }
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
        if (Gate::denies(ability: 'logged-in')) {
            dd('can not access!');
        }
        if (Gate::allows(ability: 'is-facilitator') || Gate::allows(ability: 'is-participant')) {
            if ($request->path() == 'user/userEnroledPrograms/' . $id) {
                // return "askdjflkas";
                if (Gate::denies(ability: 'logged-in')) {
                    return "no access allowed!";
                }
                $enrolledPrograms = DB::table('programs')
                    ->join('role_user', 'programs.id', '=', 'role_user.program_id')
                    ->select('programs.*', 'role_user.*')
                    ->where('role_user.user_id', auth()->user()->id)
                    ->get();
                $programs = DB::table('role_user')
                    ->select('role_user.program_id')
                    ->where('role_user.user_id', auth()->user()->id)
                    ->get();

                $programs_ids = array();

                foreach ($programs as $program_id) {
                    array_push($programs_ids, $program_id->program_id);
                }
                $notEnrolledPrograms = Program::whereNotIn('id', $programs_ids)->paginate(5);
                return view('users.facilitator-participant-enrolled-programs', compact('enrolledPrograms', 'notEnrolledPrograms'));
            } elseif ($request->path() == 'user/enrolledPdcProgramInfo/' . $id) {
                if (Gate::denies(ability: 'logged-in')) {
                    return "no access allowed!";
                }
                if (Gate::allows(ability: 'is-facilitator') || Gate::allows(ability: 'is-participant')) {

                    if (session()->get('u_role') != null) {
                        $programs = DB::table('programs')->join('role_user', 'programs.id', '=', 'role_user.program_id')
                            ->where([['programs.id', $id], ['role_user.role_id', session()->get('u_role')], ['role_user.user_id', auth()->user()->id]])->get();
                        $programs[0]->role_id;
                    } elseif ($request->role_id != null) {
                        // return  $request->role_id;
                        $programs = DB::table('programs')->join('role_user', 'programs.id', '=', 'role_user.program_id')
                            ->where([['programs.id', $id], ['role_user.role_id', $request->role_id], ['role_user.user_id', auth()->user()->id]])->get();
                        $programs[0]->role_id;
                    } else {
                        return redirect('user/userEnroledPrograms/' . $id);
                    }



                    $results = DB::table('programs')
                        ->join('results', 'programs.id', '=', 'results.program_id')
                        ->where('programs.id', $id)->get();
                    $evaluations = DB::table('programs')
                        ->join('evaluations', 'programs.id', '=', 'evaluations.program_id')
                        ->where('programs.id', $id)->get();
                    $facilities = DB::table('programs')
                        ->join('facilities', 'programs.id', '=', 'facilities.program_id')
                        ->where('programs.id', $id)->get();
                    $materials = DB::table('programs')
                        ->join('materials', 'programs.id', '=', 'materials.program_id')
                        ->where('programs.id', $id)->get();
                    $user_role = auth()->user()->id;
                    $u_role = $request->role_id;
                    return view('users.facil-part-enroll-program-info', compact('programs', 'results', 'evaluations', 'facilities', 'u_role'));
                }
                // if (Gate::allows(ability: 'is-participant')) {
                //     $user_role = 3;
                // }
            } elseif ($request->path() == 'user/materials/' . $id) {
                $programMaterials = Program::with('getMaterials')->find($id);
                $program_id = $id;
                $u_role = $request->role_id;

                return view('users.files-download', compact('programMaterials', 'program_id', 'u_role'));
            } elseif ($request->path() == 'user/downloadMaterial/' . $id) {
                return Storage::download('public/programFiles/' . $id);
                // return view('users.files-download', compact('programMaterials', 'program_id'));
            } elseif ($request->path() == 'user/viewMaterial/' . $id) {
                $path = 'storage/programFiles/' . $id;
                return view('users.viewFile', compact('path'));
            } elseif ($request->path() == 'user/feedbackAnswer/' . $id) {

                $materials =  DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->select('feedbacks.id as feedbackFormId', 'fquestionnaires.*')
                    ->where([
                        ['feedbacks.program_id', '=', $id],
                        ['fquestionnaires.question_category', '=', 'د ورکشاپ/ټرېنینګ مواد']
                    ])
                    ->get();
                $facilities =  DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->select('feedbacks.id', 'fquestionnaires.*')
                    ->where([
                        ['feedbacks.program_id', '=', $id],
                        ['fquestionnaires.question_category', '=', 'آسانتیاوي']
                    ])
                    ->get();
                $locations =  DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->select('feedbacks.id', 'fquestionnaires.*')
                    ->where([
                        ['feedbacks.program_id', '=', $id],
                        ['fquestionnaires.question_category', '=', 'ځاي']
                    ])
                    ->get();
                $comments =  DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->select('feedbacks.id', 'fquestionnaires.*')
                    ->where([
                        ['feedbacks.program_id', '=', $id],
                        ['fquestionnaires.question_category', '=', 'عمومي نظر']
                    ])
                    ->get();
                $program_id = $id;
                //
                // $programs = DB::table('programs')->get();
                // return $facilities;
                // $program_id = $id;
                if (count($materials) === 0 && count($facilities) === 0 && count($locations) === 0 && count($comments) === 0) {
                    // return "null quesntions";
                    // return 'lkjdfa';
                    throw ValidationException::withMessages(['field_name' => 'تر اوسه د پروګرام لپاره پوښتنلیک ندی اضافه کړل سوی!']);
                    return back()->with('null_form', 'یاد پروګرام په سیسټم کي ونه موندل سو!');

                    // return back()->with('null_form', 'د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!');
                }
                if (count($materials) === 0 || count($facilities) === 0 || count($locations) === 0 || count($comments) === 0) {
                    // return "null quesntions";
                    throw ValidationException::withMessages(['field_name' => 'تر اوسه د پروګرام لپاره پوښتنلیک ندی اضافه کړل سوی!']);

                    return back()->with('warn', 'د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!');
                } else {
                    $u_role = $request->role_id;

                    return view('users.pdc-feedback-answer', compact('materials', 'facilities', 'locations', 'comments', 'program_id', 'u_role'));
                }
            } elseif ($request->path() == 'user/profile/' . auth()->user()->id) {
                $user_info = DB::table('users')
                    ->join('user_infos', 'users.id', '=', "user_infos.user_id")
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->where([
                        // ['role_user.role_id', [2, 3]],
                        ['role_user.user_id',  $request->user()->id]
                    ])
                    ->get();
                return view('users.user-profile', compact('user_info'));
            } elseif ($request->path() == 'user/questionsChange/' . auth()->user()->id) {
                $questions = DB::table('users')
                    ->where('users.id', auth()->user()->id)
                    ->select('users.f_q', 'users.s_q', 'users.t_q')
                    ->get();
                // return $questions;
                return view('users.user-secret-questions', compact('questions'));
                // return "sldkfjsdlk";
            }
            if ($request->path() == 'user/passwordChange/' . auth()->user()->id) {
                // return "slkdfjskldfjsdlkfjsdlfksdjflksdjf";
                return view('users.user-change-password');
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
        if (Gate::denies(ability: 'logged-in')) {
            dd('can not access!');
        }
        if (Gate::allows(ability: 'is-facilitator') || Gate::allows(ability: 'is-participant')) {
            if ($request->path() == 'user/profile/' . auth()->user()->id . '/edit') {
                $user = DB::table('users')->join('user_infos', 'users.id', '=', 'user_infos.user_id')
                    ->where('users.id', auth()->user()->id)
                    ->get();
                return view('users.facilitatorParticipantedit', compact('user'));
            }
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
        if (Gate::denies(ability: 'logged-in')) {
            dd('can not access!');
        }
        if (Gate::allows(ability: 'is-facilitator') || Gate::allows(ability: 'is-participant')) {
            $validate = $request->validate([
                'user_name' => 'bail|required|string|max:30',
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
            // return $user;
            // return $user->last_name;
            // return $request->last_name;
            $member->name = $request->user_name;
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
            return redirect('/user/profile/' . auth()->user()->id)->with('profile_edited', 'ستاسي معلومات اصلاح کړل سوه!');
            // return "sdf";
        }
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
