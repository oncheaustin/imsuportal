@extends('porth.head')

@section('content')
<section id="main-body" class="container">


<!-- Container for main page display content -->
<div class="col-md-11 main-content">


    <div class="logincontainer  ">

        <div class="header-lined">

            <h1>Login </h1>
 

@if($errors->any())
<div class="alert alert-danger text-center">
   @foreach ($errors->all() as $error)
   <div class="info">{{ $error }}</div>
       
  @endforeach
    </div>
@endif

@if(isset($success))
<div class="alert alert-success text-center">
     
    <div class="info">{{ $success }}</div>
        
 
     </div> 
@endif

       {{ Form::open(array('url' => 'student' ,'role'=>'form')) }}
 

            <div class="form-group">
                <label for="phone">Jamb Regno No</label>
            {!!Form::text('jamb_regno', old('jamb_regno', null), [
      'class'=>'form-control boxing','placeholder'=>'Jamb Regno', 'id'=>'jamb_regno']) !!}
        </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                {!! Form::password('password', array('id' => 'password','class'=>'form-control boxing'
                 ,'placeholder' => 'Password')) !!}
             </div>

            <div class="checkbox">

            </div>
<div class="form-group">
{!! Form::submit('Login', array('class'=>'btn btn-primary btn-large btn-block')) !!}
  <a href="{{url('register')}}" class="btn btn-danger   btn-block">Register</a>

</div>
              
         {{ Form::close() }}  
        <div class="form-group"> 
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
