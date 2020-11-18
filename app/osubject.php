<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class osubject extends Model
{
    public $timestamps = false;
    protected $table = "osubject";
    protected $fillable = [
        'name'
    ];
    //
}
