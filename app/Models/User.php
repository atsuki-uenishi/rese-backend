<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'email' => 'required | email',
        'password' => 'required | min:6'
    );

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    public  function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }

    public function getJWTIdentifier()
{
    return $this->getKey();
}


public function getJWTCustomClaims()
{
    return [];
}
}
