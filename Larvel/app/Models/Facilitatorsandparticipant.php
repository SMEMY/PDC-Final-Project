<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitatorsandparticipant extends Model
{
    use HasFactory;
    public $timestamps = false;
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
        return $this->belongsToMany(Program::class, 'programsfacilitators');
    }
    function getProgramsParticipants()
    {
        return $this->belongsToMany(Program::class, 'programsparticipants');
    }
    function getProgramsFeedbacks()
    {
        return $this->hasMany('App\Models\Feedbak');
    }
}
