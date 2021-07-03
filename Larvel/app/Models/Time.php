<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    // These are (ONE - TO - MANY) relationships
    function getProgram()
    {
        return $this->hasMany('App\Models\Program');
    }
    function getEducationalProgram()
    {
        return $this->hasMany('App\Models\Eduprogram');
    }
}
