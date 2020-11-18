<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset ('public/images/bsp_logo.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login -{{strtoupper(App\setting::where('description','name')->value('value'))}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{  asset('public/adssets/js/require.min.js')}}"></script>
    <script>
            requirejs.config({
                baseUrl: '../'
            });
          </script>
    <!-- Dashboard Core -->
    <link href="{{ asset('public/adssets/css/dashboard.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/adssets/js/dashboard.js') }}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('public/adssets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/adssets/plugins/charts-c3/plugin.js') }}"></script>
    <!-- Google Maps Plugin --> 
    <!-- Input Mask Plugin -->
    <script src=" {{ asset('public/adssets/plugins/input-mask/plugin.js') }}"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
                <div class="text-center col-md-12  ">
                        <h1 class=" mb-0  text-primary text-center">{{strtoupper(App\setting::where('description','name')->value('value'))}} </h1>
                        <h4 class="text-primary mb-0 text-center">ADMIN LOGIN </h4>
                     </div>
            <div class="col col-login mx-auto">
                
                    <div class="text-center  ">
                <img src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" class="h-9" alt="">
              </div>
              <form class="card" action="{{ url('/admin/login') }}" method="post">
                
                <div class="card-body p-6">
                     
                  <div class="card-title text-center text-danger ">Only For Authorize Users </div>
                  @if($errors->any())
                  <div class="alert alert-danger text-center">
                     @foreach ($errors->all() as $error)
                     <div class="info">{{ $error }}</div>
                         
                    @endforeach
                      </div>
                  @endif
                  <div class="form-group">
                    <label class="form-label" for='email'>Email address</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="email" class="form-control" id="email" value='{{ old("email")}}' name='email' aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                        <label class="form-label">
                                Password
                                      </label>
                    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>