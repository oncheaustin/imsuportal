<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admincontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return "adsf";
    }
    
    public function login(){
        return "adasdfasdf";
    }
    //
}
