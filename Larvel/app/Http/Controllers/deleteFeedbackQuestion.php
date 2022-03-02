<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Fquestionnaire;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class deleteFeedbackQuestion extends Controller
{
    //
    function deleteQuestion($id)
    {
        if (Gate::allows(ability: 'is-admin')) {
            $check = Fquestionnaire::find($id);
            if ($check !== null) {
                $feedbackFormID = DB::table('fquestionnaires')->select('feedback_form_id')->where('id', $id)->get();
                $programID = DB::table('feedbacks')->select('program_id')->where('id',  $feedbackFormID[0]->feedback_form_id)->get();

                Fquestionnaire::find($id)->delete();
                $check1 =  DB::table('feedbacks')
                    ->join('fquestionnaires', 'feedbacks.id', '=', 'fquestionnaires.feedback_form_id')
                    ->select('feedbacks.id as feedbackFormId', 'fquestionnaires.*')
                    ->where('feedbacks.program_id', '=', $programID[0]->program_id)
                    ->get();
                if (count($check1) !== 0) {
                    return back()->with('question_deleted', "پوښتنه په کامیابۍ سره د سیسټم څخه وران کړل سو!");
                } else {
                    DB::table('feedbacks')->where('id', $feedbackFormID[0]->feedback_form_id)->delete();
                    return redirect('pdcProgramInfo/' . $programID[0]->program_id)->with('questionnaire_deleted', "پوښتنلیک د یاد پروګرام لپاره د سیسټم څخه له منځه یوړل سو!");
                }
            } else {
                return back()->with('question_not_found', "یاده پوښتنه په سیسټم کي وجود نه لري!");
            }
        }
        dd('you need to be admin');
    }
    function deleteProgramQuestionnaire($id)
    {
        if (Gate::allows(ability: 'is-admin')) {
            $check = DB::table('feedbacks')->where('program_id', $id)->get();
            if (count($check) === 0) {
                return back()->with('questionnaire_not_found', "یاد پوښتلیک سیسټم کي پیدا  نسو د ډلیټ کولو لپاره!");
            } elseif (count($check) !== 0) {
                DB::table('feedbacks')->where('program_id', $id)->delete();
                return redirect('pdcProgramInfo/' . $id)->with('questionnaire_deleted', "پوښتنلیک د یاد پروګرام لپاره د سیسټم څخه له منځه یوړل سو!");
            }
        }
        dd('you need to be admin');

        // return
    }
}
