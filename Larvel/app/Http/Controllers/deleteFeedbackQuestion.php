<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use App\Models\Fquestionnaire;

use Illuminate\Http\Request;

class deleteFeedbackQuestion extends Controller
{
    //
    function deleteQuestion($id)
    {
        $check = Fquestionnaire::find($id);
        if($check !== null)
        {
            Fquestionnaire::find($id)->delete();
            return back()->with('question_deleted', "پوښتنه په کامیابۍ سره د سیسټم څخه وران کړل سو!");
        }
        else{
            return back()->with('question_not_found', "یاده پوښتنه په سیسټم کي وجود نه لري!");
        }

    }
    function deleteProgramQuestionnaire($id)
    {
        $check = DB::table('feedbacks')->where('program_id', $id)->get();
        if(count($check) === 0 )
        {
            return back()->with('questionnaire_not_found', "یاد پوښتلیک سیسټم کي پیدا  نسو د ډلیټ کولو لپاره!");
        }
        elseif(count($check) !== 0)
        {
            DB::table('feedbacks')->where('program_id', $id)->delete();
            return redirect('pdcProgramInfo/'.$id)->with('questionnaire_deleted', "پوښتنلیک د یاد پروګرام لپاره د سیسټم څخه له منځه یوړل سو!");
        }
        // return 
    }
}
