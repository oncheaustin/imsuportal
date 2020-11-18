<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;

class LoginController extends Controller
{
     
 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }

     

}
