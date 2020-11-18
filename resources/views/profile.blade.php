@extends('porth.head') 
@section('content')

<section id="main-body" class="container">


<!-- Container for main page display content -->
<div class="col-md-11 main-content">
   
                <div class="col-md-3">
                        <div class="row"> 
                     <center> 
                            <div class="col-centered border"> 
                    <img  height="200" width="189"  src="@if(Auth::user()->pic!='') {{ 'public/uploads/'.Auth::user()->pic }} @else public/images/user.png @endif" class="  img-thumbnail img-responsive"> 
                    <h5 class="text-center">APPLICATION ID {{ Auth::user()->appid }}</h5>
                            </div > </center> 
                         
                    </div  > 

                        <div class="col-4">
                          <div class="list-group text-center" id="list-tab" role="tablist">
                              @if(Auth::user()->reg==Auth::user()->appid)
                               <a class="list-group-item list-group-item-action "
                                id="list-home-list" data-toggle="list" target="_blank" href="{{ url('admission') }}"
                                role="tab" aria-controls="home">Print Admission</a>

                                <a class="list-group-item list-group-item-action  "
                                id="list-home-list" data-toggle="list" target="_blank" href="{{ url('print') }}"
                                role="tab" aria-controls="home">Print Application Summary </a>
                              @else

                              @endif 
                              
                         </div>
                        </div>
                        
                </div>
                <div class="col-md-8">
                    <div class="alert alert-info">
                        <h2>Welcome {{ ucwords(Auth::user()->firstname.' '. Auth::user()->middlename 
                        .' '.Auth::user()->lastname)  }}</h2>

                        
                        <a href="{{url('application')}}" class="btn btn-warning  btn-block ">click her to pay for the 2020/2021 post- UTME/DE Screening</a>
                              
                         
                    </div>
                    
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                             </a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                               <h6>

                                <p>Make payment with your debit card or pay through paystack</p>
                               <p> If your payment is successful, a notification would appear: your payment is successful</p>
                                </h6>
                                  <a href="{{url('application')}}" class="btn btn-danger  btn-block ">Click here to apply for the 2020/2021 Post-UTME/DE Screening</a>
                              <h4>
                                  complete the application form carefully and correctly and then click submit to complete your registration
                              </h4>
                           
                              </div>
                          </div>
                        </div>

                   
 
</div>

</div>
<!-- /.main-content -->

<div class="clearfix"></div>
</section>

<section id="footer">

<p>Copyright &copy; {{ date('Y') }} {{strtoupper(App\setting::where('description','name')->value('value'))}}. All Rights Reserved.</p>

</section>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
document.getElementById('studymode').value = "";
</script>


</body>

</html>  



                     @endsection           
