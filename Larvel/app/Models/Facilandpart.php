<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilandpart extends Model
{
    use HasFactory;

    // These are (ONE - TO - MANY) relationships
    function getAttendances()
    {
        return $this->hasMany('App\Models\Attendance');
    }
    function getPayments()
    {
        return $this->hasMany('App\Models\Payment');
    }
    function getProgramFacilitators()
    {
        return $this->hasMany('App\Models\Programsfacilitator');
    }
    function getProgramsParticipants()
    {
        return $this->hasMany('App\Models\Programsparticipant');
    }
    function getProgramsFeedbacks()
    {
        return $this->hasMany('App\Models\Feedbak');
    }

    // These are (ONE - TO - ONE) relationships
    // function getProgramParticipantAndFacilitatorEducationalRank()
    // {
    //     return $this->hasOne('App\Models\Fpeducationalrank');
    // }

}
