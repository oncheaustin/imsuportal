@extends('porth.head')

@section('content')
<section id="main-body" class="container">


<!-- Container for main page display content -->
<div class=" main-content">


    <div class="logincontainer  ">
               
     
        
        <div class="col-md-12 ">
            

                <div class="header-lined well">
        
                    <h1>Register </h1>
                    
                    @if($errors->any())
        <div class="alert alert-danger text-center">
           @foreach ($errors->all() as $error)
           <div class="info">{{ $error }}</div>
               
          @endforeach
            </div>
        @endif
        
        
               {{ Form::open(array('url' => 'register' ,'role'=>'form')) }}
              
               
               
          <div class="form-group">
                        <label for="lastname">Last Name</label>
                        {!!Form::text('lastname', old('lastname', null), [
              'class'=>'form-control boxing','placeholder'=>'Last Name', 'id'=>'lastname']) !!}
                     </div>
            <div class="form-group">
                        <label for="middlename">Other Name(s)</label>
                        {!!Form::text('middlename', old('middlename', null), [
              'class'=>'form-control boxing','placeholder'=>'Middle Name', 'id'=>'middlename']) !!}
                      </div>
        
        
                      <div class="form-group">
                        <label for="jamb">Jamb Registration Number</label>
                        {!!Form::text('jamb', old('jamb', null), [
              'class'=>'form-control boxing' ,'placeholder'=>'eg 98787899988AD', 'id'=>'jamb']) !!}                
                     </div>
        
        
                <div class="form-group">
                        <label for="phone">Phone</label>
                        {!!Form::text('phone', old('phone', null), [
              'class'=>'form-control boxing','placeholder'=>'Phone :08055455541', 'id'=>'phone']) !!}                
                     </div>
        
        
                     
                     <div class="form-group">
                        <label for="email">Email</label>
                        {!!Form::text('email', old('email', null), [
                       'class'=>'form-control boxing','placeholder'=>'Email: example@gmail.com', 'id'=>'email']) !!}                
                     </div>
        
                     <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password', array('id' => 'password','class'=>'form-control boxing'
                         ,'placeholder' => 'Password')) !!}
                     </div>
        
                     <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        {!! Form::password('password_confirmation', array('id' => 'password_confirmation','class'=>'form-control boxing'
                         ,'placeholder' => 'Confirm Password')) !!}
                     </div>
        
                    <div class="checkbox">
        
                    </div>
        
                    <div align="center">
                        <input type="hidden" name="submitted" id="submitted" value="yes">
                    
        {!! Form::submit('Register', array('class'=>'btn btn-primary btn-large btn-block')) !!}   </div>
        
                {{ Form::close() }} 
               
            </div>
              <a href="{{url('student')}}" class="btn btn-success   btn-block">Login</a>
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
</script>


</body>

</html>  

 @endsection           
