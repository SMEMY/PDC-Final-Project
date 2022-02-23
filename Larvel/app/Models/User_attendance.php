<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    // public $fillable = ['presence_days', 'absence_days', 'participant_id', 'program_id', 'total_days'];
    // These are Reverse (ONE - TO - MANY) relationships
    function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
    function programParticipantAndFacilitator()
    {
        return $this->belongsTo('App\Models\User');
    }
}
