<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View; 
use Auth;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;

use Redirect;

use Illuminate\Routing\Controller as BaseController;
use form; 
class Lcontroller extends BaseController
{

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/student');
        Auth::guard('admin')->logout();
       
      }
    public function login(Request $request){
          
       
        if(Auth::check())return redirect()->intended('/profile');
        if ($request->isMethod('GET')) {
            return View::make("login");
        }
     
        if ($request->isMethod('POST')) { 
            $rules = array(
                'jamb_regno'    => 'required', // make sure the email is an actual email
                'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
            );
            
            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);
            
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::to('student')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {
            
                // create our user data for the authentication
                $userdata = array(
                    'jamb_regno'     => Input::get('jamb_regno'),
                    'password'  => Input::get('password')
                );
            
                // attempt to do the login
                if (Auth::attempt($userdata)) { 

                    return redirect()->intended('/profile');
            
                } else {        
            
                    // validation not successful, send back to form 
  return Redirect::to('student')->withErrors(['error'=>'Jamb Regno Or Password Not Correct'])->withInput(Input::except('password'));
            
                }
            
            }
        }
      }
    
}
