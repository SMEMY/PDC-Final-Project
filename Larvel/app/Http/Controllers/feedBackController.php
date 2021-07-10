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

        return "hahahaah SAVE!!!!";
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Feedback::all();
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
        return view('feedback', compact('materials','facilities','locations','comments', 'program_id'));
        return "i am feed show function()";
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
