@extends('porth.head')

@section('content')

    <section id="main-body" class="container">

 
     
    <div class="col-md-12  pull-md-left">
        <div class="header-lined">

            <ol class="breadcrumb">
                <li>
                    <a href=".">  Portal         
    </a> 
                </li>
                <li class="active">
                    Home
                </li>
            </ol>
        </div>

    </div>
 <!-- news -->
                    
            <!-- end new-->

            <!--starting new student-->
          
            <!--starting new student-->
            <div class="col-md-12 pull-md-left">
                <div menuItemName="Affiliate Program" class="panel panel-default panel-accent-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                                                            <div class="pull-right">
                                  
                                </div>
                  </h3>
                    </div>
                               <div class="panel-body">
                                            
                                                
                                <div class="col-md-6 text-center ">
                                    <h4 class="text-center">  {{strtoupper(App\setting::where('description','name')->value('value'))}}</h4>
                                    <h4 class="text-center">  2020/2021 Post UTME and Direct Entry Screening</h4>
                                    <hr>
                                    <div class="btn-group">
                                        <a href="{{  url('/register/') }}" class="btn btn-success btn-lg   ">
                                            <i class="fa fa-arrow-right"></i>   Register 
                                        </a>
                                       
                                    </div>
                                    <div class="btn-group">
                                        
                                        <a href="{{  url('/student/') }}" class="btn btn-primary btn-lg   ">
                                            <i class="fa fa-arrow-right"></i>   Login
                                        </a>
                                      </div>
                                   
                                </div>        
                                <div class="col-md-4  ">
         <img src="{{URL::asset('public/images/home.jpg')}}" class="img-responsive" alt="{{strtoupper(App\setting::where('description','name')->value('value'))}}">

                                </div>           
                        </div>
                                                            <div class="panel-footer">
  </div>
  </div>
  </div> 
            
            <!--starting new student-->
            <div class="col-md-12 pull-md-left">
                <div menuItemName="Affiliate Program" class="panel panel-default panel-accent-blue">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                                                            <div class="pull-right">
                                   
                                </div>
                 <i class="fa fa-user-plus"></i>&nbsp; New Student Application </h3>
                    </div>
                                            <div class="panel-body">
                                              <h3 class="text-center">  IMO STATE UNIVERSITY, OWERRI 2020/2021 POST-UTME & 
                                            DIRECT ENTRY SCREENING EXERCISE</h3>
                                              <p>  The management of Imo State University (IMSU), Owerri, hereby announces to the general public especially its prospective students, that it has commenced the registration of candidates for the 2020/2021 POST UTME screening exercise.</p>
                                            <h4> ELIGIBILITY </h4>
                                             
                                            
                                            <ul>
                                                <li>Candidates whose choice of Institution (First or Second) is Imo State University, Owerri; and</li> 

                                                <li> Candidates who did not choose IMO State University as first choice University but scored the required cut-off mark can also apply on the condition that they visit the JAMB website for a change of Institution.</li> 

                                                <li> All candidates must have five (5) O’ level credits in relevant subjects at not more than two (2) sittings. Candidates waiting O’ level results can also apply but they will not be considered for admission until their results are  

                                                </li>
                                            </ul>
                                        
                                              <h4>   REGISTRATION PROCEDURE</h4>
                                            
                                            <ul>
                                                <li> Visit <a href="www.imsu.edu.ng">www.imsu.edu.ng</a>  and select post- UTME/DE on the admission dropdown menu.</li> 

                                                <li>You will be directed to the Post-UTME/Direct Entry Page at  <a href="www.admission.imsu.edu.ng/post-utme/de"  > www.admission.imsu.edu.ng/post-utme/de</a>.</li> 

                                                <li>Click on register on the top banner and register with your jamb number, valid phone number and email. If your registration is successful, an account would be created automatically which you would use to apply for the post –UTME/DE </li> 

                                                <li>Click on apply for post-UTME/DE and make payment of two thousand naira (N2000) with your debit card or through Paystack. </li> 

                                                <li>If your payment is successful, a post-UTME/DE application form would open; fill the form completely and correctly and then click submit at the bottom of the form.  </li> 

                                                <li>If you were unable to complete your application for any reason, you can always come back to the post- UTME/DE page at <a href="www.admission.imsu.edu.ng/post-utme/de"  >www.admission.imsu.edu.ng/post-utme/de</a>  and click on login, to login to your account and complete your application before the closing date   </li> 
                                                
                                                <li>After submitting your application form, print the acknowledgement slip  </li> 


                                            </ul>
                                                 
                                            <h4>   NOTE</h4>
                                            
                                            <ul>
                                                <li> Every candidate must provide a valid email address and phone number.
                                                </li> 

                                                <li>All applications must be filled and submitted online on or before 16th October, 2020 as the application window closes on that day.
                                                </li> 

                                                <li>Any wrong information given shall disqualify the candidate. </li> 
 


                                            </ul>
                                              
                                            <h3>For more information and support regarding the post- UTME application:
                                                Send an email to: support@imsu.edu.ng </h3>
                                                
                        </div>
                                                            <div class="panel-footer">
  </div>
  </div>
  </div> 
          <!--end new student -->  
        
          <!--end check new student -->         
 
    <div class="clearfix"></div>
</section>

<section id="footer">

    <p>Copyright &copy; {{ date('Y') }} {{strtoupper(App\setting::where('description','name')->value('value'))}}. All Rights Reserved.</p>

</section>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.min.js"> </script>
   
   <script >         // fade in #back-top
                 // fade in #back-top
 
       
        $(function() {

            var news_slider_height = $('.blog_updates').height();
             
                $('.blog_updates').css('overflow', 'hidden');
                $('.blog_updates').css('height', 'inherit');
            

            $(".newsticker-jcarousellite").jCarouselLite({
                vertical: true,
                hoverPause: true,
                visible: 2,
                auto: false,                
                speed: 1000
            });
        
        });
    </script>
</body>
</html>



                     @endsection           
