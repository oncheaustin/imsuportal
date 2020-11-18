@extends('admin.header.head')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <ol class="breadcrumb breadcrumb-simple">
                            <li class="active">Define Fee</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <section class="card">
                <div class="card-block">

	   {{ Form::open(array('url' => 'admin/fee' ,'role'=>'form')) }}
	   @if(session('success'))
	   <div class="alert alert-success alert-fill alert-close alert-dismissible fade show" role="alert">
			   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					   <span aria-hidden="true">×</span>
				   </button>
				  <h3> {{session('success')}}</h3>
		   </div>
   @endif
      	@if($errors->any())
							<div class="alert alert-danger text-center">

                                @foreach ($errors->all() as $error)
							   <div class="info">{{ ucwords( $error) }}</div>

							   @endforeach
								</div>
							@endif
                    <div class="row">
						<div class="col-md-12 col-sm-12">
							<fieldset class="form-group">
								<label class="form-label" for="exampleInputError">Amount</label>
								{!! Form::text('amount', old('amount'), ['class' => 'form-control']) !!}
							</fieldset>
					</div>

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
{!! Form::submit('Add Fee', array('class'=>'btn btn-primary btn-large btn-block')) !!}   </div>
{{ Form::close() }}
</div>
</section>
<div class="clearfx"></div>
<section class="card">
	<div class="card-block">



<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>S/N</th>
		<th>Department</th>
		<th>Course</th>
		<th></th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th>S/N</th>
		<th>Department</th>
		<th>Course</th>
		<th></th>
	</tr>
	</tfoot>
	<tbody> <?php $i=1; ?>
			@foreach( DB::table('fee')->groupBy('course')->get() as $in)
	 <tr>
			<td>{{$i++}}</td>
			<td>{{App\department::where('id',$in->department)->value('department_name')}}</td>
			<td>{{App\course::where('id',$in->course)->value('course_name')}}</td>
			<td>

					<button type="button"
					class="btn btn-inline btn-primary"
					id='<table border="1%"  class="display table table-bordered">@foreach( App\fee::where('course',"2")->get() as $n)<tr><td>N{{$n->amount}}</td>
						<td>{{$n->session}}</td></tr>@endforeach </table> '
					onclick="not(this,2);">View
				</button>


			</td>
	 </tr>
@endforeach
	</tbody>
</table>

                </div>
        </section>




    </div><!--.container-fluid-->
</div><!--.page-content-->


@endsection
