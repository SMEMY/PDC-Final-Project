<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbackcomment extends Model
{
    use HasFactory;
    public $timestamps = false;


    function feedbacks()
    {
        return $this->belongsTo('App\Models\Feedback');
    }
}
