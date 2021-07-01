<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fquestionnaire extends Model
{
    use HasFactory;

    // These are reverse (ONE - TO - MANY) relationships
    function programFeedback()
    {
        return $this->belongsTo('App\Models\Feedback');
    }

     // These are (ONE - TO - ONE) relationships
     function getFeedbackQuestionAnswer()
     {
         return $this->hasOne('App\Models\Fanswer');
     }
}
