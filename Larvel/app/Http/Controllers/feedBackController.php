<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Fquestionnaire;
use App\Models\Feedback;
use App\Models\Feedbackcomment;
use App\Models\Feedbackanswer;



class feedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "i am feedback Controller!";
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
        if (Gate::allows(ability: 'is-admin')) {
            $request->validate([
                'materials_answer.*' => 'bail|string|in:ډېر ښه,ښه,متوسط,بد',
                'facilities_answer.*' => 'bail|string|in:ډېر ښه,ښه,متوسط,بد',
                'locations_answer.*' => 'bail|string|in:ډېر ښه,ښه,متوسط,بد',
                'opinions_answer.*' => 'bail|string|in:ډېر ښه,ښه,متوسط,بد',
                'comment' => 'bail|required|max:500',
            ]);

            $comment = new Feedbackcomment;
            $comment->feedback_form_id = $request->feedback_form_id;
            $comment->comment = $request->comment;
            $comment->save();
            // $programId = DB::table('feedbackcomments')
            // ->where('id', $request->feedback_form_id)
            // ->update(['comment'=> $request->comment]);
            // echo $request->facilities[0];

            for ($i = 0; $i < count($request->materials); $i++) {
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer = $request->materials_answer[$i];
                $questionAnswer->question_id = $request->materials[$i];
                $questionAnswer->save();
            }
            for ($i = 0; $i < count($request->facilities); $i++) {
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer = $request->facilities_answer[$i];
                $questionAnswer->question_id = $request->facilities[$i];
                $questionAnswer->save();
            }
            for ($i = 0; $i < count($request->locations); $i++) {
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer =  $request->locations_answer[$i];
                $questionAnswer->question_id = $request->locations[$i];
                $questionAnswer->save();
            }
            for ($i = 0; $i < count($request->opinions); $i++) {
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer = $request->opinions_answer[$i];
                $questionAnswer->question_id = $request->opinions[$i];
                $questionAnswer->save();
            }
            if ($request->path() == 'user/feedback') {
                return redirect('user/enrolledPdcProgramInfo/' . $request->program_id)->with('success_questionnaire', 'د یاد پروګرام پوښتنلیک په کامیابۍ سره ډک کړل سو!');
            } elseif ($request->path() == 'admin/feedback') {
                return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('success_questionnaire', 'د یاد پروګرام پوښتنلیک په کامیابۍ سره ډک کړل سو!');
            } else {
                return "path not found!";
            }
        }
        // return back()->with('success_questionnaire', 'د یاد پروګرام پوښتنلیک په کامیابۍ سره ډک کړل سو!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // return Feedback::all();
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/feedback/' . $id) {
                // return "kjsda";
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
                // return "sdjfhsdkj"
                // $programs = DB::table('programs')->get();
                // return $facilities;
                // $program_id = $id;
                if (count($materials) === 0 && count($facilities) === 0 && count($locations) === 0 && count($comments) === 0) {
                    return back()->with('warn', "د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!");
                } else {
                    return view('admin.pdc-feedback', compact('materials', 'facilities', 'locations', 'comments', 'program_id'));
                }
            } elseif ($request->path() === 'admin/feedbackAnswer/' . $id) {
                // return "hasdkjadh";
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
                    return back()->with('warn', "د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!");
                }
                if (count($materials) === 0 || count($facilities) === 0 || count($locations) === 0 || count($comments) === 0) {
                    return back()->with('warn', "د یاد سیسټم لپاره تر اوسه پوښتتنلیک سیسټم ته ندی اضافه کړل سوی!");
                } else {
                    return view('admin.pdc-feedback-answer', compact('materials', 'facilities', 'locations', 'comments', 'program_id'));
                }
            }
        } else {
            dd('you need to be admin');
        }


        // return "i am feed show function()";
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
            if ($request->path() === 'admin/feedback/' . $id . '/edit') {
                $materials =  DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->select('feedbacks.id as feedbackFormId', 'fquestionnaires.*')
                    ->where('feedbacks.program_id', '=', $id)
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
                return view('admin.pdc-edit-program-feedback-uploader', compact('materials', 'facilities', 'locations', 'comments', 'program_id'));
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
        //
        if (Gate::allows(ability: 'is-admin')) {
            if ($request->path() === 'admin/feedback/' . $request->program_id) {
                // return "sdfmsd";
                $request->validate([
                    'feedback_question_category.*' => 'bail|required|string|in:د ورکشاپ/ټرېنینګ مواد,آسانتیاوي,ځاي,عمومي نظر',
                    'feedback_question.*' => 'bail|required|string|max:100',
                ]);
                for ($index = 0; $index < count($request->feedback_question); $index++) {
                    $check = Fquestionnaire::find($request->question_id[$index]);
                    if ($check !== null) {
                        DB::table('fquestionnaires')
                            ->where('fquestionnaires.id', $request->question_id[$index])
                            ->update([
                                'question' => $request->feedback_question[$index],
                                'question_category' => $request->feedback_question_category[$index]
                            ]);
                    } else {
                        return back()->with('feedback_question_not_found', "یاد پوښتنه په سیسټم کي د اصلاح کولو لپاره شتون نلري!");
                    }
                }
                if (count($request->feedback_new_question) > 1) {
                    $feedFormId = DB::table('fquestionnaires')->select('fquestionnaires.feedback_form_id')->where('id', $request->question_id[0])->get();

                    $request->validate([
                        'feedback_question_new_category.*' => 'bail|required|string|in:د ورکشاپ/ټرېنینګ مواد,آسانتیاوي,ځاي,عمومي نظر',
                        'feedback_new_question.*' => 'bail|required|string|max:100',
                    ]);
                    DB::table('feedbacks')->insert(['program_id' => $request->program_id]);
                    $programID =  DB::table('feedbacks')->select('feedbacks.id')->where('created_at', DB::table('feedbacks')->max('created_at'))->get();
                    for ($index = 1; $index < count($request->feedback_new_question); $index++) {
                        $questionnairQuestion = new Fquestionnaire;
                        $questionnairQuestion->question_category = $request->feedback_question_new_category[$index];
                        $questionnairQuestion->question = $request->feedback_new_question[$index];
                        $questionnairQuestion->feedback_form_id = $feedFormId[0]->feedback_form_id;
                        $questionnairQuestion->save();
                    }
                }
                return redirect('admin/feedback/' . $request->program_id)->with('feedback_edited', "پوښتنلیک په کامیابۍ سره اصلاح کړل سو!");
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
    public function destroy($id)
    {
        //
    }
}
