<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    public $timestamp=false;
    // These are (ONE - TO - MANY) relationships
    function getPhoto()
    {
        return $this->hasMany('App\Models\Photo');
    }
    function getResults()
    {
        return $this->hasMany('App\Models\Result');
    }
    function getFacilities()
    {
        return $this->hasMany('App\Models\Facility');
    }
    function getAgendas()
    {
        return $this->hasMany('App\Models\Agenda');
    }
    function getEvaluation()
    {
        return $this->hasMany('App\Models\Evaluation');
    }
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
        return $this->belongsToMany(Facilandpart::class, 'programsfacilitators');
    }
    function getProgramsParticipant()
    {
        return $this->belongsToMany(Facilandpart::class, 'programsfacilitators');
    }
    function getProgramsFeedbacks()
    {
        return $this->hasMany('App\Models\Feedbak');
    }


    // These are (ONE - TO - ONE) relationships
    function getOpenerSpeaker()
    {
        return $this->hasOne('App\Models\Openerspeaker');
    }


    // These are Reverse (ONE - TO - MANY) relationships
    // function time()
    // {
    //     return $this->belongsTo('App\Models\Time');
    // }
    // function address()
    // {
    //     return $this->belongsTo('App\Models\Address');
    // }

}
