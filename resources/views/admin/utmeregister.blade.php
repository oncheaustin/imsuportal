@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell"> 
                        <ol class="breadcrumb breadcrumb-simple"> 
                            <li class="active">Reports Main Stream</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <section class="card">
                <div class="card-block">
                       
       {{ Form::open(array('url' => Request::url() ,'role'=>'form')) }}
      	@if($errors->any())
							<div class="alert alert-danger text-center">
							   @foreach ($errors->all() as $error)
							   <div class="info">{{ ucwords( $error) }}</div>
								   
							  @endforeach
								</div>
							@endif
                    <div class="row">
						<div class="col-md-12 col-sm-6">
                            <fieldset class="form-group">
                                <label class="form-label" for="exampleInputError">Sessions</label>
                                {!! Form::select('session',App\session::pluck('session', 'session')->prepend('Please Select An Option',''), old('session'), ['id' => 'session', 'class'=>' form-control select2']); !!}
                            </fieldset>
                        </div>
                            <div class="col-md-3 col-sm-6">
                                <fieldset class="form-group"> 
                                    <label class="form-label" for="exampleInputDisabled">Department</label>  
                                    {!! Form::select('department', App\department::pluck('department_name', 'id')->prepend('Please Select An Option',''), old('department'), ['onchange'=>'load_options(this.value,"course","course1")','id' => 'department', 'class'=>' form-control select2']); !!}
                                 </fieldset>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputDisabled2">Course</label>
                                    {!! Form::select('course', array('' => 'Select An Option' ), @$pin, ['onchange'=>'load_options(this.value,"duration","duration")','id' => 'course', 'class'=>' form-control select2']); !!}
                                </fieldset>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <fieldset class="form-group"> 
                                    <label class="form-label" for="exampleInputDisabled">Department</label>  
                                    {!! Form::select('department2', App\department::pluck('department_name', 'id')->prepend('Please Select An Option',''), old('department2'), ['onchange'=>'load_options(this.value,"course2","course1")','id' => 'department2', 'class'=>' form-control select2']); !!}
                                 </fieldset>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputDisabled2">Course</label>
                                    {!! Form::select('course2', array('' => 'Select An Option' ), @$pin, ['onchange'=>'load_options(this.value,"duration","duration")','id' => 'course2', 'class'=>' form-control select2']); !!}
                                </fieldset>
                            </div>
                            
							
                            
                            <div class="col-md-3 col-sm-6">
                                    <fieldset class="form-group"> 
                                <label class="form-label" for="school">Olevel</label>
                                <select class="select2" multiple="multiple" name="olevel[]">
                                    @foreach (App\osubject::get() as $value)
                                    <option   @if(@in_array($value->id,old('olevel'))) selected @endif  value="{{ $value->id }}">{{ ucwords(strtolower($value->name)) }}</option>
                                    @endforeach                                                        
                                </select>     
                               </fieldset> 
                            </div>
 
                        <div class="col-md-3 col-sm-6">
                            <fieldset class="form-group"> 
                        <label class="form-label" for="school">Jamb</label>
                        <select class="select2" multiple="multiple" name="jamb[]">
                            @foreach (App\jambsub::get() as $value)
                             <option  @if(@in_array($value->id,old('jamb'))) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach 
                        </select>     
                    </fieldset>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputDisabled2">Gender</label>
                            {!! Form::select('sex', ['' => 'Please Select Gender','female' => 'Female', 'male' => 'Male'], 'S',['class'=>' form-control select2']); !!}   </fieldset>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <fieldset class="form-group"> 
                            <label class="form-label" for="exampleInputDisabled">State</label>  
                            {!! Form::select('state', App\state::pluck('name', 'id')->prepend('Please Select An Option',''), old('state'), ['onchange'=>' ','id' => 'state', 'class'=>' form-control select2']); !!}
                         </fieldset>
                    </div>
                        </div>
                     
{!! Form::submit('Generate', array('class'=>'btn btn-primary btn-large btn-block')) !!}  
@if(session()->has('data') && is_array(session()->get('data')))  {!! Form::submit(' Download PDF', array('class'=>'btn btn-warning btn-large btn-block','name'=>'pdf')) !!}  
@endif
</div>
{{ Form::close() }}                                     
 
</section>
<div class="clearfx"></div>
<section class="card">
	<div class="card-block">
		   
<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Gender</th>
		<th>Phone</th>
		<th>State</th>
		<th>LGA</th> 
        <th>Jamb Registration Number</th> 
        <th>Session</th> 
        <th>Jamb Aggregate</th> 
        <th> </th> 
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Gender</th>
        <th>Phone</th>
        
		<th>State</th>
		<th>LGA</th> 
        <th>Jamb Registration Number</th> 
        <th>Session</th>
        <th>Jamb Aggregate</th> 
        <th></th> 
	</tr>
	</tfoot>
	<tbody>
        @if(session()->has('data'))
        <h3 class="text-center"> NO OF REGISTERED STUDENT ({{ count(session()->get('data')) }}) </h3>
  
            @foreach( session()->get('data')  as $in    )
            
            <?php  
            
            $app=App\app::where('appid', $in)->get()->first();
            $user=App\User::where('appid', $in)->get()->first(); 
            
            $ch1=App\choice::where(['appid'=> $in,'no'=>1])->get()->first();             
            $ch2=App\choice::where(['appid'=> $in,'no'=>2])->get()->first();  
            $state=App\state::where('id', $app->state)->get()->first()->name;   
            $lga=App\lga::where('id', $app->lga)->get()->first()->name;          
              $jamb=App\jamb::where('appid', $in)->get()->sum('score');
            ?>
	 <tr>
			<td><img src=" {{asset('public/uploads').'/'. @$user->pic }}" width="90" height="90"></td>
			<td> {{ strtoupper(@$user->lastname .' '.@$user->middlename)  }}</td>
			<td>{{ strtoupper( @$app->sex) }} </td>
			<td>{{ @$user->phone }}  </td>
			<td> {{strtoupper( @$state )}} </td> 
			<td>{{ strtoupper( @$lga )}}</td>  
			<td>{{ strtoupper( @$app->jambregno  )}}</td>  
            <td> {{ @$app->session }}</td>            
            <td> {{  $jamb}}</td>
                       
			<td>    <a href="{{url('admin/print/')}}/{{ $in }}" target="_blank" class="btn btn-success   btn-block">PrintOut</a></td>
	 </tr>
@endforeach 
 
@endif
 
	</tbody>
</table>
          
                </div>
        </section>
 



    </div><!--.container-fluid-->
</div><!--.page-content-->

 
@endsection       