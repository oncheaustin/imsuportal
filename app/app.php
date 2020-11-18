<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class app extends Model
{
    //
    protected $table = "app";
 

    public function jamb() {
        return $this->hasMany(jamb::class,'appid','appid');
    }
  
       
    public function choice() {
        return $this->hasMany(choice::class,'appid','appid');
    }
    public function olevel() {
        return $this->hasMany(olevel::class,'appid','appid');
    }
    public function user() {
        return $this->hasMany(User::class,'appid','appid');
    }
}
