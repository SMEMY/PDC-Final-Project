<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitatorsandparticipant extends Model
{
    use HasFactory;

    // These are (ONE - TO - MANY) relationships
    function getAttendance()
    {
        return $this->hasMany('App\Models\Attendance');
    }
    function getPayment()
    {
        return $this->hasMany('App\Models\Payment');
    }
    function getProgramFacilitator()
    {
        return $this->hasMany('App\Models\Programsfacilitator');
    }
    function getProgramsParticipant()
    {
        return $this->hasMany('App\Models\Programsparticipant');
    }
    function getProgramsFeedback()
    {
        return $this->hasMany('App\Models\Feedbak');
    }

    // These are (ONE - TO - ONE) relationships
    function getProgramParticipantAndFacilitatorEducationalRank()
    {
        return $this->hasOne('App\Models\Fpeducationalrank');
    }

}
