@extends('porth.head')

@section('content')
<section id="main-body" class="container">


<!-- Container for main page display content -->
<div class="col-md-11 main-content">


    <div class="logincontainer  ">

        <div class="header-lined">
 


 

     @if($errors->any())
<div class="alert alert-danger text-center">
   @foreach ($errors->all() as $error)
   <div class="info">{{ $error }}</div>
       
  @endforeach
 
    </div> 
    @else
<div class="alert alert-info text-center">
     <div class="info">Fill In Fields To Proceed To Your Application Form     </div>
      </div> 
@endif

       {{ Form::open(array('url' => 'application' ,'role'=>'form')) }}
 

            <div class="form-group">
                <label for="apppin">Application Pin</label>
            {!!Form::text('apppin', old('apppin', null), [
      'class'=>'form-control boxing','placeholder'=>'Enter Application Pin', 'id'=>'apppin']) !!}
        </div>
            <div class="form-group">
                <label for="addpin">Admission pin</label>
                {!!Form::text('adpin', old('adpin', null), [
                    'class'=>'form-control boxing','placeholder'=>'Enter Admission Pin', 'id'=>'adpin']) !!}
                    
             </div>

            <div class="checkbox">

            </div>
<div class="form-group">
{!! Form::submit('Proceed', array('class'=>'btn btn-primary btn-large btn-block')) !!} 

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

<p>Copyright &copy; 2015 Benue State Polytechnic, Ugbokolo. All Rights Reserved.</p>

</section>

<script src="public/assets/js/bootstrap.min.js"></script>
<script src="public/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
document.getElementById('studymode').value = "";
</script>


</body>

</html>  



                     @endsection           
