<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    
    protected $table = "schools";
    //
    protected $fillable = [
         'schools_name','user' 
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
