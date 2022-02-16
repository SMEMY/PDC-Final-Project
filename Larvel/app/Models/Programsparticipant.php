<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programsparticipant extends Model
{
    use HasFactory;

    public $timestamps = false;
    // These are Reverse (ONE - TO - MANY) relationships
    protected $table = 'programsparticipants';
}
