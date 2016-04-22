<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class reg_user extends Authenticatable
{
    protected $fillable=array('email','username','password','password_temp','code','active');
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    Protected $table='User';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
