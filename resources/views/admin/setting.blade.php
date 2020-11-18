@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h4>Setting</h4>
                       
                    </div>
                </div>
            </div>
        </header>

        <section class="card ">
            
            <div class="card-block">
                <h3 class="with-border m-t-0">Setting</h3> 
                <div class="row">
                    {{ Form::open(['url' => Request::url(), 'files' => true ,'class'=>'col-md-9'])}}
                    @csrf
                 
              
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
                                        <label class="form-label" for="school">App Name</label>
                                         {{ Form::text('name',  App\setting::where('description','name')->value('value'), array( 'class' =>  $errors->has('title') ? ' form-control is-invalid' : 'form-control','id'=>'Title','placeholder'=>"Site Title")) }}
                 
                                </div>


                                <div class="form-group"> 
                                    {{ Form::label('Upload Logo') }}<br>
                                    <img src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" alt="profile Pic" height="200" width="200"><br>
                                    {!! Form::file('file',['class' =>  $errors->has('file') ? '   is-invalid' : ' ']) !!}
                
                                     @if ($errors->has('file'))
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('file') }}</strong>
                                     </span>
                                 @endif
                                   </div>

<hr>

<div class="form-group"> 
    {{ Form::label('Upload Paortal head') }}<br>
    <img src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','portal')->value('value')}}" alt="profile Pic" height="200" width="200"><br>
    {!! Form::file('portal',['class' =>  $errors->has('portal') ? '   is-invalid' : ' ']) !!}

     @if ($errors->has('file'))
     <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('portal') }}</strong>
     </span>
 @endif
   </div>

                                <div class="form-group">
                                     {{  Form::submit('Submit',['class'=>'btn btn-primary btn-block mt-3'])}}
                                </div>
                            
                         </form>
                     
                            </div>
                            
                            <h3 class="with-border m-t-0"></h3>
                            
		   
                         

                    </div> 
                    
                    
                    
                      
     
            </div>
        </section>




    </div><!--.container-fluid-->
</div><!--.page-content-->

 
@endsection       