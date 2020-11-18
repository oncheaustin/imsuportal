@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h4>Add School</h4>
                       
                    </div>
                </div>
            </div>
        </header>

        <section class="card ">
            
            <div class="card-block">
                <h3 class="with-border m-t-0">School</h3> 
                <div class="row">
                    <form  method="POST" action="" class="col-md-9">
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
                                        <label class="form-label" for="school">School Name</label>
                                        <input type="text" class="form-control" value="{{ old('school')}}" name="school" id="school">
                                </div>
 <div class="form-group">
                    <button name="addpin" value="addpin" class="btn btn-inline btn-danger ladda-button" data-style="expand-right"><span class="ladda-label">Add New School</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 117px;"></div></button>
                </div>
                            
                         </form>
                     
                            </div>
                            
                            <h3 class="with-border m-t-0"></h3>
                            
		   
                            <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Number of Departement(s)</th> 
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr> 
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Number of Departement(s)</th> vsdq
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i=1; ?>
                                            @foreach( DB::table('schools')->get() as $in)
                                     <tr>
                                             <td>{{$i++   }}</td> 
                                             <td>{{$in->schools_name   }}</td>
                                             <td><button type="button"
                                                class=" btn btn-sm btn-block"
                                                title="Lists"
                                                data-container="body"
                                                data-toggle="popover"
                                                data-placement="top"  
                                                data-content=' {{App\department::where('schools_id',$in->id)->pluck('department_name')}} '>
                                           {{App\department::where('schools_id',$in->id)->get()->count()}}
                                        </button></td>
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