<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class olevel extends Model
{
    protected $table = "olevel";
    public $timestamps = false;
   
    public function app() {
        return $this->hasMany(app::class,'appid','appid');
    }

    public function jamb() {
        return $this->hasMany(jamb::class,'appid','appid');
    }
  
       
    public function choice() {
        return $this->hasMany(choice::class,'appid','appid');
    }
  
    public function user() {
        return $this->hasMany(User::class,'appid','appid');
    }
    //
}
