<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\User;
use App\setting;
use App\app; 
use PDF;
use App\lga;
use App\state;
use App\jamb;
use App\osubject;
use App\course;
use App\choice;

use App\olevel;
use App\registration;
use App\offstream;
use Jenssegers\Date\Date;
use App\department;
use Auth; 
use DB;
use Redirect;

class printcontroller extends Controller
{

  public static function  Suffix($num) {
        if (!in_array(($num % 100),array(11,12,13))){
          switch ($num % 10) {
            // Handle 1st, 2nd, 3rd
            case 1:  return $num.'st';
            case 2:  return $num.'nd';
            case 3:  return $num.'rd';
          }
        }
        return $num.'th';
      }

      public static function reg(Request $req)
      {
        
$pdf = new Fpdf(); 
$ln=42;
$l=12;
$br=7; 

if(!registration::where(['appid'=> Auth::user()->appid,'duration'=>$req->id])->exists()) return Redirect::to('reg')->withErrors(['error'=>'Invalid Selection. Thanks.']);
$app=registration::where(['appid'=> Auth::user()->appid,'duration'=>$req->id])->first();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
        $pdf-> SetLeftMargin(4);
$pdf->Image('public/setting/'.setting::where('description','logo')->value('value'),5,3,36,36);
$pdf->SetDrawColor(50,185,233);  

global $title;
$name_info=setting::where('description','name')->value('value');

$title ="     $name_info";
$pdf->SetFont('Arial','B',19);
$w = $pdf->GetStringWidth($title)+6;
$pdf->SetY((2));


$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(50,185,233);
$pdf->SetTextColor(50,185,233);

$pdf->Ln(4);
$pdf->Cell(35,9,'',0, 0, 'L');
$pdf->Cell($w,9,$title,0, 0, 'L');
$pdf->Ln(7);
$pdf->Cell(88,9,'',0, 0, 'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(25, 9, '..excellence and relevence.', 0, 0, 'L');
$pdf->Ln(7);

$pdf->Cell(75,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, '(ONLINE REGISTRATION SUMMARY)', 0, 0, 'L');

$pdf->Ln(7);

$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 40, 289-370, 40);
$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 41, 289-370, 41);
 
$pdf->Cell(83,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, "ACADEMIC SESSION: ".$app->session, 0, 0, 'L');
$pdf->Image('uploads/'.Auth::user()->pic,170,52,36,36);
$pdf->Ln(20);


$pdf->SetFont('Arial','B',13);  
$b=-3;


$pdf->Cell($b); 
$pdf->SetFont('Arial','B',13); 

$pdf->SetTextColor(50,185,233);
$pdf->Cell($ln,0,'Personal Details');
$pdf->SetFont('helvetica','',13);  
$pdf->SetTextColor(0,0, 0, 1);
$pdf->Ln($br); 
$pdf->SetFont('Arial','',13); 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Full Name');
$pdf->Cell($l,0,ucwords(Auth::user()->firstname." ".Auth::user()->middlename." ".Auth::user()->lastname));  
$pdf->Ln($br); 

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Date Of Birth');
$pdf->Cell($l,0,$app->dob);  
$pdf->Ln($br);
$pdf->SetAlpha(0.5);
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Sex');
$pdf->Cell($l,0,$app->sex); 
$pdf->Ln($br);


$pdf->Cell($b); 
$pdf->Cell($ln,0,'Marital Status');
$pdf->Cell($l,0,$app->marital_status);  
$pdf->Ln($br);

$pdf->Cell($b); 

$pdf->Cell($ln,0,'Permanent '); 
$pdf->MultiCell( 70, 6,$app->address, 1); 
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Address');

$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Phone');
$pdf->Cell($l+107,0,Auth::user()->phone);  
$pdf->Cell($l,0,"Form No:".Auth::user()->appid); 
$pdf->Ln($br);
 

$pdf->Cell($b); 

$pdf->Cell($ln,0,'Next Of ');
$pdf->Cell($l,0,$app->next_of_kin_phone_no);  
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Kin Phone');

$pdf->Ln($br);


$pdf->Cell($b); 

$pdf->Cell($ln,0,'Next Of ');
$pdf->Cell($l,0,$app->next_of_kin_address);  
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Kin Address');

$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Nationality');
$pdf->Cell($l+25,0, $app->nationality);  $pdf->Cell($b);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'L.G.A');
$pdf->Cell($l,0,lga::where('id',$app->LGA)->value('name'));  

$pdf->Ln(2); 
$pdf->Ln($br);
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Religion');
$pdf->Cell($l+22,0,$app->religion);  

 


$pdf->Cell($b); 
$pdf->Cell($ln,0,'State Of Origin');
$pdf->Cell($l,0,state::where('id',$app->state)->value('name'));  

$pdf->Ln(5);
$pdf->Cell($b);  
$pdf->Ln(2);  
   
 
  
$currentYposition = $pdf->GetY();
$currentX = $pdf->GetX();

$pdf->SetDrawColor(8, 99, 55, 1);
$pdf->SetX($currentX-2 ); 
$pdf->SetWidths(array(102));
$pdf->SetFont('Arial','',10); 
$pdf->Row(array('1st Semester Courses :'));  
$pdf->SetX($currentX-2 ); 
 
$pdf->SetWidths(array(11,79,12)); 
$pdf->Row(array('Code','Title','Credit Unit'));  
$pdf->SetWidths(array(11,79,12)); 
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetX($currentX-2 );  
for ($x = 0; $x <= 14; $x++) {$pdf->SetX($currentX-2 ); 
$pdf->Row(array( ''  , '' , '' ));
    }     
    $pdf->SetX($currentX-2 );  
    $pdf->Row(array( '' , 'Total Credit Unit =' , '' ));

    
$pdf->SetY($currentYposition);  

$pdf->SetX($currentX+102 );

$pdf->SetWidths(array(102));
$pdf->SetFont('Arial','',9); 
$pdf->Row(array('2nd Semester Courses :'));  

$pdf->SetX($currentX+102 );

$pdf->SetWidths(array(11,79,12));
$pdf->Row(array('Code','Title','Credit Unit'));  
$pdf->SetWidths(array(11,79,12));  

for ($x = 0; $x <= 14; $x++) { 
        $pdf->SetX($currentX+102 );  
$pdf->Row(array( ''  , '' , '' ));
    } 
    $pdf->SetX($currentX+102 ); 
    $pdf->Row(array( ''  , 'Total Credit Unit =' , '' ));
    
$pdf->SetFont('Arial','B',13); 
 
 $pdf->SetTitle(Auth::user()->firstname." ". Auth::user()->middlename ." ".Auth::user()->lastname);
 $pdf->Ln(5);
 $pdf->WriteHTML(" Congratulations!<br>
 <img src='public/images/sign.jpg' width='104'><br><br>
 <b>EJEH AGADA JOHN</b><br>
 Registrar
                 ");
$pdf->Output();
        exit;
       

      
      }  
      //////////////////////////////////////////



      public static function offstream()
      {
        
$pdf = new Fpdf(); 
$ln=42;
$l=12;
$br=7; 

 
$app=offstream::where(['appid'=> Auth::user()->appid])->first();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
        $pdf-> SetLeftMargin(4);
$pdf->Image('setting/'.setting::where('description','logo')->value('value'),5,3,36,36);
$pdf->SetDrawColor(50,185,233);  

global $title;
$name_info=setting::where('description','name')->value('value');

$title ="     $name_info"; 
$pdf->SetFont('Arial','B',19);
$w = $pdf->GetStringWidth($title)+6;
$pdf->SetY((2));


$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(50,185,233);
$pdf->SetTextColor(50,185,233);

$pdf->Ln(4);
$pdf->Cell(35,9,'',0, 0, 'L');
$pdf->Cell($w,9,$title,0, 0, 'L');
$pdf->Ln(7);
$pdf->Cell(88,9,'',0, 0, 'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(25, 9, '..excellence and relevence.', 0, 0, 'L');
$pdf->Ln(7);

$pdf->Cell(62,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, '(OFF-STREAM FINAL YEAR STUDENTS AND GRADUATES)', 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 40, 289-370, 40);
$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 41, 289-370, 41);
 
$pdf->Cell(83,9,'',0, 0, 'L');
$pdf->write(2, '< OR ' );
$pdf->SetFont('symbol','B',12); 
$d=chr('163'); 
$pdf->write(2, chr('163') );
$pdf->SetFont('Arial','B',12);
$pdf->write(2, " ACADEMIC SESSION: > ".$app->session );

$pdf->Image('uploads/'.Auth::user()->pic,170,52,36,36);
$pdf->Ln(20);


$pdf->SetFont('Arial','B',13);  
$b=-3;


$pdf->Cell($b); 
$pdf->SetFont('Arial','B',13); 

$pdf->SetTextColor(50,185,233);
$pdf->Cell($ln,0,'Personal Details');
$pdf->SetFont('helvetica','',13);  
$pdf->SetTextColor(0,0, 0, 1);
$pdf->Ln($br); 
$pdf->SetFont('Arial','',13); 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Full Name');
$pdf->Cell($l,0,ucwords(Auth::user()->firstname." ".Auth::user()->middlename." ".Auth::user()->lastname));  
$pdf->Ln($br); 

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Date Of Birth');
$pdf->Cell($l,0,$app->dob);  
$pdf->Ln($br);
$pdf->SetAlpha(0.5);
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Sex');
$pdf->Cell($l,0,$app->sex); 
$pdf->Ln($br);


$pdf->Cell($b); 
$pdf->Cell($ln,0,'Marital Status');
$pdf->Cell($l,0,$app->marital_status);  
$pdf->Ln($br);

$pdf->Cell($b); 

$pdf->Cell($ln,0,'Permanent '); 
$pdf->MultiCell( 70, 6,$app->address, 1); 
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Address');

$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Phone');
$pdf->Cell($l+107,0,Auth::user()->phone);  
$pdf->Cell($l,0,"Form No:".Auth::user()->appid); 
$pdf->Ln($br);
 

$pdf->Cell($b); 

$pdf->Cell($ln,0,'Next Of ');
$pdf->Cell($l,0,$app->next_of_kin_phone_no);  
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Kin Phone');

$pdf->Ln($br);


$pdf->Cell($b); 

$pdf->Cell($ln,0,'Next Of ');
$pdf->Cell($l,0,$app->next_of_kin_address);  
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Kin Address');

$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Nationality');
$pdf->Cell($l+25,0, $app->nationality);  $pdf->Cell($b);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'L.G.A');
$pdf->Cell($l,0,lga::where('id',$app->LGA)->value('name'));  

$pdf->Ln(2); 
$pdf->Ln($br);
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Religion');
$pdf->Cell($l+22,0,$app->religion);  

 


$pdf->Cell($b); 
$pdf->Cell($ln,0,'State Of Origin');
$pdf->Cell($l,0,state::where('id',$app->state)->value('name'));  

$pdf->Ln(5);
$pdf->Cell($b);  
$pdf->Ln(2);  
   
 
  
$currentYposition = $pdf->GetY();
$currentX = $pdf->GetX();

$pdf->SetDrawColor(8, 99, 55, 1);
$pdf->SetX($currentX-2 ); 
$pdf->SetWidths(array(204));
$pdf->SetFont('Arial','',10); 
$pdf->Row(array('1st Semester Courses :'));  
$pdf->SetX($currentX-2 ); 
 
$pdf->SetWidths(array(22,160,22)); 
$pdf->Row(array('Code','Title','Credit Unit'));  
$pdf->SetWidths(array(22,160,22)); 
$y = $pdf->GetY();
$x = $pdf->GetX();
$pdf->SetX($currentX-2 );  
for ($x = 0; $x <= 14; $x++) {
        $pdf->SetX($currentX-2 ); 
$pdf->Row(array( ''  , '' , '' ));
    }     
    $pdf->SetX($currentX-2 );  
    $pdf->Row(array( '' , 'Total Credit Unit =' , '' ));

    
 $pdf->SetTitle(Auth::user()->firstname." ". Auth::user()->middlename ." ".Auth::user()->lastname);
 $pdf->Ln(5);
 $pdf->WriteHTML(" Congratulations!<br>
 <img src='public/images/sign.jpg' width='104'><br><br>
 <b>EJEH AGADA JOHN</b><br>
 Registrar
                 ");
$pdf->Output();
        exit;
       

      
      }  
      //////////////////////////////////////////

      public function printout(Request $request)
      {
        $app=app::where('appid', '=', $request->id)->get()->first();
        $olevel=olevel::where('appid', '=', $request->id)->get();    
        $jamb=jamb::where('appid', '=', $request->id)->get();       
       // $choice=choice::where('appid', '=', Auth::user()->appid)->get()->first();      
        $user=User::where('appid', '=', $request->id)->get()->first();
        $name=$user->lastname . $user->middlename;
        $choice1=choice::where(['appid'=> $request->id,'no'=>1])->get()->first();
        $choice2=choice::where(['appid'=> $request->id,'no'=>2])->get()->first();

        $pdf = PDF::loadView('print.utme',compact('app','olevel','user','jamb','choice1','choice2')); 
       
        return $pdf->stream("$name.pdf");
      }


    public function print()
    {
        if(!User::where(['reg'=> Auth::user()->appid])->exists()) return Redirect::to('student')->withErrors(['error'=>'Invalid Selection. Thanks.']);

        $app=app::where('appid', '=', Auth::user()->appid)->get()->first();
        $olevel=olevel::where('appid', '=', Auth::user()->appid)->get();    
        $jamb=jamb::where('appid', '=', Auth::user()->appid)->get();       
       // $choice=choice::where('appid', '=', Auth::user()->appid)->get()->first();      
        $user=User::where('appid', '=', Auth::user()->appid)->get()->first();
        $name=$user->lastname . $user->middlename;
        $choice1=choice::where(['appid'=> Auth::user()->appid,'no'=>1])->get()->first();
        $choice2=choice::where(['appid'=> Auth::user()->appid,'no'=>2])->get()->first();
        $pdf = PDF::loadView('print.utme',compact('app','olevel','user','jamb')); 
       
        return $pdf->stream("$name.pdf");
        $pdf = new Fpdf(); 
        $ln=42;
$l=12;
$br=7;

$app=app::where('appid', '=', Auth::user()->appid)->first();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
$pdf->Image('public/setting/'.setting::where('description','logo')->value('value'),5,3,36,36);
$pdf->SetDrawColor(50,185,233);  

global $title;
$name_info=setting::where('description','name')->value('value');

$title ="     $name_info"; 
$pdf->SetFont('Arial','B',19);
$w = $pdf->GetStringWidth($title)+6;
$pdf->SetY((2));


$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(50,185,233);
$pdf->SetTextColor(50,185,233);

$pdf->Ln(4);
$pdf->Cell(35,9,'',0, 0, 'L');
$pdf->Cell($w,9,$title,0, 0, 'L');
$pdf->Ln(7);
$pdf->Cell(88,9,'',0, 0, 'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(25, 9, '..excellence and relevence.', 0, 0, 'L');
$pdf->Ln(7);

$pdf->Cell(92,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, '(APPLICATION SUMMARY)', 0, 0, 'L');

$pdf->Ln(7);

$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 40, 289-370, 40);
$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 41, 289-370, 41);
 
$pdf->Cell(83,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, "ACADEMIC SESSION: ".$app->session, 0, 0, 'L');
$pdf->Image('public/uploads/'.Auth::user()->pic,150,52,36,36);
$pdf->Ln(20);


$pdf->SetFont('Arial','B',13);  
$b=-3;


$pdf->Cell($b); 
$pdf->SetFont('Arial','B',13); 

$pdf->SetTextColor(50,185,233);
$pdf->Cell($ln,0,'Personal Details');
$pdf->SetFont('helvetica','',13);  
$pdf->SetTextColor(0,0, 0, 1);
$pdf->Ln($br); 
$pdf->SetFont('Arial','',13); 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Full Name');
$pdf->Cell($l,0,ucwords(Auth::user()->firstname." ".Auth::user()->middlename." ".Auth::user()->lastname));  
$pdf->Ln($br); 

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Date Of Birth');
$pdf->Cell($l,0,$app->dob);  
$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Sex');
$pdf->Cell($l,0,$app->sex); 
$pdf->Ln($br);


$pdf->Cell($b); 
$pdf->Cell($ln,0,'Marital Status');
$pdf->Cell($l,0,$app->status);  
$pdf->Ln($br);

$pdf->Cell($b); 

$pdf->Cell($ln,0,'Permanent ');
$pdf->Cell($l,0,$app->address);  
$pdf->Ln(5);
$pdf->Cell($b); 

$pdf->Cell($ln,0,'Address');

$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'Phone');
$pdf->Cell($l+90,0,Auth::user()->phone);  
$pdf->Cell($l,0,"Form No: ".Auth::user()->appid); 
$pdf->Ln($br);
 
 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Nationality');
$pdf->Cell($l,0, $app->nationality);  

$pdf->Ln($br);

$pdf->Cell($b); 
$pdf->Cell($ln,0,'L.G.A');
$pdf->Cell($l,0,lga::where('id',$app->lga)->value('name'));  

$pdf->Ln($br); 

$pdf->Cell($b); 
$pdf->Cell($ln,0,'State Of');
$pdf->Cell($l,0,state::where('id',$app->state)->value('name'));  

$pdf->Ln(5);
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Origin');
$pdf->Ln($br);  
$pdf->Ln(2);  
  

$pdf->SetTextColor(50,185,233);
$pdf->SetFont('Arial','B',13); 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Jamb Details');
$pdf->Ln(3);
$pdf->SetDrawColor(50,185,233);
$pdf->SetX(0);
$pdf->Cell(278,10,' ','T');
$pdf->Ln(1); 
$pdf->SetFont('Arial','',13); 
$pdf->Ln($br);
$pdf->Cell($b); 
$pdf->SetTextColor(0,0, 0, 1);
 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Nationality');
$pdf->Cell($l,0, $app->nationality);  

$pdf->Ln($br);
 
 
$pdf->SetDrawColor(255); 
$pdf->SetWidths(array(18,80,80));
$pdf->Row(array('Choice','Department','Course')); 
foreach(DB::table('choice')->where('appid',Auth::user()->appid)->get() as $val){                                                 
$course =course::find($val->course)->first();
$pdf->Ln(3);
$pdf->SetX(8); 
$pdf->SetDrawColor(255); 
$pdf->SetWidths(array(18,80,80));
$pdf->Row(array( $this->Suffix($val->no),department::find($val->department)->first()->department_name,$course->program." In ".$course->course_name));

 }

 

$pdf->SetTextColor(50,185,233);
$pdf->Ln($br); 
$pdf->Ln($br-4); 
$pdf->SetFont('Arial','B',13); 
$pdf->Cell($b); 
$pdf->Cell($ln,0,'Academic History');
$pdf->Ln(3);
$pdf->SetDrawColor(50,185,233);
$pdf->SetX(0);
$pdf->Cell(278,10,' ','T');
$pdf->Ln(1); $pdf->SetTextColor(0,0, 0, 1);
$count = 0;
$pdf->Ln($br); 
$pdf->SetDrawColor(8, 40, 55, 4); 
$pdf->SetWidths(array(10,67,26));
$pdf->Row(array('#','Subject','Grade')); 

foreach(DB::table('olevel')->where('user_id',Auth::user()->id)->get() as $val){                                                 
 
$count++;
 
$subject=osubject::where('id',$val->subject_id)->value('name');
  
$pdf->SetDrawColor(27); 
$pdf->SetWidths(array(10,67,26));
$pdf->Row(array( $count   , $subject ,  $val->grade));

 }
 $pdf->SetTitle(Auth::user()->firstname." ". Auth::user()->middlename ." ".Auth::user()->lastname);
 $pdf->Ln(5);
 $pdf->WriteHTML(" Congratulations!<br>
 <img src='public/images/sign.jpg' width='104'><br><br>
 <b>EJEH AGADA JOHN</b><br>
 Registrar
                 ");
$pdf->Output();
        exit;
       
    }
//////////////////////////

    public function admission()
    {
        
        $pdf = new Fpdf(); 
        $ln=42;
$l=12;
$br=7;

$app=app::where('appid', '=', Auth::user()->appid)->first();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
$pdf->Image('public/setting/'.setting::where('description','logo')->value('value'),5,3,36,36);
$pdf->SetDrawColor(50,185,233);  

global $title;

$title = '     BENUE STATE   POLYTECHNIC,   UGBOKOLO';
$pdf->SetFont('Arial','B',19);
$w = $pdf->GetStringWidth($title)+6;
$pdf->SetY((2));

$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(50,185,233);
$pdf->SetTextColor(50,185,233);

$pdf->Ln(4);
$pdf->Cell(35,9,'',0, 0, 'L');
$pdf->Cell($w,9,$title,0, 0, 'L');
$pdf->Ln(7);
$pdf->Cell(88,9,'',0, 0, 'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(25, 9, '..excellence and relevence.', 0, 0, 'L');
$pdf->Ln(7);

$pdf->Cell(92,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, '(ADMISSION LETTER)', 0, 0, 'L');

$pdf->Ln(7);

$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 40, 289-370, 40);
$pdf->SetDrawColor(50,185,233);
$pdf->Line(289, 41, 289-370, 41);
 
$pdf->Cell(83,9,'',0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25, 9, "ACADEMIC SESSION: ".$app->session, 0, 0, 'L');
$pdf->Image('uploads/'.Auth::user()->pic,150,44,36,36);
$pdf->Ln(20);


$pdf->SetFont('Arial','B',13);  
$b=-3;$pdf->SetTextColor(0,0, 0, 1);
$pdf->WriteHTML(""); 
$pdf->Ln($br+22);
$pdf->Cell($b);
$pdf->SetX(10); 
$pdf->WriteHTML("<b>DEAR:    ".strtoupper(Auth::user()->firstname." ". Auth::user()->middlename." ". Auth::user()->lastname)."</b>"); 
$pdf->SetFont('Arial','B',11);  

$pdf->SetTextColor(0,0, 0, 1);
$pdf->Ln($br);

$pdf->Cell(140,0,'' );  
$pdf->Cell($l,0,"Date: ".Date::now()->format('Y-m-d')); 
$pdf->Ln($br);
$pdf->SetFont('Arial','BU',13);   
$pdf->MultiCell(185, 8, "PROVISIONAL OFFER OF ADMISSION:$app->session ACADEMIC SESSION",0,"C", 0);
$pdf->SetFont('Arial','',13); 
$pdf->MultiCell(185, 8, "This is to certify that you met the jAMB Cut-of mark and you were successful in the recent screening exercise conducted by the Screening Committee 
You are therefore admitted to read",0,"L", 0);

$cs=DB::table('choice')->where(['appid'=>Auth::user()->appid,'no'=>1]);
$course =course::find($cs->value('course'))->first();
$department=department::find($cs->value('department'))->first();
$pdf->WriteHTML('<b>Course:</b> '.$course->program." (".$course->ab.") In ".$course->course_name);
$pdf->Ln(7);
$pdf->WriteHTML('<b>Department:</b> '.  $department->department_name);
$pdf->Ln(7);
$pdf->WriteHTML('<b>Duration of Course:</b> '.  $course->duration." ".ucwords($course->time));
$pdf->SetFont('Arial','',13); 
$pdf->Ln(7);
$pdf->MultiCell(185, 8, "However, this offfer of admission is tentative (temporal) until you present the following for appropriate documentation:",0,"L", 0);
$pdf->Ln(6);
$pdf->WriteHTML('
<b>1.</b> Official JAMB Admission Letter.<br>
<b>2.</b> Benue Polytechnic Admission Form Receipt.<br>
<b>3.</b> Benue Polytechnic Screening Fee Receipt.<br>
<b>4.</b> Benue Polytechnic Admission Acceptance Fee Receipt.<br>   

                ');
$pdf->Ln(7);
$pdf->MultiCell(185, 8, "If Benue State Polytechnic, Ugbokolo and/or the course to which you have been admitted to read does not match your JAMB choice of school and/or course, then you are required to process your change of school and/or course via JAMB's official Portal to enable you print your appropriate JAMB Admission Letter.",0,"L", 0);

$pdf->Ln(5);
$pdf->MultiCell(185, 8, "You are expected to proceed to the polytechnic's designated bank with your school fee details print-out and pay you school fee",0,"L", 0);


$pdf->Ln(5);
$pdf->WriteHTML(" Congratulations!<br>
<img src='public/images/sign.jpg' width='104'><br><br>
<b>EJEH AGADA JOHN</b><br>
Registrar
                "); 

 $pdf->SetTitle(Auth::user()->firstname." ". Auth::user()->middlename ." ".Auth::user()->lastname);
$pdf->Output();
        exit;
       
    }
    //
}
