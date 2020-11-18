<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View; 
use Auth;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Input;

use Redirect;

use Illuminate\Routing\Controller as BaseController;
use form; 
class Rcontroller extends BaseController
{
    //
    public  function randomPrefix($length)
     {
     $random= "";
     
     srand((double)microtime()*1000000);
     
     $data = "123IJKLMN67QRSTUVWXYZ"; 
     $data .= "0FGH45OP89";
     
     for($i = 0; $i < $length; $i++)
     {
     $random .= substr($data, (rand()%(strlen($data))), 1);
     }
     
     return $random;
     }

      function register(Request $req){
        if(Auth::check())return redirect()->intended('/profile');
        if ($req->isMethod('GET')) {
            return View::make("register");
        }
        if ($req->isMethod('POST')) {
            
            $rules = array(
              
                'middlename'    => 'required',
                'lastname'    => 'required', 
                'jamb'    => 'required',  
                'phone'    => 'required|unique:users|| regex:/^([0-9\s\-\+\(\)]*)$/',  
                'email'    => 'required|email|unique:users',  
                'password' => 'required|string|confirmed',
            );
           // dd(Input::all());
            
            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);
            
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::to('register')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {
            
                // create our user data for the authentication
                $session=DB::table('setup')->where('state','1')->value('session');
                User::create(
                    [
                   // 'firstname' => $req->firstname,
                    'middlename' => $req->middlename,
                    'lastname' => $req->lastname,
                    //'mode' => $req->mode,
                    'phone' => $req->phone,
                    'jamb_regno' => $req->jamb,
                    'email' => $req->email,
                    
                'session'=>$session,
                    'appid'=>Rcontroller::randomPrefix(5), 
                    'password' => Hash::make($req->password),
                     ]
                );
                   
                return View::make("login")->with('success','Account Successfully Created ') ;
    
            } 
        }

    }
}
