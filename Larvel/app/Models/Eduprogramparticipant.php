<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eduprogramparticipant extends Model
{
    use HasFactory;
    public $timestamps = false;

    // These are Reverse (ONE - TO - ONE) relationships
    // function EducationalProgram()
    // {
    //     return $this->belongsTo('App\Models\Eduprogram');
    // }
}
