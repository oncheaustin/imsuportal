<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class choice extends Model
{
    protected $table = "choice";
    public $timestamps = false;
    public function app() {
        return $this->hasMany(app::class,'appid','appid');
    }

    public function jamb() {
        return $this->hasMany(jamb::class,'appid','appid');
    }
  
   
    public function olevel() {
        return $this->hasMany(olevel::class,'appid','appid');
    }
    public function user() {
        return $this->hasMany(User::class,'appid','appid');
    }
    //
}
