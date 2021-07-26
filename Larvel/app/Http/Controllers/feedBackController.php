<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
Use App\Models\Fquestionnaire;
Use App\Models\Feedback;
Use App\Models\Feedbackanswer;



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
        //    return $request->feedback_form_id;
                $programId = DB::table('feedbacks')
                ->where('id', $request->feedback_form_id)
                ->update(['comment'=> $request->comment]);
            // echo $request->facilities[0];
            
            for ($i=0; $i <count($request->materials) ; $i++) { 
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer = $request->materials_answer[$i];
                $questionAnswer->question_id = $request->materials[$i];
                $questionAnswer->save();
            }
            for ($i=0; $i <count($request->facilities) ; $i++) { 
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer = $request->facilities_answer[$i];
                $questionAnswer->question_id = $request->facilities[$i];
                $questionAnswer->save();
            }
            for ($i=0; $i <count($request->locations) ; $i++) { 
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer =  $request->locations_answer[$i];
                $questionAnswer->question_id = $request->locations[$i];
                $questionAnswer->save();
            }
            for ($i=0; $i <count($request->opinions) ; $i++) { 
                $questionAnswer = new Feedbackanswer;
                $questionAnswer->answer = $request->opinions_answer[$i];
                $questionAnswer->question_id = $request->opinions[$i];
                $questionAnswer->save();
            }
            return redirect('pdcProgramInfo/'.$request->program_id);
        
       
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
        if($request->path() === 'feedback/'.$id)
        {
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
             ] )
            ->get();
            $comments =  DB::table('feedbacks')
            ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
            ->select('feedbacks.id', 'fquestionnaires.*')
            ->where([
                ['feedbacks.program_id', '=', $id],
                ['fquestionnaires.question_category', '=', 'عمومي نظر']
               ] )
            ->get();
            $program_id = $id;
            //
            // $programs = DB::table('programs')->get();
            // return $facilities;
            // $program_id = $id;
            return view('pdc-feedback', compact('materials','facilities','locations','comments', 'program_id'));
        }
       
        return "i am feed show function()";
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
        if($request->path() === 'feedback/'.$id.'/edit'){
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
             ] )
            ->get();
            $comments =  DB::table('feedbacks')
            ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
            ->select('feedbacks.id', 'fquestionnaires.*')
            ->where([
                ['feedbacks.program_id', '=', $id],
                ['fquestionnaires.question_category', '=', 'عمومي نظر']
               ] )
            ->get();
            $program_id = $id;
            //
            // $programs = DB::table('programs')->get();
            // return $facilities;
            return view('pdc-edit-program-feedback-uploader', compact('materials','facilities','locations','comments', 'program_id'));
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

        if($request->path() === 'feedback/'.$request->program_id)
        {
            $request->validate([
                'feedback_question_category.*' => 'bail|required|string|in:د ورکشاپ/ټرېنینګ مواد,آسانتیاوي,ځاي,عمومي نظر',
                'feedback_question.*' => 'bail|required|string|max:100',
            ]);
            for($index = 0; $index<count($request->feedback_question); $index++)
            {
                $check = Fquestionnaire::find($request->question_id[$index]);
                if($check !== null)
                {
                    DB::table('fquestionnaires')
                    ->where('fquestionnaires.id', $request->question_id[$index])
                    ->update([
                        'question' => $request->feedback_question[$index],
                        'question_category' => $request->feedback_question_category[$index]
                    ]);
                }
                else{
                    return back()->with('feedback_question_not_found', "یاد پوښتنه په سیسټم کي د اصلاح کولو لپاره شتون نلري!");
                }
            }
            if(count($request->feedback_new_question) > 1)
            {
                $feedFormId = DB::table('fquestionnaires')->select('fquestionnaires.feedback_form_id')->where('id', $request->question_id[0])->get();
                
                $request->validate([
                    'feedback_question_new_category.*' => 'bail|required|string|in:د ورکشاپ/ټرېنینګ مواد,آسانتیاوي,ځاي,عمومي نظر',
                    'feedback_new_question.*' => 'bail|required|string|max:100',
                ]);
                DB::table('feedbacks')->insert(['program_id' => $request->program_id]);
                $programID =  DB::table('feedbacks')->select('feedbacks.id')->where('created_at',DB::table('feedbacks')->max('created_at') )->get();
                for($index = 1; $index < count($request->feedback_new_question);$index++)
                {   
                    $questionnairQuestion = new Fquestionnaire;
                    $questionnairQuestion->question_category = $request->feedback_question_new_category[$index];
                    $questionnairQuestion->question = $request->feedback_new_question[$index];
                    $questionnairQuestion->feedback_form_id = $feedFormId[0]->feedback_form_id;
                    $questionnairQuestion->save();
                }
            }
         return redirect('feedback/'.$request->program_id)->with('feedback_edited', "پوښتنلیک په کامیابۍ سره اصلاح کړل سو!");
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
