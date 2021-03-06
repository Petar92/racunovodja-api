<?php

namespace App\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'user';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city', 'street'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function employees()
    {
        return $this->hasMany('App\Employee\Employee');
    }

    public function relations()
    {
        return $this->hasMany('App\Relation\Relation');
    }

    public function lokacije()
    {
        return $this->hasMany('App\Lokacija\Lokacija');
    }

    public function dobavljaci()
    {
        return $this->hasMany('App\Dobavljac\Dobavljac');
    }

    public function otherSettings()
    {
        return $this->hasMany('App\OtherSettings\OtherSetting');
    }
}
