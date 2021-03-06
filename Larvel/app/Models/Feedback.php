<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public $timestamps = false;
    // These are (ONE - TO - MANY) relationships
    function getFeedbackQuestions()
    {
        return $this->hasMany('App\Models\Fquestionnaire');
    }

    function getFeedbackComments()
    {
        return $this->hasMany('App\Models\Feedbackcomment');
    }

   // These are reverse (ONE - TO - MANY) relationships
   function program()
   {
       return $this->belongsTo('App\Models\Program');
   }
   function programParticipantAndFacilitator()
   {
       return $this->belongsTo('App\Models\Facilitatorsandparticipant');
   }
}
