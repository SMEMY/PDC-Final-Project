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
}
