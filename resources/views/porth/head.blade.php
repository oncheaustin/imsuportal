<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
           <title>{{strtoupper(App\setting::where('description','name')->value('value'))}}</title>

        <!-- Bootstrap -->
        <link href="public/assets/css/bootstrap.min.log.css" rel="stylesheet">
        
        <!-- Styling -->
        <link href="public/assets/css/overrides.css" rel="stylesheet">
        <link href="public/assets/css/styles.css" rel="stylesheet">
        <link href="public/assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-1.8b2.min.js" type="text/javascript">  </script>
 
        <!-- Custom Styling -->
        <link rel="stylesheet" href="public/assets/css/custom.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" />





    </head>


    <body>



        <section id="header">
            <div class="container">
                <img src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" class="hd" alt="{{strtoupper(App\setting::where('description','name')->value('value'))}}">

                <!-- Top Bar -->
                <div id="top-nav" style="float: left;">
                    <div class="pull-right nav">
                        <div class="header-lined">
                            <p></p>
                            <h1>{{strtoupper(App\setting::where('description','name')->value('value'))}}</h1>
                            <h1>Portal</h1>
                        </div>

                    </div>
                </div>



            </div>
        </section>

      <section id="main-menu">

        <nav id="nav" class="navbar navbar-success navbar-main" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">

                     

                    </ul>

                 

                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>

    </section>

 @yield('content')