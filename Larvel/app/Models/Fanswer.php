<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fanswer extends Model
{
    use HasFactory;

    // These are reverse (ONE - TO - ONE) relationships
    // function feedbackQuestionAnswer()
    // {
    //     return $this->belongsTo('App\Models\Fquestionnaire');
    // }
}
