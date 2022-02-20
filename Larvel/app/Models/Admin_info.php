<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable; 

class Admin_info extends Authenticatable
{
    // use HasFactory;
    use HasFactory, Notifiable; 
    public $timestamps = false;
    protected $fillable = ['name', 'last_name', 'email', 'phone_number', 'password', 'first_question', 'first_answer', 'second_question', 'second_answer', 'third_question', 'third_answer'];
}
