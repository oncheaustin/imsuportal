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
       <h2>APPLICATION FORM FOR ADMISSION 2016/2017</h2>
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
 <img id="sd" class="thumbnail" height="200" width="189" src="  @if(Auth::user()->pic!="") {{ "uploads/".Auth::user()->pic }}  @else images/avatar_no.jpg  @endif "   />  
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
              
 
 
   
                <label for="inputFirstName" class="control-label boxing">First Name</label>
                <input type="text" name="firstname"  id="firstname"     class="form-control form-group boxing" disabled="disabled" value="Ben"  />
                
                 <label for="inputLastName" class="control-label  boxing">Last Name</label>
                <input type="text" name="lastname"  id="lastname" value="Benson" disabled="disabled" class="form-control boxing  form-group disabled" />
           
                <label for="inputOthernames" class="control-label boxing  ">Other Name(s)</label>
                <input type="text" name="others" id="other" value=""   disabled="disabled"  class="form-control boxing " />
            
                <label for="kin_phone" class="control-label boxing">Next Of Kin Phone No</label>
                <input  type="text" class="validate[required,custom[phone]  form-control form-group boxing " data-prompt-position="topLeft:0,0"   id="kin_phone"  name="kin_phone" placeholder="08012345678"  value=""   > 
                         
            </div>

          

            <div class="col-md-3 form-group boxing ">
                <label for="inputEmail" class="control-label boxing ">Religion</label>
                <select name="religion"  id="religion"  class="validate[required] form-control form-group boxing  " data-prompt-position="topLeft:0,0"  data-errormessage-value-missing="Please Select Your Religion!"     >
                <option value="">Select An Option </option>
                <option value="Christain">Christain</option>    
                <option value="Muslim">Muslim</option>  
                <option value="Others">Others</option>  
                </select>    
                
                <label for="inputPhone" class="control-label boxing">Phone No</label>
 <input  type="text" class="validate[required,custom[phone]  form-control form-group boxing " data-prompt-position="topLeft:0,0"   id="phone"  name="phone" placeholder="08012345678"  value="080"  disabled="disabled"> 
                                    
                 
                <label for="inputState" class="control-label boxing">State Of Origin</label>
                  <select  name="state"  id ="state" class="validate[required] form-control boxing form-group"  data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Select A State!" onchange="load_state(this.value);"    >
              <option value="">Select An Option </option>
              @foreach(DB::table('state')->get() as $value)                                                         
              <option value="{{ $value->id}}">{{ucwords( $value->name)}}</option>
        @endforeach 
     
               </select>
               <label class="control-label boxing" for="kin_address">Next Of Kin Address</label>
               <input type="text" id="kin_address"  class="validate[required] form-control boxing form-group" data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Enter Your Address!" name="kin_address"   >  
           
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
            <label for="inputLgea" class="control-label boxing">L.G.E.A</label>
                  <select  id="lga"  name="lga" class="  validate[required] form-control form-group boxing"  data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Select A L.G.E.A!"     >
              <option value="">Select An Option </option>  
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
             <label class="control-label boxing" for="inputAddress">Address</label>
               <input type="text" id="address"  class="validate[required] form-control boxing form-group" data-prompt-position="topLeft:0,0" data-errormessage-value-missing="Please Enter Your Address!" name="address"   >  
            </div>
 
 
 
 
    

     
     <div class="col-md-11  ">

<div class="header-lined"> 
       <h1>Choice Of Study</h1>
    </div>
 </div>

                      
         <div class="col-md-5  "> 
 
         <div class="clearfix"></div>
                <label for="inputSchool" class="control-label boxing">School</label>
              
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
 
 
         
      <div class="clearfix"><br></div>

      
      <div class='row'>
            <div class='col-sm-5'>    
                <div class='form-group'>
                    <label for="reg_no" class="control-label boxing">Regno</label>
                    <input class="validate[required] form-control boxing form-group"    data-errormessage-value-missing="Please Select Your Regno!" id="reg_no" name="reg_no" size="30" type="text"  />
                </div>

            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="teller" class="control-label boxing">Teller No</label>
                    <input class="validate[required] form-control boxing form-group"    data-errormessage-value-missing="Please Select Your Teller No!" id="teller" name="teller" required="true" size="30" type="text" />
                </div>
            </div>
            
        </div>
         
        <div class="clearfix"></div>
      

    <div class="form-group text-center">
        <br><br><br>
        
      
        <input class="btn btn-primary" type="submit" name="save" value="Save Changes" />
        <input class="btn btn-default" type="reset" value="Cancel" /> 
      
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
            <div class="col-md-3  "> 
  <label>First Name :</label> <span id="first"></span> 
  </div>
        <div class="col-md-3    ">
  <label>Last Name :</label> <span id="last"></span> 
  </div>
 <div class="col-md-3  ">
  <label>Other Names :</label> <span id="others"></span> 
  </div>
</div>
 <div class="row">
   <div class="col-md-3">
   <label>DOB :</label> <span id="dob"></span> 
   </div>
  
   <div class="col-md-3">
   <label>Marital Status :</label> <span id="stat"></span> 
   </div>
       <div class="col-md-3">
   <label>Gender :</label> <span id="gen"></span> 
   </div>
</div>
 <div class="row">        
<div class="col-md-3">
   <label>Phone No :</label> <span id="pho"></span> 
  </div>
 <div class="col-md-3  ">
   <label>Religion:</label> <span id="reli"></span> 
  </div>       
  <div class="col-md-3">
  <label>L.G.A</label> <span id="lg"></span> 
  </div>
</div>
<div class="row"> 
        <div class="col-md-3">
  <label>State Of Origin</label> <span id="states"></span> 
  </div>
 <div class="col-md-3">
  <label>Address</label> <span id="ad"></span> 
  </div>
<div class="col-md-3">
  <label>Nationality</label> <span id="nat" ></span> 
  </div>
   </div> 

   <div class="row"> 
        <div class="col-md-3">
  <label>Next Of Kin Address</label> <span id="kin_ad"></span> 
  </div>
 <div class="col-md-3">
  <label>Next Of Kin Phone</label> <span id="kin_ph"></span> 
  </div>
 
   </div> 

<br  clear="all"> 
     <div class="header-lined"> 
                   <h1>Choice Of Study</h1>
                </div>
 
    

  <div class="col-md-7">
   <label>School :</label> <span id="sch"></span> 
  </div>
 
 
   <div class="col-md-8">
  <label>Department: </label> <span id="depp"></span> 
  </div>
       
 
   <div class="col-md-9">
  <label>Course</label> <span id="cs"></span> 
  </div>
 
 
  <div class="row"> 
        <div class="col-md-3">
  <label>Regno</label> <span id="regno"></span> 
  </div>
 <div class="col-md-3">
  <label>Teller</label> <span id="tell"></span> 
  </div>
 
   </div> 
<br  clear="all"> 
    
 
  
 
         
    
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

    <p>Copyright &copy; 2015 Benue State Polytechnic, Ugbokolo. All Rights Reserved.</p>

</section>
<script>

    
    $('#image_upload_form').submit(function (e) {
       
     
    });

  
</script>
<script src="assets/js/jcarousellite_1.js" type="text/javascript"></script>
<script src="assets/js/offjqueymin.js" type="text/javascript"></script>

   <script src="assets/js/jquery_002.js" type="text/javascript"></script>


   <script src="assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"> </script>
   <script src="assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">    </script>
<script src="assets/js/moment-with-locales.js"></script>
   <script src="assets/js/bootstrap-datetimepicker.js"></script>
   <!-- Styling -->

   <link href="assets/css/datepicker.css" rel="stylesheet">
   <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/validationEngine.jquery.css" type="text/css"/> 
   

    <link href="assets/css/file.css" rel="stylesheet">
   <link rel='stylesheet' type='text/css' href='assets/css/mmu.css' />
   <!-- jQuery -->

   <script type='text/javascript' src='assets/js/menu_jquery.js'></script>
   <!-- Custom Styling -->
   <link rel="stylesheet" href="assets/css/custom.css">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
 



</body>
</html>  
   
@endsection       