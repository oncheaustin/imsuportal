<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $table = "department";

    protected $fillable = [
        'department_name','user' 
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'user' 
   ];
    //
}
