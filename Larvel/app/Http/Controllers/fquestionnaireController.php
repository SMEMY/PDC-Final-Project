<?php

namespace App\Http\Controllers;

use App\Models\Feedback;;

use App\Models\Fquestionnaire;
use App\Models\Feedbackcomment;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class fquestionnaireController extends Controller
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
        if ($request->path() === 'admin/feedbackFormInsertion') {

            $request->validate([
                'feedback_question_category.*' => 'bail|required|string|in:د ورکشاپ/ټرېنینګ مواد,آسانتیاوي,ځاي,عمومي نظر',
                'feedback_question.*' => 'bail|required|string|max:100',
            ]);
            DB::table('feedbacks')->insert(['program_id' => $request->program_id]);
            $programID =  DB::table('feedbacks')->select('feedbacks.id')->where('created_at', DB::table('feedbacks')->max('created_at'))->get();
            for ($index = 0; $index < count($request->feedback_question); $index++) {
                $questionnairQuestion = new Fquestionnaire;
                $questionnairQuestion->question_category = $request->feedback_question_category[$index];
                $questionnairQuestion->question = $request->feedback_question[$index];
                $questionnairQuestion->feedback_form_id = $programID[0]->id;
                $questionnairQuestion->save();
            }
            return redirect('admin/pdcProgramInfo/' . $request->program_id)->with('program_part_added', "پروګرام اړونده پوښتنلیک په کامیابۍ سره سیسټم ته داخل کړل سو!");
        } else {
            return "fquestionnaireController Store() function!";
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
        if ($request->path() === 'admin/feedbackFormInsertion/' . $id) {
            $programID = $id;
            $check = DB::table('feedbacks')->where('program_id', $id)->get();
            if (count($check) === 0) {
                return view('admin.pdc-program-feedback-uploader', compact('programID'));
            } elseif (count($check) !== 0) {
                return back()->with('warn', "د یاد پروګرام لپاره مخکي پوښتنلیک سیسټم ته اضافه سوی دی!");
            }
        } elseif ($request->path() === 'admin/pdcProgramFeedbackReport/' . $id) {
            $questions = DB::table('feedbacks')
                ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                ->select('fquestionnaires.*', 'feedbacks.id as form_id')
                ->where([
                    ['feedbacks.program_id', $id]
                ])->get();
            $first = array();
            $second = array();
            $third = array();
            $fourth = array();
            for ($index = 0; $index < count($questions); $index++) {
                $firstStateAnswerCounts = DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->join('feedbackanswers', 'fquestionnaires.id', '=', 'feedbackanswers.question_id')
                    ->select('fquestionnaires.question_category', 'fquestionnaires.question', 'feedbackanswers.answer')
                    ->where([
                        ['feedbacks.program_id', $id],
                        ['feedbackanswers.question_id', '=',  $questions[$index]->id],
                        ['feedbackanswers.answer', '=', 'ښه'],
                    ])->get();
                array_push($first, count($firstStateAnswerCounts));


                $secondStateAnswerCounts = DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->join('feedbackanswers', 'fquestionnaires.id', '=', 'feedbackanswers.question_id')
                    ->select('fquestionnaires.question_category', 'fquestionnaires.question', 'feedbackanswers.answer')
                    ->where([
                        ['feedbacks.program_id', $id],
                        ['feedbackanswers.question_id', '=',  $questions[$index]->id],
                        ['feedbackanswers.answer', '=', 'ډېر ښه'],
                    ])->get();
                array_push($second, count($secondStateAnswerCounts));


                $thirdStateAnswerCounts = DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->join('feedbackanswers', 'fquestionnaires.id', '=', 'feedbackanswers.question_id')
                    ->select('fquestionnaires.question_category', 'fquestionnaires.question', 'feedbackanswers.answer')
                    ->where([
                        ['feedbacks.program_id', $id],
                        ['feedbackanswers.question_id', '=',  $questions[$index]->id],
                        ['feedbackanswers.answer', '=', 'متوسط'],
                    ])->get();
                array_push($third, count($thirdStateAnswerCounts));


                $fourthStateAnswerCounts = DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->join('feedbackanswers', 'fquestionnaires.id', '=', 'feedbackanswers.question_id')
                    ->select('fquestionnaires.question_category', 'fquestionnaires.question', 'feedbackanswers.answer')
                    ->where([
                        ['feedbacks.program_id', $id],
                        ['feedbackanswers.question_id', '=',  $questions[$index]->id],
                        ['feedbackanswers.answer', '=', 'بد'],
                    ])->get();
                array_push($fourth, count($fourthStateAnswerCounts));
            }
            if (count($questions) !== 0) {
                $comments = Feedbackcomment::where('feedback_form_id', $questions[0]->form_id)->get();
            }
            if (count($first) === 0 && count($second) === 0 && count($third) === 0 && count($fourth) === 0) {
                return back()->with('warn', 'د یاد پروګرام د پوښتنلیک راپور تر اوسه سیسټم کي وجود نلري!');
            } else {
                return view('admin.chart', compact('questions', 'first', 'second', 'third', 'fourth',  'comments'));
            }
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
        return "adfkadjf";
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
