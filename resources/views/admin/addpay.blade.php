@extends('admin.header.head')

@section('content')
 
<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Pin Generate</h3>
                        <ol class="breadcrumb breadcrumb-simple"> 
                            <li class="active">Pin Generate</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card ">
            
            <div class="card-block">
                <h3 class="with-border m-t-0">Admission Pin</h3>
               
                <div class="row">
                    <form  method="POST" action="pingen" class="col-md-9">
                                   
                            @if($errors->any())
                            <div class="alert alert-danger alert-fill alert-close alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                               @foreach ($errors->all() as $error)
                                {{ ucwords($error) }} <br>
                                   
                              @endforeach
                                </div>
                            @endif <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="payment-details">
                                    <strong>Payment Details</strong>
                                <table>
                                        <tbody>
                                      <tr>
                                            <td>Names:</td>
                                            <td>{{ ucwords(@$name)}}</td>
                                        </tr>
                                        <tr>
                                                <td>Session ID:</td>
                                                <td>{{ ucwords(@$sessionp)}}</td>
                                            </tr>
                                         
                                            <td>Amount :</td>
                                            <td>{{ @$amountp}}</td>
                                        </tr>
                                         <?php echo @$pins ?>
                                       
                                    </tbody>
                                </table>
                                <br><br>
                                </div>
                            

                            <div class="form-group">
                                    <label class="form-label" for="example">Pin</label> 
 {!! Form::select('pin', array('' => 'Select An Option', '0' => 'Registration','1' => 'Application','2' => 'Off Registration Pin'), @$pin, ['id' => 'pin', 'class'=>'select2']); !!}
                             </div>

                                <div class="form-group">
                                <label class="form-label" for="example">Application ID</label>
                                <input type="text" class="form-control" value="{{ @$check }}" name="appid" id="example">
                                </div>
                                    
                                <div class="form-group">
                                        <label class="form-label" for="session">Session ID</label>
                                        <input type="text" class="form-control" value="{{ @$session }}" name="session" id="session">
                                </div>         
                                    
                                
                                <div class="form-group">
                                        <label class="form-label" for="amount">Amount Paid</label>
                                        <input type="text" class="form-control" value="{{ @$amount }}" name="amount" id="amount">
                                </div>
 <div class="form-group">
                    <button name="addpin" value="addpin" class="btn btn-inline btn-danger ladda-button" data-style="expand-right"><span class="ladda-label">Generate Application Pins</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 117px;"></div></button>
                </div>
                            
                         </form>
                     
                            </div>
                            
                    </div> 
                    
                    
                    
                      
     
            </div>
        </section>




    </div><!--.container-fluid-->
</div><!--.page-content-->

 
@endsection       