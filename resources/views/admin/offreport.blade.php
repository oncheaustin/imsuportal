@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell"> 
                        <ol class="breadcrumb breadcrumb-simple"> 
                            <li class="active">Reports Off Stream</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <section class="card">
                <div class="card-block">
                       
       {{ Form::open(array('url' => 'admin/offreport' ,'role'=>'form')) }}
      	@if($errors->any())
							<div class="alert alert-danger text-center">
							   @foreach ($errors->all() as $error)
							   <div class="info">{{ ucwords( $error) }}</div>
								   
							  @endforeach
								</div>
							@endif
                    <div class="row">
						
                            <div class="col-md-4 col-sm-6">
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
                                    <label class="form-label" for="exampleInputError">Class</label>
                                    {!! Form::select('duration', array('' => 'Select An Option'), @$pin, ['id' => 'duration', 'class'=>' form-control select2']); !!}
                                </fieldset>
							</div>
							<div class="col-md-2 col-sm-6">
                                <fieldset class="form-group">
                                    <label class="form-label" for="exampleInputError">Sessions</label>
                                    {!! Form::select('session',App\session::pluck('session', 'session')->prepend('Please Select An Option',''), old('session'), ['id' => 'session', 'class'=>' form-control select2']); !!}
                                </fieldset>
							</div>
                        </div>
{!! Form::submit('Generate', array('class'=>'btn btn-primary btn-large btn-block')) !!}   </div>
{{ Form::close() }}                                     
</div>
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
		<th>Regno</th>
		<th>Department</th>
		<th>Course</th>
		<th>Session</th> 
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
		<th>Regno</th>
		<th>Department</th>
		<th>Course</th>
		<th>Session</th> 
	</tr>
	</tfoot>
	<tbody>
		@if(session()->has('data'))
			@foreach( session()->get('data') as $in)
	 <tr>
			<td><img src="{{asset('uploads').'/'. App\user::where('appid',$in->appid)->value('pic') }}" width="90" height="90"></td>
			<td>{{  $in->firstname." ".$in->lastname." ".$in->middlename}}</td>
			<td>{{ $in->sex}}</td>
			<td>{{ $in->personal_phone_no}}</td>
			<td>{{  App\state::where('id',$in->state)->value('name')}}</td> 
			<td>{{ App\lga::where('id',$in->LGA)->value('name')}}</td>
			<td>{{$in->reg_no}}</td>
			<td>{{$in->department}}</td>
			<td>{{$in->course}}</td>
			<td>{{$in->session}}</td>
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