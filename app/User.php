<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','middlename','lastname' ,'phone','email',  'password','mode','appid','jamb_regno'
    ];

    public function app() {
        return $this->hasMany(app::class,'appid','appid');
    }

    public function jamb() {
        return $this->hasMany(jamb::class,'appid','appid');
    }
  
       
    public function choice() {
        return $this->hasMany(choice::class,'appid','appid');
    }
    public function olevel() {
        return $this->hasMany(olevel::class,'appid','appid');
    }
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
