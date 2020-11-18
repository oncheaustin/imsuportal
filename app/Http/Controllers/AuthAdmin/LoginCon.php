<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Auth;
use Validator;

use PDF;
use File;
use Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use App\User;
use App\school;
use Mail;
use App\setting;
use App\fee;
use App\app;
use App\jamb;
use App\choice;
use App\olevel;
use App\course;
use App\department;

use App\registration;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginCon extends Controller
{
    function getToken($nm,$al){
        $partOne =  substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $nm);
$partTwo =  substr(str_shuffle("0123456789"), 0, $al);

    return $partTwo.$partOne;
   }

   public  function email(Request $request)
   {
    $session=DB::table('setup')->where('state','1')->value('session');
     
          $message="";
          $email='chikegodeb@gmail.com';
           $subject="$session Post- UTME/Direct Entry";
            $data = array('user'=>User::where(['appid'=>$request->id])->get()->first(),'text'=>$message);
       Mail::send('mail', $data, function($messages)  use ($email,$subject){
           $messages->to($email)->subject
              ($subject);
           $messages->from('postutme2020@imsu.edu.ng','postutme2020@imsu.edu.ng');
        });
   return "asdfasd df";    
   }


   public function utmeregister(Request $request) {
    if ($request->isMethod('GET')) {
        return view( 'admin.utmeregister');
        }

        if ($request->isMethod('POST')) {
          
            $rules = array(
                'department'    => 'nullable' ,
                'state'    => 'nullable' ,
                'session'    => 'required' ,
                'sex'    => 'nullable' ,
                'program'    => 'nullable' ,
                'ab'    => 'nullable' ,
                'course'    => 'nullable' ,
            );  
          
            $messages = array(
                'ab.required' => ' The Program Abbreviation   field is required..'
            );

            $validator = Validator::make(Input::all(), $rules,$messages);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                 return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all());
                  } else { 
                    $data=[];
                     $osub=Input::get('olevel');
                     $jambsub=Input::get('jamb');
                     $sex=Input::get('sex');
                     $states=Input::get('state');
                     $session=Input::get('session');
                $dep1=Input::get('department');
                     $dep2=Input::get('department2');
                     $course1=Input::get('course');
                     $course2=Input::get('course2');
      $olevel =@olevel::wherein('subject_id',$osub)->groupby('appid')->get()->pluck('appid')->toarray();
      $jamb =@jamb::wherein('subject_id',$jambsub)->get()->pluck('appid')->toarray();
      $app =app:: where(['sex'=>$sex])->where([ 'session'=>$session]) ->get()->pluck('appid')->toarray();
      $state =app:: where([ 'state'=>$states,'session'=>$session ])->get()->pluck('appid')->toarray();
      
if($course1)   $choice1 =choice::where(['department'=>$dep1,'no'=>1,'course'=>$course1,'session'=>$session  ])->get()->pluck('appid')->toarray();
else $choice1 =choice::where(['department'=>$dep1,'no'=>1,'session'=>$session ])->get()->pluck('appid')->toarray();
 

  

if($course2)   $choice2 =choice::where(['department'=>$dep2,'no'=>2,'course'=>$course2,'session'=>$session  ])->get()->pluck('appid')->toarray();
else $choice2 =choice::where(['department'=>$dep2,'no'=>2,'session'=>$session ])->get()->pluck('appid')->toarray();
 



if( !empty($dep1) ||!empty( $course1) ) array_push($data, $choice1);
   if(!empty($dep2) ||!empty( $course2) )  array_push($data,  $choice2);
   if( !empty($olevel) )  array_push($data,  $olevel);
   if( count($jamb)>0 )  array_push($data,  $jamb);
   if( count($app)>0 )  array_push($data,  $app);
   if(!empty($states))array_push($data,  $state);
                     //$app=  app::with(['olevel'])->whereIn('olevel.subject_id', $olevel)->get()->toarray();
                  // $app->with(['User' ,'jamb','olevel','choice']);
              //  dd( [$choice1,$choice2]);   
            ;
       
      // dd(Input::all()); 
                //   $data= [ '2nd'=>$choice2,'olevel'=>$olevel ];
                if(count($data)>1) $intersected_array = call_user_func_array('array_intersect',$data); 
                else  $intersected_array =$data; 
                
               if(count($intersected_array, COUNT_RECURSIVE)<1) {$intersected_array=[$intersected_array]; 
                $intersected_array=    array_shift($intersected_array);}
 
                if(count($intersected_array, COUNT_RECURSIVE)>1) {  
                    $intersected_array=    array_shift($intersected_array);}
                   
             $pdf = $request->input('pdf');
             if (isset($pdf)) { 
                 
                $pdf = PDF::loadView('print.utmereport',compact('intersected_array')); 
       
                return $pdf->download("UTMEport.pdf");
             }

                return redirect()->route('admin.utmeregister' )->with('data',   $intersected_array) ->withSuccess("Course $request->course Successfully Added") ->withInput(Input::all());

            }
        }
  }


    public function logout(Request $request) {
      Auth::guard('admin')->logout();
        return redirect('/admin');
      }

      public function fee(Request $request) {
        if ($request->isMethod('GET')) {
            return view( 'admin.fee');
            }

        if ($request->isMethod('POST')) {
 $rules = array(
                    'department'    => 'required' ,
                    'amount'    => 'required|numeric' ,
                    'session'    => 'required' ,
                    'course'    => 'required' ,
                    'duration'    => 'required' ,
                );
                $messages = array(
                    'ab.required' => ' The Program Abbreviation   field is required..'
                );

                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) { return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::all());
                      } else {
                        if(fee::where(['class'=>$request->duration,'session'=>$request->session,'department'=>$request->department,'course'=>$request->course])->exists()){
                            return redirect()->back()->withErrors(['error'=>'Already Exists'])->withInput(Input::all());
                        }else{
$save = new fee();
$save->amount = $request->amount;
$save->session = $request->session;
$save->user = Auth::user()->id;
$save->department = $request->department;
$save->course = $request->course;
$save->class = $request->duration;
$save->save();
return redirect()->back()->withSuccess("Fee Successfully Added");

                        }
                      }
        }
    }



      public function ars(Request $request) {
        if ($request->isMethod('GET')) {
            return view( 'admin.ars');
            }

        if ($request->isMethod('POST')) {
            $rules = array(
                'number'    => 'required' ,
            );


            $validator = Validator::make(Input::all(), $rules);


            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                 return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all());
                  }
                  else {
   $reg=registration::where(['appid' =>$request->number])->orwhere(['reg_no' =>$request->number]);
  if($reg->exists()){


      $duration=course::where(['id' =>$reg->value('course')])->value('duration');
    //  return dd(Input::all());
    if($request->has('pin')){
    $rule = array(
        'pin.*'    => 'required' ,
    );

    $valid = Validator::make(Input::all(), $rule);
    // if the validator fails, redirect back to the form


    if ($valid->fails()) {
        return view( 'admin.ars',array('duration'=>$duration,'information'=>$reg->value('appid')))
        ->withErrors($valid) // send back all errors to the login form
        ->withInput(Input::all());
    }
        else{
            $errors = new MessageBag;
 $i=0;
 $err="";
            foreach(Input::get('pin') as $quan) {
               $i++;
                $re=registration::where(['appid' =>$reg->value('appid'),'csn' => $quan,'duration'=>$i]);

                if(!$re->exists()){
                    $err="0";
                     $errors->add("$quan" , "Year $i Pin Not Found! ");

                }
            }

            if( $err==""){
                 return view( 'admin.arspre',array('duration'=>$duration,'information'=>$reg->value('appid')))->withErrors($errors);

            }

     return view( 'admin.ars',array('duration'=>$duration,'information'=>$reg->value('appid')))->withErrors($errors);
        }
    }

    return view( 'admin.ars',array('duration'=>$duration,'information'=>$reg->value('appid')));

  }else{
    return redirect()->back()->withErrors(['error'=>'AppId Or Registration No Incorrect'])->withInput(Input::all());

  }

                  }

            }
        }

      public function addcourse(Request $request) {
        if ($request->isMethod('GET')) {
            return view( 'admin.addcourse');
            }

            if ($request->isMethod('POST')) {
                $rules = array(
                    'department'    => 'required' ,
                    'duration'    => 'required|integer|max:2' ,
                    'program'    => 'required' ,
                    'ab'    => 'required' ,
                    'course'    => 'required' ,
                );
                $messages = array(
                    'ab.required' => ' The Program Abbreviation   field is required..'
                );

                $validator = Validator::make(Input::all(), $rules,$messages);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                     return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::all());
                      } else {
                          if($request->duration>2)$time="years"; else $time='year';
                     course::create([
                    'course_name' => $request->course,
                    'department_id' => $request->department,
                    'ab' => $request->ab,
                    'duration' => $request->duration,
                    'time' => $time,
                    'program' => $request->program,
                        'user' => Auth::user()->id
                    ]);
                    return redirect()->back()->withSuccess("Course $request->course Successfully Added");

                }
            }
      }

      public function setting(Request $request) {
        if ($request->isMethod('GET')) {
        return view( 'admin.setting');
        }

        if ($request->isMethod('POST')) {
            $rules = array(
                'name'    => 'nullable|required'
            );


            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all());
                  } else {
              
                    if ($request->has('file')) { 
                      
                      $logo = setting::where(['description'=>'logo']);  
                        $image = $request->file('file');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $input=['description' => 'logo',
                        'value' => $name];
                        if($logo->exists()){ 
                            $destinationPath = public_path('/setting');
                            $image->move($destinationPath, $name);
                            File::delete($destinationPath.'/'.$logo->value('value'));
                            DB::table('setting')->where(['description'=>'logo'])->update($input);
                        }
                        else{

                            $destinationPath = public_path('/setting');
                            $image->move($destinationPath, $name);
                            setting::insert($input);

                        }
                    }

                    if ($request->has('portal')) { 
                      
                        $portal = setting::where(['description'=>'portal']);  
                          $image = $request->file('portal');
                          $name = time().'.'.$image->getClientOriginalExtension();
                          $input=['description' => 'portal',
                          'value' => $name];
                          if($portal->exists()){ 
                              $destinationPath = public_path('/setting');
                              $image->move($destinationPath, $name);
                              File::delete($destinationPath.'/'.$logo->value('value'));
                              DB::table('setting')->where(['description'=>'portal'])->update($input);
                          }
                          else{
  
                              $destinationPath = public_path('/setting');
                              $image->move($destinationPath, $name);
                              setting::insert($input);
  
                          }
                      }


$name_in=$request->name;
                    $name = setting::where(['description'=>'name']); 
                    if($name->exists()){ 
                        $name->update(['value'=> $name_in]);
                    }
                    else{
                        
                  setting::insert(['description' =>'name','value'=> $name_in]);
                    }  
                return redirect()->back()->withSuccess("Successfully Added");

            }
        }

      }

      public function addsch(Request $request) {
        if ($request->isMethod('GET')) {
        return view( 'admin.addsch');
        }

        if ($request->isMethod('POST')) {
            $rules = array(
                'school'    => 'required'
            );


            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all());
                  } else {
                  school::create([
                    'schools_name' => $request->school,
                    'user' => Auth::user()->id
                ]);
                return redirect()->back()->withSuccess("School $request->school Successfully Added");

            }
        }

      }

    public function adddep(Request $request) {
        if ($request->isMethod('GET')) {
            return view( 'admin.adddep');
            }

            if ($request->isMethod('POST')) {
                $rules = array(
                    'school'    => 'required' ,
                    'department'    => 'required' ,
                );


                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                     return redirect()->back()
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::all());
                      } else {
                      department::create([
                        'school_id' => $request->school,
                        'department_name' => $request->department,
                        'user' => Auth::user()->id
                    ]);
                    return redirect()->back()->withSuccess("Department $request->department Successfully Added");

                }
            }
    }

      public function addpay(Request $request) {

        if ($request->isMethod('GET')) {
            return view( 'admin.addpay' )->with(['check' => $request->appid,'pins' => $request->pin, 'session'=>$request->session,'amount'=>$request->amount])->with(['name'=>'','phone'=>'']);
        }

          if ($request->isMethod('POST')) {
            $rules = array(
                'appid'    => 'required', // make sure the email is an actual email
                'pin' => 'required', // password can only be alphanumeric and has to be
                'amount' => 'required',
                'session' => 'required|',
            );
            $i=  DB::table('users')->where(['appid' =>$request->appid])  ;
                $name=ucwords($i->value('firstname')." ".$i->value('middlename')." ".$i->value('lastname'));
                $phone = $i->value('phone');
            $user= ['check' => $request->appid,'pin' => $request->pin, 'session'=>$request->session,'amount'=>$request->amount];
            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                  return  view( 'admin.addpay' )->withErrors($validator)->with($user)->with(['name'=>$name,'phone'=>$phone])   ;
            } else {


           $users =  DB::table('users')->where(['appid' =>$request->appid]);
           $id=  DB::table('users')->where(['appid' =>$request->appid])->value('id');
            if( DB::table('users')->where(['appid' =>$request->appid])->exists()){
                $payment=DB::table('payments')->where(['session_id' =>$request->session]);
            $flight = User::where('appid','=',$request->appid);
            $f = User::where('appid','=',$payment->value('details'));

            $names=$f->value('firstname')." ".$f->value('middlename')." ".$f->value('lastname');

               if(DB::table('payments')->where(['session_id' =>$request->session])->exists()){
              $type =DB::table('payments')->where(['session_id' =>$request->session])->value('type');
                if ($type=="1"){
                    //    application;
                    $apppin=$flight->value('apppin');
            $adpin=$flight->value('adpin');
                $pins="<tr>
                <td>Admission Pin:</td>
                <td> $adpin</td>
                </tr><tr>
                <td>Application Pin:</td>
                <td> $apppin</td>
                </tr>";

               return view( 'admin.addpay' )->with(['pins'=>$pins,'amountp'=>$payment->value('amount') ,'sessionp'=>$payment->value('session_id')])->with($user)->withErrors(['error'=>"Session ID $request->session already Used"])->with(['name'=>$names]);
                }

                if ($type=="0"){
                //registration
                $pinn =DB::table('regpin')->where(['session_id' =>$request->session])->value('pin');

                    $pins="<tr>
                    <td>Registration Pin:</td>
                    <td> $pinn</td>
                    </tr>";

                   return view( 'admin.addpay' )->with(['pins'=>$pins,'amountp'=>$payment->value('amount') ,'sessionp'=>$payment->value('session_id')])->with($user)->withErrors(['error'=>"Session ID $request->session already Used"])->with(['name'=>$names]);
                }

                if ($type=="2"){
                    //registration
                    $pinn =DB::table('offpin')->where(['session_id' =>$request->session])->value('pin');

                        $pins="<tr>
                        <td>Off-Registration Pin:</td>
                        <td> $pinn</td>
                        </tr>";

                       return view( 'admin.addpay' )->with(['pins'=>$pins,'amountp'=>$payment->value('amount') ,'sessionp'=>$payment->value('session_id')])->with($user)->withErrors(['error'=>"Session ID $request->session already Used"])->with(['name'=>$names]);
                    }

               }else{



               if ($request->pin=="1"){
            //    registeration;
             $ap=$this->getToken(3,7);
                $api=$this->getToken(3,7);
           if(User::where('appid','=',$request->appid)->where('apppin', '=', '')->where('adpin', '=', '')->exists())
            {

                $flight = User::where('appid','=',$request->appid)->update(
                    ['apppin' => $ap,
                    'adpin' => $api,
                    'user' => Auth::user()->id]);
                    DB::table('payments')->insert(
                        [
                        'session_id' =>  $request->session,
                        'details' => $request->appid,
                        'amount' => $request->amount,
                        'type' => $request->pin,
                        'user' => Auth::user()->id
                        ]
                    );
            }

            return view( 'admin.addpay' )->with([ 'amountp'=>$request->amount ,'sessionp'=>$request->session,'name'=>$names]) ;



               }

               if ($request->pin=="0"){
              // application;
           $pinnn=$this->getToken(3,7);
              DB::table('payments')->insert(
                [
                'session_id' =>  $request->session,
                'details' => $request->appid,
                'amount' => $request->amount,
                'type' => $request->pin,
                'user' => Auth::user()->id
                ]
                 );



                return view( 'admin.addpay' )->with(['amountp'=>$request->amount ,'sessionp'=>$request->session,'name'=>$names]) ;

                }

               if ($request->pin==2){
              // off regpin;
              $pinnn=$this->getToken(3,7);
              DB::table('payments')->insert(
                [
                'session_id' =>  $request->session,
                'details' => $request->appid,
                'amount' => $request->amount,
                'type' =>     $request->pin,
                'user' => Auth::user()->id
                ]
                 );

                return view( 'admin.addpay' )->with(['amountp'=>$request->amount ,'sessionp'=>$request->session,'name'=>$names]) ;

               }


               return  view( 'admin.addpay' )->with($user)->with(['name'=>$name,'phone'=>$phone])  ;

            }

             return  view( 'admin.addpay' )->with($user) ;


        }else
        {

return view( 'admin.addpay' )->with($user)->withErrors(['error'=>'Application ID Not Found'])->with(['name'=>$name,'phone'=>$phone]);

        }

    }
        }

    }

      public function offreport(Request $request) {
        if ($request->isMethod('POST')) {

        $rules = array(
            'department' => "required|exists:department,id|numeric",
            'course' => "required|exists:courses,id,department_id,$request->department|numeric",
        'duration' => 'required',
            'session' => 'required',

        );
         $messages = array(
                'duration.required' => ' The Class field is required..'
            );
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules,$messages);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all()); // send back the input (not the password) so that we can repopulate the form
        } else {


            $data    = DB::table('offstream')->where([
              'department' =>$request->department,
              'course' =>$request->course,
              'duration' =>$request->duration,
              'session' =>$request->session,
            ])->get();
          return redirect()->back()->with('data',   $data) ->withInput(Input::all());
        }
    }
if ($request->isMethod('GET')) {
        $model = department::all();
        return view( 'admin.offreport' )->withModel($model);
}
    }

      public function report(Request $request) {
        if ($request->isMethod('POST')) {

        $rules = array(
            'department' => "required|exists:department,id|numeric",
            'course' => "required|exists:courses,id,department_id,$request->department|numeric",
        'duration' => 'required',
            'session' => 'required',

        );
         $messages = array(
                'duration.required' => ' The Class field is required..'
            );
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules,$messages);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all()); // send back the input (not the password) so that we can repopulate the form
        } else {


            $data    = DB::table('registration')->where([
              'department' =>$request->department,
              'course' =>$request->course,
              'duration' =>$request->duration,
              'session' =>$request->session,
            ])->get();
          return redirect()->back()->with('data',   $data) ->withInput(Input::all());
        }
    }
if ($request->isMethod('GET')) {
        $model = department::all();
        return view( 'admin.report' )->withModel($model);
}
    }

      public function pingen(Request $request) {

            if ($request->isMethod('GET')) {
                return view( 'admin.pingen' )->with(['check' => $request->appid,'pins' => $request->pin, 'session'=>$request->session,'amount'=>$request->amount])->with(['name'=>'','phone'=>'']);
            }

              if ($request->isMethod('POST')) {
                $rules = array(
                    'appid'    => 'required', // make sure the email is an actual email
                    'pin' => 'required', // password can only be alphanumeric and has to be
                    'amount' => 'required',
                    'session' => 'required|',
                );
                $i=  DB::table('users')->where(['appid' =>$request->appid])  ;
                    $name=ucwords($i->value('firstname')." ".$i->value('middlename')." ".$i->value('lastname'));
                    $phone = $i->value('phone');
                $user= ['check' => $request->appid,'pin' => $request->pin, 'session'=>$request->session,'amount'=>$request->amount];
                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                      return  view( 'admin.pingen' )->withErrors($validator)->with($user)->with(['name'=>$name,'phone'=>$phone])   ;
                } else {


               $users =  DB::table('users')->where(['appid' =>$request->appid]);
               $id=  DB::table('users')->where(['appid' =>$request->appid])->value('id');
                if( DB::table('users')->where(['appid' =>$request->appid])->exists()){
                    $payment=DB::table('payments')->where(['session_id' =>$request->session]);
                $flight = User::where('appid','=',$request->appid);
                $f = User::where('appid','=',$payment->value('details'));

                $names=$f->value('firstname')." ".$f->value('middlename')." ".$f->value('lastname');

                   if(DB::table('payments')->where(['session_id' =>$request->session])->exists()){
                  $type =DB::table('payments')->where(['session_id' =>$request->session])->value('type');
                    if ($type=="1"){
                        //    application;
                        $apppin=$flight->value('apppin');
                $adpin=$flight->value('adpin');
                    $pins="<tr>
                    <td>Admission Pin:</td>
                    <td> $adpin</td>
                    </tr><tr>
                    <td>Application Pin:</td>
                    <td> $apppin</td>
                    </tr>";

                   return view( 'admin.pingen' )->with(['pins'=>$pins,'amountp'=>$payment->value('amount') ,'sessionp'=>$payment->value('session_id')])->with($user)->withErrors(['error'=>"Session ID $request->session already Used"])->with(['name'=>$names]);
                    }

                    if ($type=="0"){
                    //registration
                    $pinn =DB::table('regpin')->where(['session_id' =>$request->session])->value('pin');

                        $pins="<tr>
                        <td>Registration Pin:</td>
                        <td> $pinn</td>
                        </tr>";

                       return view( 'admin.pingen' )->with(['pins'=>$pins,'amountp'=>$payment->value('amount') ,'sessionp'=>$payment->value('session_id')])->with($user)->withErrors(['error'=>"Session ID $request->session already Used"])->with(['name'=>$names]);
                    }

                    if ($type=="2"){
                        //registration
                        $pinn =DB::table('offpin')->where(['session_id' =>$request->session])->value('pin');

                            $pins="<tr>
                            <td>Off-Registration Pin:</td>
                            <td> $pinn</td>
                            </tr>";

                           return view( 'admin.pingen' )->with(['pins'=>$pins,'amountp'=>$payment->value('amount') ,'sessionp'=>$payment->value('session_id')])->with($user)->withErrors(['error'=>"Session ID $request->session already Used"])->with(['name'=>$names]);
                        }

                   }else{



                   if ($request->pin=="1"){
                //    registeration;
                 $ap=$this->getToken(3,7);
                 $api=$this->getToken(3,7);

               if(User::where('appid','=',$request->appid)->where('apppin', '=', '')->where('adpin', '=', '')->exists())
                {

                    $flight = User::where('appid','=',$request->appid)->update(
                        ['apppin' => $ap,
                        'adpin' => $api,
                        'user' => Auth::user()->id]);
                        DB::table('payments')->insert(
                            [
                            'session_id' =>  $request->session,
                            'details' => $request->appid,
                            'amount' => $request->amount,
                            'type' => $request->pin,
                            'user' => Auth::user()->id
                            ]
                        );
                }
                $pins="<tr>
                <td>Admission Pin:</td>
                <td> $api</td>
                </tr><tr>
                <td>Application Pin:</td>
                <td> $ap</td>
                </tr>";
                return view( 'admin.pingen' )->with(['pins'=>$pins,'amountp'=>$request->amount ,'sessionp'=>$request->session,'name'=>$names]) ;



                   }

                   if ($request->pin=="0"){
                  // application;
               $pinnn=$this->getToken(3,7);
                  DB::table('payments')->insert(
                    [
                    'session_id' =>  $request->session,
                    'details' => $request->appid,
                    'amount' => $request->amount,
                    'type' => $request->pin,
                    'user' => Auth::user()->id
                    ]
                     );


                     DB::table('regpin')->insert(
                        [
                        'pin' =>  $pinn=$this->getToken(3,7),
                        'appid' => $request->appid,
                        'used' => '0',
                        'session_id' => $request->session,
                        'user' => Auth::user()->id
                        ]
                    );
                     $pins="<tr>
                  <td>Registration Pins:</td>
                  <td> $pinn</td>
                  </tr> ";
                    return view( 'admin.pingen' )->with(['pins'=>$pins,'amountp'=>$request->amount ,'sessionp'=>$request->session,'name'=>$names]) ;

                    }

                   if ($request->pin==2){
                  // off regpin;
                  $pinnn=$this->getToken(3,7);
                  DB::table('payments')->insert(
                    [
                    'session_id' =>  $request->session,
                    'details' => $request->appid,
                    'amount' => $request->amount,
                    'type' =>     $request->pin,
                    'user' => Auth::user()->id
                    ]
                     );
                     DB::table('offpin')->insert(
                        [
                        'pin' =>  $pinn=$this->getToken(3,7),
                        'appid' => $request->appid,
                        'used' => '0',
                        'session_id' => $request->session,
                        'user' => Auth::user()->id
                        ]
                    );
                     $pins="<tr>
                  <td>Off-Registration Pins:</td>
                  <td> $pinn</td>
                  </tr> ";
                    return view( 'admin.pingen' )->with(['pins'=>$pins,'amountp'=>$request->amount ,'sessionp'=>$request->session,'name'=>$names]) ;

                   }


                   return  view( 'admin.pingen' )->with($user)->with(['name'=>$name,'phone'=>$phone])  ;

                }

                 return  view( 'admin.pingen' )->with($user) ;


            }else
            {

  return view( 'admin.pingen' )->with($user)->withErrors(['error'=>'Application ID Not Found'])->with(['name'=>$name,'phone'=>$phone]);

            }

        }
            }

        }


    public function index(Request $request){

            return view( 'admin.login' );

    }

    public function dashboard(Request $request){

        return view('admin.dashboard');

    }

    public function dologin(Request $request){
        if ($request->isMethod('GET')) {
            return view( 'admin.login' );
            }

            if ($request->isMethod('POST')) {
                $rules = array(
                    'email'    => 'required', // make sure the email is an actual email
                    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
                );

                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator) // send back all errors to the login form
                        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                } else {

                    // create our user data for the authentication
                    $userdata = array(
                        'email'     => Input::get('email'),
                        'password'  => Input::get('password')
                    );

                    // attempt to do the login
                    if (Auth::guard('admin')->attempt($userdata)) {

                        // validation successful!
                        // redirect them to the secure section or whatever
                        // return Redirect::to('secure');
                        // for now we'll just echo success (even though echoing in a controller is bad)
                        return redirect()->intended('admin/dashboard');

                    } else {

                        // validation not successful, send back to form
      return redirect()->back()->withErrors(['error'=>'Email Or Password Not Correct'])->withInput(Input::except('password'));

                    }

                }
            }
    }




    //
}
