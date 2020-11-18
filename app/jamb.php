<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jamb extends Model
{
    protected $table = "jamb";
    public $timestamps = false;

    public function app() {
        return $this->hasMany(app::class,'appid','appid');
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
   
    //
}
