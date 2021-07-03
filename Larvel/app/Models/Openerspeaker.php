<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Openerspeaker extends Model
{
    use HasFactory;
    function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
}
