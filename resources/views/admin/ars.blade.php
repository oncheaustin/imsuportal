<?php 
use Illuminate\Support\Facades\Input;
?>
@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell"> 
                       
                    </div>
                </div>
            </div>
        </header>

        <section class="card ">
            
            <div class="card-block">
                <h3 class="with-border m-t-0">ARS</h3> 
                <div class="row">
                    <form  method="POST" action="" class="col-md-12">
                            @if(session('success')) 
                            <div class="alert alert-success alert-fill alert-close alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button> 
                                       <h3> {{session('success')}}</h3>
                                </div>
                        @endif
                       
                            @if($errors->any())
                            <div class="alert alert-danger alert-fill alert-close alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                               @foreach ($errors->all() as $error)
                                {{ ucwords($error) }} <br>
                                   
                              @endforeach
                                </div>
                            @endif

                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          
                             
        <div class="form-group"> 
                <label class="form-label" for="school">Regno/APPID</label>
                <input type="text" class="form-control" value="{{ Input::get('number')}}" name="number" id="number">
        </div>
        <h3 class="with-border m-t-0"></h3>
        @if(!empty($information )) 
        <div class="row">

                <div class="col-md-2 col-sm-3">
                        <fieldset class="form-group"> 
                    <div class="profile-card-photo">
        <img src="{{asset('uploads')}}/{{App\user::where('appid',$information)->value('pic')}}" height="100" width="100" alt="">
            </div>           </fieldset>
                    </div>
                    <div class="col-md-3 col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputError"><h3>
                                    {{ucwords(App\user::where('appid',$information)->value('firstname'))}} 
                                    {{ucwords(App\user::where('appid',$information)->value('middlename'))}} 
                                    {{ucwords(App\user::where('appid',$information)->value('lastname'))}}</h3>
                                </label>
                                <label class="form-label" for="exampleInputError">
                                <h3>
                                        {{ucwords(App\department::where('id',App\registration::where('appid',$information)
                                        ->value('department'))
                                        ->value('department_name'))}}  
                                </h3>
                                    </label>
                                   </fieldset>
                        </div>
                    <div class="col-md-3 col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputError">
                                    <h4>
                                    {{ucwords(App\course::where('id',App\registration::where('appid',$information)
                                    ->value('course'))
                                    ->value('course_name'))}}  
                                    </h4>
                                </label>
                                    </fieldset>
                        </div>
        </div>
       
        @endif

        @for ($x = 1; $x <= @$duration; $x++)  
            <div class="form-group">  
            <label class="form-label" for="pin{{$x}}">Year {{$x}} Pin</label>
                    <input type="text" class="form-control" value="{{ Input::get('pin')[$x]}}" name="pin[{{$x}}]" id="pin{{$x}}">
            </div>
        @endfor

       {!! Form::submit('Check', array('class'=>'btn btn-primary btn-large btn-block')) !!} 
                            
                         </form>
                     
                            </div>
                            
                            
		   
                                </div> 
                    
                    
                    
                      
     
            </div>
        </section>




    </div><!--.container-fluid-->
</div><!--.page-content-->

 
@endsection       