<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    public $timestamps = false;
    protected $table = "setting";
    protected $fillable = [
        'description','value'
    ];
    //
}
