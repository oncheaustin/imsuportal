<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{

    protected $table = "courses";
    //
    protected $fillable = [
        'course_name','user' ,'program','ab','duration','time','department_id'
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'user' 
   ];
}
