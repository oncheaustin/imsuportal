@extends('admin.header.head')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>ARS</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <section class="card ">

            <div class="card-block">
                <h3 class="with-border m-t-0"> ARS</h3>

                <div class="row">
                    <form  method="POST" action="" class="col-md-9">

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





                    <div class="form-group">
                    <label class="form-label" for="example">CCU</label>
                    <input type="text" class="form-control" value="{{ @$check }}" name="appid" id="example">
                    </div>

                    <div class="form-group">
                            <label class="form-label" for="session">CGP</label>
                            <input type="text" class="form-control" value="{{ @$session }}" name="session" id="session">
                    </div>


                    <div class="form-group">
                            <label class="form-label" for="amount">CGPA</label>
                            <input type="text" class="form-control" value="{{ @$amount }}" name="amount" id="amount">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="amount">REMARK</label>
                        <input type="text" class="form-control" value="{{ @$amount }}" name="amount" id="amount">
                </div>

 <div class="form-group">
                    <button name="addpin" value="addpin" class="btn btn-inline btn-success  " ><span class="ladda-label">
                        Submit</span>
            </button>
                </div>

                         </form>

                            </div>

                    </div>





            </div>
        </section>




    </div><!--.container-fluid-->
</div><!--.page-content-->

<script type="text/javascript">
    </script>
@endsection
