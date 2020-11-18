@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h4>Add Course</h4>
                       
                    </div>
                </div>
            </div>
        </header>

        <section class="card ">
            
            <div class="card-block">
                <h3 class="with-border m-t-0">Courses</h3> 
               
                    <form  method="POST" action="" class=" ">
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
                            <div class="row">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             
                    
                             <div class="col-md-4 col-sm-6">
                                    <fieldset class="form-group"> 
                                    <label class="form-label" for="school">Department</label>
                                    {!! Form::select('department', App\department::pluck('department_name', 'id')->prepend('Please Select An Option',''), old('department'), ['id' => 'department', 'class'=>' form-control select2']); !!}
                                    </fieldset>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                        <fieldset class="form-group">
                                        <label class="form-label" for="school">Course Name</label>
                                        <input type="text" class="form-control" value="{{ old('course')}}" name="course" id="course">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                            <fieldset class="form-group">
                                        <label class="form-label" for="school">Program</label>
                                        <input type="text" class="form-control" value="{{ old('program')}}" name="program" id="program">
                                            </fieldset>
                                    </div>
                                
                                    <div class="col-md-4 col-sm-6">
                                        <fieldset class="form-group">
                                        <label class="form-label" for="school">Program Abbreviation</label>
                                        <input type="text" class="form-control" value="{{ old('ab')}}" name="ab" id="ab">
                                    </fieldset>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                            <fieldset class="form-group">
                                        <label class="form-label" for="school">Duratoin</label>
                                        <input type="text" class="form-control" value="{{ old('duration')}}" name="duration" id="duration">
                                            </fieldset>
                                    </div>
                                            
 
                            </div>
                        
                    {!! Form::submit('Add New Course', array('class'=>'btn btn-primary btn-large btn-block')) !!} 
                  
                        </form>
                     
                             
                            <h3 class="with-border m-t-0"></h3>
                            
		   
                            <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th>Program Abbreviation</th>
                                        <th>Duration</th> 
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr> 
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Program</th>
                                            <th>Program Abbreviation</th>
                                            <th>Duration</th> 
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; ?>
                                            @foreach( App\course::orderBy('department_id', 'ASC')->get() as $in)
                                     <tr>
                                             <td>{{$i++   }}</td> 
                                             <td>{{$in->course_name   }}</td>
                                             <td>{{$in->program }}</td>
                                             <td>{{$in->ab }}</td>
                                             <td>{{$in->duration}}</td>
                                     </tr>
                                  @endforeach 
                                 
                                    </tbody>
                                </table>

                    </div> 
                    
                    
                    
                      
     
            </div>
        </section>




    </div><!--.container-fluid-->
</div><!--.page-content-->

 
@endsection       