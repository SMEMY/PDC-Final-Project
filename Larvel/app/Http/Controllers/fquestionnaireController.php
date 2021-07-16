<?php

namespace App\Http\Controllers;
use App\Models\Feedback;;
use App\Models\Fquestionnaire;;
use Illuminate\Support\Facades\DB;

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
        DB::table('feedbacks')
        ->insert(['program_id'=>$request->program_id]);
        $programID =  DB::table('feedbacks')->select('feedbacks.id')->where('created_at',DB::table('feedbacks')->max('created_at') )->get();
        for($index = 0; $index < count($request->feedback_question);$index++)
        {   
            $questionnairQuestion = new Fquestionnaire;
            $questionnairQuestion->question_category = $request->feedback_question_category[$index];
            $questionnairQuestion->question = $request->feedback_question[$index];
            $questionnairQuestion->feedback_form_id = $programID[0]->id;
            $questionnairQuestion->save();
        }
        return "saved questions!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $programID = $id;
        return view('feedback-uploader', compact('programID'));
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
