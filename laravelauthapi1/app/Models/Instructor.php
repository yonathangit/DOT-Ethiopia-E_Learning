<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Instructor extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'grandfathername',
        'gender',
        'level_of_study',
        'field_of_study',
        'address',
        'country',
        'city',
        'area_of_expertise',
        'phone_number',
        'description',
        'email',
        'password',

    ];

    public function users() {
        return $this->morphOne(User::class, 'userable');
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
   
}
