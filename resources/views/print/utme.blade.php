<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ ucwords($user->lastname." ".$user->middlename) }}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
            line-height: 25px;
        }
        .clearfix {
            overflow: auto;
          }
        table {
            font-size: x-small;
        }
         table tr td {
            
            text-align:center;
            
        }
        tfoot tr td {
            font-weight: bold;
            text-align:center;
            font-size: x-small;
        }
      
      
        .information .logo {
            margin: 5px;
        }
        .container  {
            margin-left: 15px;
        }

        hr.style-three { 
        border-style: solid; border-color: rgb(22, 134, 0);  
        }
         
        .title{
             font-size: 19px;
          }

          .inline {
            vertical-align: top;
            display: inline-block; 
            margin: 1em; 
          }

          
      h3,h4,h5{
        margin-top: -12px;
        
        }
         
 #title {
            vertical-align: top;
            display: inline-block;
            width: 200px; 
            
        }

    #data {
    vertical-align: top; 
    width: 220px;  
    word-wrap: break-word;  
    display: inline-block;
    }
    
    </style>

</head>

<body>
 
<div class="information">
    <img src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','portal')->value('value')}}"  height="98" alt="{{strtoupper(App\setting::where('description','name')->value('value'))}}">
<hr class="style-three">
<center> 
    <span class="title"><strong>{{ $app->session}} (PUTME - SCREENING) APPLICATION PRINTOUT
        </strong></span> </center>
   

</div>


<br/>

<div class="container">

  
 
<div class="inline"  >
   <h3>PERSONAL INFORMATION</h3>
 
    <div id="title">Last Name:</div><div id="data">{{ ucwords($user->lastname ) }}</div>   <br>
    <div id="title">Other Name(s)</div><div id="data">{{ ucwords($user->middlename ) }}</div> <br>
    <div id="title">Date Of Birth</div><div id="data">{{ ucwords($app->dob ) }}</div> <br>
    <div id="title">Gender</div><div id="data">{{ ucwords($app->sex ) }}</div> <br>
    <div id="title">LGA / State Of Origin</div><div id="data">{{ ucwords(App\state::where('id',$app->state)->get()->first()->name)}} / {{ ucwords(App\lga::where('id',$app->lga)->get()->first()->name)}}</div> <br>
    <div id="title">Nationality</div><div id="data">{{ ucwords($app->nationality ) }}</div> <br>
    <div id="title">Contact Address</div><div id="data">{{ ucwords($app->address ) }}</div> <br>
    <div id="title">Phone Number</div><div id="data">{{ ucwords($user->phone ) }}</div> <br>
    <div id="title">Email Address</div><div id="data">{{ ucwords($user->email ) }}</div> 
     
    </div>
    
   
<div class="inline"   style="float:right; width:270px; text-align:center;" >
    <br clear="all" > <div class="clearfix"></div>
   
    
    <img src="{{URL::asset('public/uploads/')}}/{{$user->pic}}" style=""  height="150"  width="150" >
    <h4>Application Id: {{ $app->appid }} </h4>
      
</div>

<br>

<div class="inline" style=" width: 250px; ">
    <h3>JAMB DETAILS </h3>
 
<div id="title" style=" width: 105px;  ">Jamb Regno</div><div style=" width: 100px; " id="data">{{ ucwords($app->jambregno ) }}</div>   <br>
<div id="title" style=" width: 105px;  ">AGGREGATE<br>SCORE</div><div id="data" style=" width: 100px; ">{{ $jamb->sum('score') }}</div><br>
@foreach ($jamb as $value)
<div id="title" style=" width: 120px; ">{{  App\osubject::where('id',$value->subject_id)->get()->first()->name }}</div><div id="data" style="width: 100px;"> {{ $value->score }} </div> <br> 
@endforeach
</div>
 

<div class="inline" style="margin-left: -8px; width: 490px;" > 
    <h3>CHOICE OF COURSE</h3>
 <?php  

 ?>
    <div id="title" >First Choice Faculty</div><div id="data" style="width: 280px;">
        {{App\school::where(['id'=> $choice1->school])->get()->first()->schools_name}}
    
    </div>   <br>
    <div id="title">First Choice Course</div><div id="data" style="width: 280px;"> <div class="clearfix"></div>{{App\course::where(['id'=> $choice1->course])->get()->first()->course_name}}</div> <br>
    <div id="title">Second Choice Faculty</div><div id="data" style="width: 280px;">       {{App\school::where(['id'=> $choice2->school])->get()->first()->schools_name}}</div> <br>
    <div id="title">Second Choice Course</div><div id="data" style="width: 280px;">{{App\course::where(['id'=> $choice1->course])->get()->first()->course_name}}</div>  
     
</div>

 <br>
 <div class="inline" style=" width: 250px; ">
    <h3>O LEVEL RESULT </h3>
 
<div id="title" style=" width: 105px;  ">Sitting(s)</div> <div style=" width: 150px; " id="data">{{ $app->sitting}} </div>   <br>
<div id="title" style=" width: 105px;  ">Exam Type</div><div id="data" style=" width: 150px; ">{{ $app->examtype }}</div> <br>
<div id="title" style=" width: 105px; ">Exam Date</div><div id="data" >{{ $app->examdate }} </div> <br>
<div id="title" style=" width: 105px; ">Exam Number</div><div id="data" >{{ $app->examnumber }}</div>  
 
</div>
 

<div class="inline" style="margin-left: -8px; width: 490px;" > 
    <h4>Subject</h4>
    @foreach ($olevel as $value)
    <div id="title " >{{ App\osubject::where(['id'=> $value->subject_id])->get()->first()->name}}</div><div id="data" style="width: 280px;margin-left:19px;">{{$value->grade}}</div>   <br>  
    @endforeach
</div>

</div>
 
<div class="information" style="   background-color: #944d7b65; position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                  {{strtoupper(App\setting::where('description','name')->value('value'))}} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">

              Date Printed : {{ date('Y-d-m h:m:i') }}
                 
            </td>
        </tr>

    </table>
</div>
</body>
</html>