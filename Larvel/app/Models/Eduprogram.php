<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eduprogram extends Model
{
    use HasFactory;

    // These are (ONE - TO - ONE) relationships
    function getEducationalProgramParticipant()
    {
        return $this->hasOne('App\Models\Eduprogramparticipant');
    }

    // These are Reverse (ONE - TO - MANY) relationships
    function time()
    {
        return $this->belongsTo('App\Models\Time');
    }
    function address()
    {
        return $this->belongsTo('App\Models\Address');
    }
}
