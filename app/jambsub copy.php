<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jambsub extends Model
{
    public $timestamps = false;
    protected $table = "jambsub";
    protected $fillable = [
        'name'
    ];
    //
}
