<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View; 
use App\User;
use App\registration;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Session;
use Jenssegers\Date\Date;
use App\course;
use DB;
use Illuminate\Support\Facades\Input;
use Redirect;

class appcontroller extends Controller
{
    function removeEmpty($array) {

        foreach($array as $index=>$item) {
            $keys = array_keys($item); //here is the assumption
            //you can define it before the foreach
            //by checking the first array if YOU are 100% sure
            //all items in the array have the same keys: name, mobile, email
            foreach($keys as $key) {
                if(empty($item[$key])) {
                    unset($array[$index]);
                    break;
                }
            }
        }
        return $array;
    }

    
    public function offstream(Request $req)
    { 
        if ($req->isMethod('GET')) {
        return  View::make("offpin");
        }

        if ($req->isMethod('POST')) {
            $rules = array(
                'pin'    => 'required',  // password can only be alphanumeric and has to be greater than 3 characters
            );
            $messages = array(
                'pin.required' => ' Pin is required To procceed.' 
            );
            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules,$messages);
            
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::to('offstream')
                    ->withErrors($validator)->withInput(); // send back the input (not the password) so that we can repopulate the form
            }
            else
            {
                if (DB::table('offpin')->where(['pin' =>$req->pin, 'appid'=>Auth::user()->appid])->exists()) {
                   
                    if (DB::table('offstream')->where(['csn' =>$req->pin, 'appid'=>Auth::user()->appid])->exists()) {
             return  printcontroller::offstream();
             
            } 
            else
               {  
                $req->session()->put('offpin', $req->pin );
                
                return View::make("off"); 
                     
               }
                   
            }else
            {
                return Redirect::to('offstream')->withErrors(['error'=>'Sorry, you have provided incorrect information.
                 Please enter correct  information to proceed. Thanks.'])->withInput();

            }
            }
        }
    
    }

    public function reg(Request $req)
    { 
       
       
        $check=DB::table('registration')->where(['appid'=>Auth::user()->appid]);
        $dur= $check->get()->count();
        $duration=DB::table('courses')->where('id',$check->value('course'))->value('duration'); 
         
        

        if ($req->isMethod('GET')) {
            return View::make("regpin");      
               }
               if ($req->isMethod('POST')) {
                $rules = array(
                    'pin'    => 'required',  // password can only be alphanumeric and has to be greater than 3 characters
                );
                $messages = array(
                    'pin.required' => ' Pin is required To procceed.' 
                );
                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules,$messages);
                
                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    return Redirect::to('reg')
                        ->withErrors($validator)->withInput(); // send back the input (not the password) so that we can repopulate the form
                }
                else
                {

                     
                        if (DB::table('registration')->where(['csn' =>$req->pin, 'appid'=>Auth::user()->appid])->exists()) {
                     $id    =DB::table('registration')->where(['csn' =>$req->pin])->value('duration');
   return Redirect::to("reg/$id");
                 
}  else
                   { 

if (DB::table('regpin')->where(['pin' =>$req->pin, 'appid'=>Auth::user()->appid])->exists()) {
                   
                    if($dur==$duration && $dur!=0)return Redirect::to('reg')->withErrors(['error'=>'Sorry, you have Completted your registration. Thanks.'])->withInput();
                    ;
                    $req->session()->put('regpin', $req->pin ); 
                     DB::table('registration')->where([  'appid'=>Auth::user()->appid])->get()->count();
                if(DB::table('registration')->where([  'appid'=>Auth::user()->appid])->get()->count()<1)
                    return View::make("ssreg"); 
                    else
                    return View::make("ssreg2");  
                   }else
                {
                    return Redirect::to('reg')->withErrors(['error'=>'Sorry, you have provided incorrect information.
                     Please enter correct  information to proceed. Thanks.'])->withInput();

                } 
                   }
                       
               
                }
               }       
     
    }

    public function regoff(Request $req)
    {
        $pin=    $req->session()->get('offpin');
 
            $course1=DB::table('courses')->where('id',$req->course1)->value('ab'); 
         
            $rules = array(
            'dob'    => 'required|date_format:Y-m-d', 
            'sex' => 'required',  
            'teller' => 'required',
            'regno' => 'required',    
            'state' => 'required|exists:state,id',
            'kin_address' => 'required',  
            'kin_phone' => 'required| regex:/^([0-9\s\-\+\(\)]*)$/',  
            'lga' => "required|exists:lga,id,state_id,$req->state", 
            'religion' => 'required',   
            'status' => 'required',  
            'nationality' => 'required',
            'address' => 'required',
            'school11' => 'required|exists:schools,id|numeric', 
            'department1' => "required|exists:department,id,schools_id,$req->school11|numeric",   
            'course1' => "required|exists:courses,id,department_id,$req->department1|numeric",    
                             
        );
 
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return ucwords($validator->errors()->first()); // send back the input (not the password) so that we can repopulate the form
        }else
        {
    
            $appid=Auth::user()->appid;
            $session='2013/2014';
            $app=array(
                'appid'=>$appid,
                'dob'=>$req->dob,
                'next_of_kin_phone_no'=>$req->kin_phone,
                'next_of_kin_address'=>$req->kin_address,
                'address'=>$req->address,
                'state'=>$req->state,
                'LGA'=>$req->lga,  
                'marital_status'=>$req->status,
                'sex'=>$req->sex,
                'nationality'=>$req->nationality,
                'session'=>$session,
                'department'=>$req->department1,
                'course'=>$req->course1,
                'reg_no'=>$req->regno, 
                'personal_phone_no'=>Auth::user()->phone,
                'firstname'=>Auth::user()->firstname,
                'middlename'=>Auth::user()->middlename,
                'lastname'=>Auth::user()->lastname,
                'email'=>Auth::user()->email,
                'submit_date'=>Date::now(),
                'csn'=>$pin


            ); 
            if (DB::table('offstream')->where(['csn' =>$pin, 'appid'=>Auth::user()->appid])->exists()) 
            {
                return "Pin Already Used";
            }else{      
        DB::table('offstream')->insert($app);  
        
        
        }
          // $req->session()->forget('regpin');
        }

return "1,1";

    }
  



    public function registration(Request $req)
    {
     
        $check=DB::table('registration')->where(['appid'=>Auth::user()->appid]);
        $dur= $check->get()->count();
        $duration=DB::table('courses')->where('id',$check->value('course'))->value('duration'); 
      
         if($dur==$duration && $dur!=0)return "Your Registration Has Been Comleted";

       $dur =$dur+1;
        $course1=DB::table('courses')->where('id',$req->course1)->value('ab'); 
         
            $rules = array(
            'dob'    => 'required|date_format:Y-m-d', 
            'sex' => 'required',  
            'state' => 'required|exists:state,id',
            'kin_address' => 'required',  
            'kin_phone' => 'required| regex:/^([0-9\s\-\+\(\)]*)$/',  
            'lga' => "required|exists:lga,id,state_id,$req->state", 
            'religion' => 'required',   
            'status' => 'required',  
            'nationality' => 'required',
            'address' => 'required',
            'school11' => 'required|exists:schools,id|numeric', 
            'department1' => "required|exists:department,id,schools_id,$req->school11|numeric",   
            'course1' => "required|exists:courses,id,department_id,$req->department1|numeric",    
                             
        );
 
        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return ucwords($validator->errors()->first()); // send back the input (not the password) so that we can repopulate the form
        }else
        {
           
$pin=    $req->session()->get('regpin');
             $appid=Auth::user()->appid;
            $session=DB::table('setup')->where('state','1')->value('session');
            $pro= course::find($req->course1)->first()->ab;
          $reg = explode('/',$session);
          $reg=substr($reg[0],2);
          $reg= $reg.'/23/'.$pro.'/';
          $app=array( 
              $req->dob,
              $req->kin_phone,
              $req->kin_address,
              $req->address,
              $req->state,
              $req->lga,  
              $req->status,
              $req->sex,
              $req->nationality,
              $session,               
              $req->department1,
              $req->course1,
              Auth::user()->firstname,
              Auth::user()->middlename,
              Auth::user()->lastname,
              Auth::user()->phone,
              $appid,
              Date::now(),
              Auth::user()->email, 
              $pin,
              $dur
              

          ); 
        
            if (DB::table('registration')->where(['csn' =>$pin])->exists()) 
            {
                return "Pin Already Used";
            }else{  
                
            if   (  $check->get()->count() <1){ 
          DB::insert("INSERT INTO `registration` (`serialno`, `dob`,`next_of_kin_phone_no`,`next_of_kin_address`,`address`,`state`,`LGA`,`marital_status`,`sex`,`nationality`,`session`,`department`,`course`,`firstname`,`middlename`,`lastname`,`personal_phone_no`,`appid`,`submit_date`,`email`,`reg_no`,`csn`,`duration`)
          SELECT  IF(MAX(`serialno`)>0, MAX(`serialno`)+1, 1) ,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CONCAT('$reg',(SELECT  IF(MAX(`serialno`)>0, MAX(`serialno`)+1, 1))),?,?
          FROM `registration` WHERE `department`='$req->department1' and course='$req->course1' and duration='1' ", $app);
          }
          else{ 
               
             
            $regg = registration::where('appid', '=', Auth::user()->appid)->first();
            $s = $regg->replicate();
            $s->duration =$dur;
            $s->csn =$pin;
            $s->session=$session;
            $s->submit_date=Date::now();
              $s->save(['timestamps' => false]);
        }
        
        }
          // $req->session()->forget('regpin');
        }

return "1,$dur";

    }

    
    public function process(Request $req)
    { 
        $course1=DB::table('courses')->where('id',$req->course1)->value('ab');
        $course2=DB::table('courses')->where('id',$req->course2)->value('ab');
         Input::merge(['cs1' => $course1,'cs2'=>$course2]);
          
        $rules = array(
            'dob'    => 'required|date_format:Y-m-d', 
            'sex' => 'required',  
            'examnumber' => 'required',  
            'examtype' => 'required',  
            
            'examdate' => 'required', 
            'sitting' => 'required',  
            'sex' => 'required',  
            'state' => 'required|exists:state,id',
          //  'kin_address' => 'required',  
            //'kin_phone' => 'required| regex:/^([0-9\s\-\+\(\)]*)$/',  
            'lga' => "required|exists:lga,id,state_id,$req->state",  
            'status' => 'required', 
           // 'jambregno' => "required_if:cs1,==,ND|required_if:cs2,==,ND", 
            'jambregno' => "required", 
            'nationality' => 'required',
            'address' => 'required',
            'school11' => 'required|exists:schools,id|numeric',
            'school22' => 'required|exists:schools,id|numeric',
            'department1' => "required|exists:department,id,schools_id,$req->school11|numeric",
            'department2' => "required|exists:department,id,schools_id,$req->school22|numeric",  
            'course1' => "required|exists:courses,id,department_id,$req->department1|numeric",  
            'course2' => "required|exists:courses,id,department_id,$req->department2|numeric",   
          //  'school1' => 'required', 
           // 'school2' => 'required_with:qualification2|required_with:to2|required_with:from2', 
           // 'school3' => 'required_with:qualification3|required_with:to3|required_with:from3', 
          //  'school4' => 'required_with:qualification4|required_with:to4|required_with:from4', 
            'sub1' => 'nullable|exists:osubject,id|numeric', 
            'sub2' => 'nullable|exists:osubject,id|numeric', 
            'sub4' => 'nullable|exists:osubject,id|numeric', 
            'sub5' => 'nullable|exists:osubject,id|numeric', 
            'sub6' => 'nullable|exists:osubject,id|numeric', 
            'sub7' => 'nullable|exists:osubject,id|numeric', 
            'sub8' => 'nullable|exists:osubject,id|numeric', 
            'sub9' => 'nullable|exists:osubject,id|numeric', 
            'grade1' => 'nullable ', 
            'grade2' => 'nullable ', 
            'grade3' => 'nullable ', 
            'grade5' => 'nullable ', 
            'grade6' => 'nullable ', 
            'grade7' => 'nullable ', 
            'grade8' => 'nullable ', 
            'grade9' => 'nullable ',
            'jamb1' => 'required |numeric',  
            'jamb2' => 'required |numeric',  
            'jamb3' => 'required |numeric',  
            'jamb4' => 'required |numeric',  
            'jambsc1' => 'required |numeric',  
            'jambsc2' => 'required |numeric',  
            'jambsc3' => 'required |numeric', 
            'jambsc4' => 'required |numeric', 
                             
        );

        $messages = array(
            'jambregno.required_if' => 'This Field Is Required If ND Program is selected.',
            'kin_address.required' => 'This Field Is Required If ND Program is selected.',
            
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules,$messages);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
       // 
           return ucwords($validator->errors()->first()); // send back the input (not the password) so that we can repopulate the form
        }
        else 
         { // return  var_dump(Input::all());
           
             $appid=Auth::user()->appid;
              $session=DB::table('setup')->where('state','1')->value('session');
             
            $app=array(
               
                'dob'=>$req->dob,
                'appid'=>$appid, 
                'address'=>$req->address,
                'state'=>$req->state,
                'lga'=>$req->lga,
                'jambregno' =>$req->jambregno,
                'status'=>$req->status,
                'sex'=>$req->sex,
                'nationality'=>$req->nationality,
                'session'=>$session,
                'examnumber'=>$req->examnumber,
                'examtype'=>$req->examtype,
                'sitting'=>$req->sitting,
                'examdate'=>$req->examdate,
            );
            $jambsub= array();
            $jambsub[0]=['subject_id'=>$req->jamb1,'score'=>$req->jambsc1,'appid'=>$appid,'session'=>$session];
            $jambsub[1]=['subject_id'=>$req->jamb2,'score'=>$req->jambsc2,'appid'=>$appid,'session'=>$session];
            $jambsub[2]=['subject_id'=>$req->jamb3,'score'=>$req->jambsc3,'appid'=>$appid,'session'=>$session];
            $jambsub[3]=['subject_id'=>$req->jamb4,'score'=>$req->jambsc4,'appid'=>$appid,'session'=>$session];

            $olevel= array();
            $olevel[0]=['subject_id'=>$req->sub1,'grade'=>$req->grade1];
            $olevel[1]=['subject_id'=>$req->sub2,'grade'=>$req->grade2];
            $olevel[2]=['subject_id'=>$req->sub3,'grade'=>$req->grade3];
            $olevel[3]=['subject_id'=>$req->sub4,'grade'=>$req->grade4];
            $olevel[4]=['subject_id'=>$req->sub5,'grade'=>$req->grade5];
            $olevel[5]=['subject_id'=>$req->sub6,'grade'=>$req->grade6];
            $olevel[6]=['subject_id'=>$req->sub7,'grade'=>$req->grade7];
            $olevel[7]=['subject_id'=>$req->sub8,'grade'=>$req->grade8];
            $olevel[8]=['subject_id'=>$req->sub9,'grade'=>$req->grade9]; 
            $i=0;

        foreach($olevel as $key => $value) {
            if(empty($value['grade']) && empty($value['subject_id'])){unset($olevel[$key]);}               
            }   

            foreach($olevel as $key => $value) {
                if (array_search('', $value) !== FALSE) {
                
                    $validator->getMessageBag()->add('error', 'An error Occur');
          
                }
            } 
       

            foreach($olevel as $key => $value) {
                
                $olevel[$key]=array_merge($olevel[$key], ['appid'=>Auth::user()->appid,'session'=>$session]);
            } 

          


            
            //array whose keys are zips, and values are # of occurances
            $dupsub = array_count_values(array_column($olevel,'subject_id'));
            $dupsub = array_filter($dupsub,function($n){return $n>1;});
            $dupsub = array_keys($dupsub);
          //  return var_dump($dupsub);
 
                 $dupjamb = array_count_values(array_column($jambsub,'subject_id'));
                 $dupjamb = array_filter($dupjamb,function($n){return $n>1;});
                 $dupjamb = array_keys($dupjamb);
          //  return var_dump($dupjamb);

            if(count($dupjamb)>0 || count($dupsub)>0 )$validator->getMessageBag()->add('error', 'Subject(s) Duplicate');

                $choice= array(
                    
                    array(
                            'appid'=>$appid,
                            'school'=>$req->school11,
                            'department'=>$req->department1,
                            'course'=>$req->course1,                           
                            'session'=>$session,
                            'no'=>1
                        ),
                        
                        array(
                            'appid'=>$appid,
                            'school'=>$req->school22,
                            'session'=>$session,
                            'department'=>$req->department2,
                            'course'=>$req->course2,
                            'no'=>2
                        ) 
                    );
                
                    $check = User::where(['reg'=>Auth::user()->appin]);
                    if($check->exists())$validator->getMessageBag()->add('error', 'Application Already Registered');
                    if (!$validator->errors()->any()){
             $update = User::find(Auth::user()->id);
             $update->reg = $appid;
            // $update->type = "new";
            $update->save();  
          
           DB::table('olevel')->insert($olevel); 
          
           DB::table('app')->insert($app);         
           DB::table('jamb')->insert($jambsub);    
            DB::table('choice')->insert($choice);     
                return 1;
           
        }else{

            return ucwords($validator->errors()->first());
        } 

   
        } 
    }

    function unique_multidimensional_array($array, $key) { 
        $temp_array = array(); 
        $i = 0; 
        $key_array = array(); 

        foreach($array as $val) { 
            if (!in_array($val[$key], $key_array)) { 
                $key_array[$i] = $val[$key]; 
                $temp_array[$i] = $val; 
            } 
            $i++; 
        } 
        return $temp_array; 
    } 
    
    public function app(Request $request)
    {
        $string = 'ACCOUNT, AGRICULTURAL SCIENCE, APPLIED ELECTRICITY, ARABIC, ARITHMETIC, ART., AUTO ELECTRICITY, BASIC ELECTRICITY, BASIC SICENCE, BIOLOGY, BLOCK LAYING, BOOK KEEPING, BUILDING CONSTRUCTION, BUILDING/ENGINEERING DRAWING, CABLE JOINT &  BATTERY CHARGING, CARPENTRY, CHEMISTRY, CHRISTIAN RELIGIOUS STUDIES, CIVIC, CLASS TEACHING, COMMERCE, COMPUTER SCIENCE, CONCRETING, CRAFT SCIENCE, CRAFT THEORY, CRAFT/WORKSHOPPRACTICE, DOMESTIC INSTALLATION, ECONOMICS, ELECTRICAL INSTALLATION &  MAINTENANCE WORK, ELECTRONICS DEVICES &  CIRCUITS, ELECTRONICS WORKS, ENGINE MAINTENACE &  REFURBISHING, ENGINEERING DRAWING, ENGLISH LANGUAGE, F/MATHS, FABRICATION AND WELDING, FOOD &  NUTRITION, FRENCH, GAS WELDING, CUTTING AND ARC WELDING, GENERAL METAL WORK, GEOGRAPHY, GOVERNMENT, HAUSA, HEALTH SCIENCE, HISTORY, HOME MANAGEMENT, IGBO LANGUAGE, INFORMATION & COMMUNICATION TECHNOLOGY, INTERGRATED SCIENCE, INTRO. TO BUILDING CONSTRUCTION, ISLAMIC HISTORY, ISLAMIC RELIGION STUDIES, JOINERY, LIT. IN ENGLISH, MATHEMATICS, MECHANICAL ENGINEERING CRAFT PRACTICE, METAL WORK, MOTOR VEHICLE MECHINE WORKS, OFFICE PRACTIES, P.H.E, PHYSICS, PLUMBING & PIPE FITTING, PRINCIPLES OF EDUCATION, RADIO COMMUNICATION, SCIENCE TECHNOLOGY & SOCIETY, SERVICE STATION MECH. WORK & VEHICLE, SHEET METAL/STRUCTURAL STEEL WORK, SHORTHAND, SOCIAL STUDIES, SOCIOLOGY, TECHNICAL DRAWING, TELEVISION, TYPING, VERNACULAR (HAUSA), WALL, FLOORS & CELLING FINIHSING, WELDING OF ELECTRIC MACHINE, WOOD WORK, YORUBA LANGUAGE'; 

$str_arr = explode (",", $string);  
foreach ($str_arr as $name){ 
    
   //DB::table('osubject')->insert(['name'=>$name]);  
    
    }
 //dd($str_arr); 
      
        if(Auth::user()->reg==Auth::user()->appid)return Redirect::to('print');
        if ($request->isMethod('GET')) {
     return View::make("app");      
        }
        if ($request->isMethod('POST')) {
            $rules = array(
                'adpin'    => 'required', // make sure the email is an actual email
                'apppin' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
            );
            $messages = array(
                'adpin.required' => 'Application Pin is required.',
                'apppin.required' => 'Admission Pin is required.'
            );
            // run the validation rules on the inputs from the form
            $validator = Validator::make(Input::all(), $rules,$messages);
            
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::to('application')
                    ->withErrors($validator)->withInput(); // send back the input (not the password) so that we can repopulate the form
            }
            else
            {
             
                if (User::where(['apppin' =>$request->apppin,'adpin' => $request->adpin])->exists()) {
                     return View::make("app");
                }else
                {
                    return Redirect::to('application')->withErrors(['error'=>'Sorry, you have provided incorrect information.
                     Please enter correct  information to proceed. Thanks.'])->withInput();

                }
                
                
            }
               
        
        }

        
    }
    //
}
