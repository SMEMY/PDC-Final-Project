<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;
    public $timestamps = false;
    function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
