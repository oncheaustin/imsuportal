@extends('porth.head')

@section('content')

 

<section id="main-body" class="container">

      <div class="clearfix"></div>
                                    <div class="col-md-11   pull-md-left">
                    <div class="header-lined">
 
    <ol class="breadcrumb">
            <li>
            <a href="//portal.bsp.edu.ng">            Portal
            </a>        </li>
            <li>
                         New Student Registration
                    </li>
           
    </ol>
 

                </div>  
 
 

                </div>
 
                <!-- Container for main page display content -->
        <div class="col-md-11 well  pull-md-left">
<div class="col-md-11 text-center   ">
                
   
    <div class="text-success"> 
       <h2>{{strtoupper(App\setting::where('description','name')->value('value'))}} POST UTME APPLICATION FORM</h2>
    </div>
    </div>

<div class="col-md-11  ">

    <div class="header-lined"> 
       <h1>Personal Information</h1>
    </div>
    </div>

         <div class="col-md-5 form-group boxing"> 
          
                       

<div id='ajax_upload_demo'   >  
    <form   id='image_upload_form' method='post' enctype='multipart/form-data'   action='upload' target='upload_to'>
 
      
  
 
  
   <input type="text"    name="_token" id="token"    value="{{csrf_token()}}" hidden>                       
 <img id="sd" class="thumbnail" height="200" width="189" src="  @if(Auth::user()->pic!='') {{ 'public/uploads/'.Auth::user()->pic }}  @else public/images/avatar_no.jpg  @endif "   />  
       <div class="clear"></div>
            <div class="input-group boxing">
            
                <span class="input-group-btn boxing">

                
                 <input type='submit' id="sub" value='Upload' class="btn btn-info"> 
                    <span class="btn btn-primary boxing btn-file">
                        Browse&hellip; <input type="file" id='file' name='image' multiple>
                    </span>
                </span>
                <input type="text" class="form-control boxing hidden"   readonly>
            </div>
            
    </form>
   
<div    id="warn"> </div> 
</div>
             </div>
   <form method="post" action="" id="formID" role="form">
          <div class="clearfix"></div>
              <div class="col-md-3 form-group boxing">
              
<input type="text"  value="{{ Auth::user()->pic }}"  data-prompt-position="topLeft:0,-188"  class="form-control boxing btn-block validate[required] bshid  " data-errormessage-value-missing="Please Upload Your Passport"  id="nm">
    </div>
    
<div class="clearfix"></div>

            <div class="col-md-3 form-group boxing">
              
 
 
   
               
                 <label for="inputLastName" class="control-label  boxing">Last Name</label>
                <input type="text" name="lastname"  id="lastname" value="{{ ucwords(Auth::user()->lastname) }}" disabled="disabled" class="form-control boxing  form-group disabled" />
           
                <label for="inputOthernames" class="control-label boxing  ">Other Name(s)</label>
                <input type="text" name="others" id="other" value="{{ucwords( Auth::user()->middlename )}}"   disabled="disabled"  class="form-control boxing " />
            
               <label for="inputState" class="control-label boxing">State Of Origin</label>
                  <select  name="state"  id ="state" class="validate[required] form-control boxing form-group"  data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Select A State!" onchange="load_state(this.value);"    >
              <option value="">Select An Option </option>
              @foreach(DB::table('state')->get() as $value)                                                         
              <option value="{{ $value->id}}">{{ucwords( $value->name)}}</option>
        @endforeach 
     
               </select>
            </div>

          

            <div class="col-md-3 form-group boxing ">
            
                
                <label for="inputPhone" class="control-label boxing">Phone No</label>
 <input  type="text" class="validate[required,custom[phone]  form-control form-group boxing " data-prompt-position="topLeft:0,0"   id="phone"  name="phone" placeholder="08012345678"  value="{{ Auth::user()->phone }}"  disabled="disabled"> 
                                    
                     <label class="control-label boxing" for="inputAddress">Address</label>
               <input type="text" id="address"  class="validate[required] form-control boxing form-group"  data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Enter Your Address!" name="address"   >   
              
               <label for="inputLgea" class="control-label boxing">L.G.E.A</label>
               <select  id="lga"  name="lga" class="  validate[required] form-control form-group boxing"  data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Select A L.G.E.A!"     >
           <option value="">Select An Option </option>  
            </select>
            </div>
 
    <div class="col-md-3 form-group boxing">
                <label for="inputDate" class="control-label boxing">Date Of Birth</label>
               <input type='text' placeholder="Date Of Birth" class="form-control validate[required] boxing form-group date " name="dp1"    id='datetimepicker4' data-prompt-position="topLeft:60,16"  data-errormessage-value-missing="Please Choose Date Of Birth!" />
            <label for="inputgender" class="control-label boxing">Gender</label>
              <select name="sex"  id="sex" class="validate[required] form-control boxing form-group" data-prompt-position="topLeft:0,0"  data-errormessage-value-missing="Please Select Your Gender!"     >
              <option value="">Select An Option </option>
              <option value="Male">Male</option>    
              <option value=" Female">Female</option>  
            </select>   
         
          </div> 

            <div class="col-md-3 form-group boxing">
                <label for="inputStatus" class="control-label boxing">Marital Status</label>
                <select name="status" class="validate[required] form-control boxing form-group" data-prompt-position="topLeft:0,16" data-errormessage-value-missing="Please Select Your Marital Status!"  id="status">
  
                <option value="">Select An Option</option>
                <option value="Single">Single</option> 
                <option value="Married">Married</option>    
                <option value="Divorced">Divorced</option>  
              </select>
              
              <label for="inputNationality" class="control-label boxing ">Nationality</label>
                <select name="nationality" id = "nationality" class="validate[required] form-control boxing form-group" data-prompt-position="topLeft:0,16"  data-errormessage-value-missing="Please Select Your Nationality!" >
                     <option value="">Select An Option</option>
                     <option value="Nigerian">Nigerian</option> 
                     <option value="Others">Others</option>    
             
              </select>
               
            </div>
 
 
 
 
    

     
    <div class="col-md-11  ">
    
    <div class="header-lined"> 
       <h1>Jamb Details</h1>
    </div>
    </div>
   
      
    <div class="col-md-6 "> 
        <div class="input-group">
            <label for="inputJambReg" class="control-label boxing">Jamb Registration Number</label>
            <input type="text"  name="jambregno" id="jambregno" data-errormessage-value-missing="Please Enter Jamb Reg No!" data-prompt-position="topLeft:0,0" placeholder="Jamb Regno.." value="{{ Auth::user()->jamb_regno }}" disabled='disabled' class="validate[required] form-control boxing form-group " />
   </div> 
   
   <br>
        <div class="form-group " >
            <div class="form-inline">
               <div class="form-group  ">
                
                 {!! Form::select('jambs1', App\jambsub::where('id',1)->pluck('name', 'id') ,null, ['id' => 'jambs1','class' => ' validate[required] form-control input-medium']); !!}
                 
               </div> 
               <div class="form-group ">
                 
                   <input type="text" id="jambsc1" name="jambsc1" class="form-control boxing " placeholder="Score" >
              
               </div>
             </div><br>
           
      
             <div class="form-inline">
                <div class="form-group ">
                 
                    {!! Form::select('jambs2', App\jambsub::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'jambs2','class' => ' validate[required] form-control ']); !!}
                </div> 
                <div class="form-group ">
                  
                    <input type="text" id="jambsc2" name="jambsc2" class="form-control boxing validate[required]" placeholder="Score" >
               
                </div>

              </div><br>
              
             <div class="form-inline">
                <div class="form-group ">
                 
                    {!! Form::select('jambs3', App\jambsub::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'jambs3','class' => ' validate[required] form-control ']); !!}
                </div> 
                <div class="form-group ">
                  
                    <input type="text" id="jambsc3" name="jambsc3" class="form-control boxing validate[required]" placeholder="Score" >
               
                </div>
              </div>

              <br>
             <div class="form-inline">
                <div class="form-group ">
                 
                    {!! Form::select('jambs4', App\jambsub::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'jambs4','class' => ' validate[required] form-control ']); !!}
                </div> 
                <div class="form-group ">
                  
                    <input type="text" id="jambsc4" name="jambsc4" class="form-control boxing validate[required]" placeholder="Score" >
               
                </div>
              </div>
          
       </div>
        
         

</div>      

<div class="clearfix"></div>
<br>             
         <div class="col-md-5  "> 

 <h4>1st Choice </h4>
         <div class="clearfix"></div>
         
                <label for="inputSchool" class="control-label boxing">Faculty</label>
              
   <div class="input-group ">
    <select id="school11" name="school11" class="validate[required] form-control " data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Select Your School "  onchange="load_options(this.value,'department1','dep')">
            <option value="">Select An Option</option>
            @foreach(DB::table('schools')->get() as $value)                                                         
            <option value="{{ $value->id}}">{{ucwords( $value->schools_name)}}</option>
      @endforeach      
        </select>
    
       <span class="input-group-addon nopadding " >&nbsp;
      
         <label  class="bshid">
         <i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"> </i>
           </label>
    </span>
    </div>
              
         <div class="clearfix"></div>
 
                <label for="inputProgram" class="control-label boxing">Department</label>
              
           
<div class="input-group ">
   <select  id="department1" name="department1"  class="validate[required] form-control " data-prompt-position="topLeft:0,16"  data-errormessage-value-missing="Please Selet Your Depertment" onchange="load_options(this.value,'crs','course')">
            <option value="">Select An Option</option>
            </select>
    
       <span class="input-group-addon nopadding " >&nbsp;
      
         <label id="loadg" class="bshid">
         <i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"> </i>
           </label>
    </span>
    </div>
                
  
         <div class="clearfix"></div> 
          
      <label for="inputCourse" class="control-label   boxing">Course</label>
  <div class="input-group ">
   <select  id="crs" name="crs"  class="validate[required] form-control " data-prompt-position="topLeft:0,16"  data-errormessage-value-missing="Please Selet Your Course" >
            <option value="">Select An Option</option>
        
          </select>
    
       <span class="input-group-addon nopadding " >&nbsp;
      
         <label id="loadn" class="bshid">
         <i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"> </i>
           </label>
    </span>
    </div> 
        </div> 
 
 <div class="col-md-5  ">     
 <h4>2nd Choice</h4>
         <div class="clearfix"></div>

                <label for="inputSchool" class="control-label boxing">Faculty</label>
              
   <div class="input-group ">
    <select id="school22" name="school22" class="validate[required] form-control " data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Select Your School "  onchange="load_options(this.value,'department2','dep');clear();">
            <option value="">Select An Option</option> 
            @foreach(DB::table('schools')->get() as $value)                                                         
            <option value="{{ $value->id}}">{{ucwords( $value->schools_name)}}</option>
      @endforeach     
        </select>
    
       <span class="input-group-addon nopadding " >&nbsp;
      
         <label  class="bshid">
         <i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"> </i>
           </label>
    </span>
    </div>
              
         <div class="clearfix"></div>
 
                <label for="inputProgram" class="control-label boxing">Department</label>
              
           
<div class="input-group ">
   <select  id="department2" name="department2"  class="validate[required] form-control " data-prompt-position="topLeft:0,16"  data-errormessage-value-missing="Please Selet Your Depertment" onchange="load_options(this.value,'course2','course')">
            <option value="">Select An Option</option>
            </select>
    
       <span class="input-group-addon nopadding " >&nbsp;
      
         <label id="loadg2" class="bshid">
         <i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"> </i>
           </label>
    </span>
    </div>
                
  
         <div class="clearfix"></div> 
          
      <label for="inputCourse" class="control-label   boxing">Course</label>
  <div class="input-group ">
   <select  id="course2" name="course2"  class="validate[required] form-control " data-prompt-position="topLeft:0,16"  data-errormessage-value-missing="Please Selet Your Course" >
            <option value="">Select An Option</option>
        
          </select>
    
       <span class="input-group-addon nopadding " >&nbsp;
      
         <label id="loadn2" class="bshid">
         <i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"> </i>
           </label>
    </span>
    </div> 
        </div>
        
   
     
   

                      
         
        
        
      
  
         
 
 
        
              <div class="col-md-8 ">

                <br> 
                <div class="header-lined"> 
                    <h1>O level</h1>
                 </div>
               
                <div class="control-group">
                    <label class="control-label" for="examtype1">Sitting(s)</label>
                    <div class="controls">
                        <select class="  validate[required] form-control  "
                            data-errormessage-value-missing="Please Select No Of sitting(s)!" id="sitting"
                            name="sitting">
                            <option value="">--- No Of Sitings ---</option>

                            <option value="1">1st</option>
                            <option value="2">2nd</option>

                        </select>

                    </div>
                </div>

                <label class="control-label" for="examdate1">Exam Date</label>
                <input type='text' placeholder="Date Of Birth"
                    class="form-control validate[required] boxing form-group   " name="examdate" id='datetimepicker'
                    data-prompt-position="topLeft:60,16"
                    data-errormessage-value-missing="Please Choose Date Of Birth!" />


                <div class="control-group">
                    <label class="control-label" for="examtype">Exam Type</label>
                    <div class="controls">
                        <select class="  validate[required] form-control  "
                            data-errormessage-value-missing="Please Select Exam Type!" id="examtype" name="examtype">
                            <option value="">--- Select One ---</option>
                            <option value="WAEC">WAEC</option>
                            <option value="NECO">NECO</option>
                            <option value="NABTEB">NABTEB</option>
                            <option value="TEACHERS GRADE II">TEACHERS GRADE II</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="examnumber">Exam Number</label>
                    <div class="controls">
                        <input class="  form-control   validate[required]   boxing"
                            data-errormessage-value-missing="Enter Your Exam Number!" id="examnumber"
                            name="examnumber" type="text">
                    </div>
                </div>
                <div class="col-md-6  ">


                    <hr>


                    <input name="exam1_id" value="" type="hidden">

                </div>
                <table cellpadding="" class="table table-bordered">

                    <thead>
                        <tr>
                            <th></th>
                            <th>Subjects</th>
                            <th>Grades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                {!! Form::select('sbj1-1', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-1','class' => ' validate[required] form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                                          
                                

                            </td>
                            <td>
                                <select class="   validate[required]  form-control "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-1"
                                    name="grade1-1">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                {!! Form::select('sbj1-2', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-2','class' => ' validate[required] form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                                

                            </td>
                            <td>
                                <select class="    validate[required] form-control "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-2"
                                    name="grade1-2">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                {!! Form::select('sbj1-3', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-3','class' => ' validate[required] form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                                
                            </td>
                            <td>
                                <select class="    validate[required] form-control "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-3"
                                    name="grade1-3">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>

                                {!! Form::select('sbj1-4', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-4','class' => ' validate[required] form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}

                               

                            </td>
                            <td>
                                <select class="    validate[required] form-control "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-4"
                                    name="grade1-4">
                                    <option value="">Score</option>


                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>
                                {!! Form::select('sbj1-5', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-5','class' => ' validate[required] form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                              

                            </td>
                            <td>
                                <select class="  validate[required] form-control "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-5"
                                    name="grade1-5">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>
                                {!! Form::select('sbj1-6', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-6','class' => ' form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                             
                            </td>
                            <td>
                                <select class=" form-control   "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-6"
                                    name="grade1-6">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>
                                {!! Form::select('sbj1-7', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-7','class' => '  form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                                
                            </td>
                            <td>
                                <select class=" form-control   "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-7"
                                    name="grade1-7">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>
                                {!! Form::select('sbj1-8', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-8','class' => '   form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                               

                            </td>
                            <td>
                                <select class="  form-control   "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-8"
                                    name="grade1-8">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>
                                {!! Form::select('sbj1-9', App\osubject::pluck('name', 'id')->prepend('Please Select Subject',''),null, ['id' => 'sbj1-9','class' => '  form-control ','data-errormessage-value-missing'=>"Select Subject!"]); !!}
                              

                            </td>
                            <td>
                                <select class="form-control  "
                                    data-errormessage-value-missing="Select 1st Sitting Grade!" id="grade1-9"
                                    name="grade1-9">
                                    <option value="">Score</option>

                                </select>

                            </td>
                        </tr>
                    </tbody>
                </table>




            </div>
               
      
      
<div class="clearfix"></div>
    <div class="form-group text-center">
        
        <input class="btn btn-success" type="submit" name="save" value="Save Changes" />
        <input class="btn btn-default" type="reset" id='checked' value="Cancel" /> 
      
    </div>

</form>
 
 
        </div><!-- /.main-content -->
            </div>  

<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true"><i class="fa fa-times"></i>  </span></button>
        <h4 class="modal-title text-primary" id="myModalLabel">Registration Comfirmation</h4>
      </div>
      <div class="modal-body">
  <div class="header-lined"> 
                   <h1>Personal Information</h1>
                </div>
 <div class="row">
            <div class="col-md-4   col-max col-md-offset-4">
  <img id="image" class="thumbnail" src=""> 
    <div class="progress" id="loadi">
    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
          <div class="clearfx"></div>
<div class="clear"></div>
 
    </div><div class="clear"></div>
  </div>
 <div class="clear"></div>
  </div>
</div>
 
        <div class="clear"></div>
    <div class="row">
<div class="clear"></div>
      
  
        <div class="col-md-3    ">
  <label>Last Name :</label> <span id="last"></span> 
  </div>
 <div class="col-md-3  ">
  <label>Other Names :</label> <span id="others"></span> 
  </div>
  <div class="col-md-3">
   <label>DOB :</label> <span id="dob"></span> 
   </div>
</div>


 <div class="row">        
<div class="col-md-3">
   <label>Phone No :</label> <span id="pho"></span> 
  </div>

  <div class="col-md-3">
    <label>Gender :</label> <span id="gen"></span> 
    </div>
        <div class="col-md-3">
  <label>State Of Origin</label> <span id="states"></span> 
  </div>

 
</div>
<div class="row">
   
  
    <div class="col-md-3">
    <label>Marital Status :</label> <span id="stat"></span> 
    </div>
    <div class="col-md-3">
        <label>L.G.A</label> <span id="lg"></span> 
        </div>
        <div class="col-md-3">
            <label>Nationality</label> <span id="nat" ></span> 
            </div>
  
 </div>
<div class="row"> 
      
    <div class="col-md-3">
        <label>Address</label> <span id="ad"></span> 
        </div>

   </div> 

   

<br  clear="all"> 
     <div class="header-lined"> 
                   <h1>Jamb Detials</h1>
                </div>
                <div class="col-md-3">
                    <label>Jamb Registration Number</label> <span id="jambno" ></span> 
                    </div>
                    <br  clear="all"> 
    <div class="col-md-7">
        <div class="form-inline">
            <div class="form-group  ">
                <span id='jamb1'>    </span> <span id="score1"></span> 
            </div> 
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-inline">
            <div class="form-group ">
                <span id='jamb2'>    </span> <span id="score2"></span> 
            </div> 
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-inline">
            <div class="form-group  ">
                <span id='jamb3'>    </span> <span id="score3"></span> 
            </div> 
        </div>
    </div>
    
    <div class="col-md-7">
        <div class="form-inline">
            <div class="form-group ">
                <span id='jamb4'>    </span> <span id="score4"></span> 
             </div> 
             
        </div>
    </div>
    <br  clear="all"> 
   <div class="col-md-7">
    <label>1st Choice</label>  
  </div>
  <br  clear="all"> 

  <div class="col-md-7">
   <label>Faculty :</label> <span id="sch"></span> 
  </div>
 
 
   <div class="col-md-8">
  <label>Department: </label> <span id="depp"></span> 
  </div>
       
 
   <div class="col-md-9">
  <label>Course</label> <span id="cs"></span> 
  </div>
  
  <br  clear="all"> 
  <div class="col-md-7">
    <label>2nd Choice</label>  
  </div>
  <br  clear="all"> 
  <div class="col-md-7">
   <label>Faculty :</label> <span id="sch2"></span> 
  </div>
 
    <div class="col-md-8">
  <label>Department: </label> <span id="depp2"></span> 
  </div>
       
 
   <div class="col-md-9">
  <label>Course</label> <span id="cs2"></span> 
  </div>
  
<br  clear="all"> 
     <div class="header-lined"> 
                   <h1>O level</h1>
                </div>
                <div class="col-md-7">
                    <div class="form-inline">
                      <div class="form-group ">
                        <label>    Sitting(s) :</label> <span id="sittingv"></span> 
                      </div> 
                      
                      <div class="form-group ">
                          <label>    Exam Date</label> <span id="examdatev"></span> 
                        </div>
                    </div>
                  </div>
                  
                  <div class="col-md-7">
                      <div class="form-inline">
                        <div class="form-group ">
                          <label>    Exam Type :</label> <span id="examtypev"></span> 
                        </div> 
                        
                        <div class="form-group ">
                            <label>    Exam Number</label> <span id="examnumberv"></span> 
                          </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
 <div class="table-responsive">
   <table border="0" class="  table table-bordered table-hover"  id="olevelt">
        <tr >
             <th>#</th>
            <th>Subject</th>
            <th>Grade</th>  
        </tr>
 
 
     
    </table>  
  </div>
  
 
         
    
      <div class="modal-footer">
         
       <div class="col-md-2   text-left"> <span class="bshide" id="ntload"><i class="fa fa-circle-o-notch fa-spin fa-2x text-primary"></i></span> </div> 
        <div class="col-md-5   text-danger " id="noty"></div> 
        <button type="button" class="btn btn-large btn-primary" id="finish">Proceed</button> 
       
      </div>
    </div>
  </div>
</div>
    
</section>
<section id="footer">

    <p>Copyright &copy; {{ date('Y') }} {{strtoupper(App\setting::where('description','name')->value('value'))}}. All Rights Reserved.</p>

</section>
<script>
 
    
    $('#image_upload_form').submit(function (e) {
       
     
    });

  
</script>
<script src="public/assets/js/jcarousellite_1.js" type="text/javascript"></script>
<script src="public/assets/js/jqueymin.js" type="text/javascript"></script>

   <script src="public/assets/js/jquery_002.js" type="text/javascript"></script>


   <script src="public/assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
   <script src="public/assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">    </script>
<script src="public/assets/js/moment-with-locales.js"></script>
   <script src="public/assets/js/bootstrap-datetimepicker.js"></script>
   <!-- Styling -->

   <link href="public/assets/css/datepicker.css" rel="stylesheet">
   <link href="public/assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
   <link rel="stylesheet" href="public/assets/css/validationEngine.jquery.css" type="text/css"/> 
   

    <link href="public/assets/css/file.css" rel="stylesheet">
   <link rel='stylesheet' type='text/css' href='public/assets/css/mmu.css' />
   <!-- jQuery -->

   <script type='text/javascript' src='public/assets/js/menu_jquery.js'></script>
   <!-- Custom Styling -->
   <link rel="stylesheet" href="public/assets/css/custom.css">
<script src="public/assets/js/bootstrap.min.js"></script>
<script src="public/assets/js/jquery-ui.min.js"></script>
 



</body>
</html>  
   
@endsection       