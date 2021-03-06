<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'f_q',
        'f_a',
        's_q',
        's_a',
        't_q',
        't_a',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function getAttendances()
    {
        return $this->hasMany('App\Models\User_attendance');
    }
    function userInfos()
    {
        return $this->hasOne('App\Models\User_info');
    }
    function getPayments()
    {
        return $this->hasMany('App\Models\User_payment');
    }
    function getProgramFacilitators()
    {
        return $this->belongsToMany(Program::class, 'User_role');
    }
    function getProgramsParticipants()
    {
        return $this->belongsToMany(Program::class, 'User_role');
    }
    function getProgramsFeedbacks()
    {
        return $this->hasMany('App\Models\Feedbak');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
}
