<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programsfacilitator extends Model
{
    use HasFactory;

    // These are Reverse (ONE - TO - MANY) relationships
    function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
    function programParticipantAndFacilitator()
    {
        return $this->belongsTo('App\Models\Facilitatorsandparticipant');
    }
}
