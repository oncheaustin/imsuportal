@extends('admin.header.head')

@section('content')
<link rel="stylesheet" href="{{ asset('public/assets/css/imspro.css') }}">
<style>
	.page-content { padding-top:80px}

body {
  background: #F3F4FA;
  color: #777;
  font-family: Montserrat, Arial, sans-serif;
}

.body-bg {
  background: #F3F4FA !important;
}

h1, h2, h3, h4, h5, h6, strong {
  font-weight: 600;
}

body {
  /*background: linear-gradient(45deg,#3a3a60,#5f5f8e);
  min-height: 100vh;*/
}

#area-adwords {
  min-height: 421px !important;
  margin-right: -20px;
}

.content-area {
  max-width: 1280px;
  margin: 0 auto;
}

.box {
  background-color: #fff;
  padding: 25px 20px;

}

.shadow {
  box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08);
}
.sparkboxes .box {
  padding-top: 30px;
  padding-bottom: 30px;
  text-shadow: 0 1px 1px 1px #666;
  box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08);
  position: relative;
}


.sparkboxes strong {
  position: relative;
  z-index: 3;
  top: -8px;
  color: #fff;
}


.sparkboxes .box1 {
  border-bottom: 3px solid #734CEA
}

.sparkboxes .box2 {
  border-bottom: 3px solid #34bfa3
}

.sparkboxes .box3 {
  border-bottom: 3px solid #f4516c;
}

.sparkboxes .box4 {
  border-bottom: 3px solid #00c5dc;
}

/* fusionexport btn CSS START */
#fusionexport-btn {
  min-width: 169px;
  min-height: 38px;
  text-align: center;
}

#fusionexport-btn .span {
  display: inline-block;
}

#fusionexport-btn[disabled] {
  cursor: wait;
}


.spinner-border {
  display: none;
}

#fusionexport-btn[disabled] .spinner-border {
  display: inline-block;
}

#fusionexport-btn[disabled] .btn-text {
  display: none;
}
/* fusionexport btn CSS START */

</style>
<div class="page-content">
	    <div class="container-fluid">
		<div class="col-span-12 mt-0">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Statistics
                                </h2>
                                <a href="" class="ml-auto flex text-theme-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw w-4 h-4 mr-3"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg> Reload Data </a>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-4">
                                            <div class="flex">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card report-box__icon text-theme-10"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer tooltipstered"> 33% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg> </div>
                                                </div>
                                            </div>
                                            <div class="text-2xl font-bold leading-8 mt-6"><?php echo App\app::all()->count(); ?></div>
                                            <div class="text-base text-gray-600 mt-1">Applications</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-4">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card report-box__icon text-theme-11"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> 
                                                <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer tooltipstered"> 2% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4"><polyline points="6 9 12 15 18 9"></polyline></svg> </div>
                                                </div>
                                            </div>
                                            <div class="text-2xl font-bold leading-8 mt-6">&#8358; <?php echo number_format(App\payments::where('status', 1)->sum('amount'), 2); ?></div>
                                            <div class="text-base text-gray-600 mt-1">Revenue</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-4">
                                            <div class="flex">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather report-box__icon text-theme-12"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer tooltipstered"> 12% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg> </div>
                                                </div>
                                            </div>
                                            <div class="text-2xl font-bold leading-8 mt-6"><?php echo DB::table('setup')->select('session')->where('state', '=', 1)->first()->session; ?></div>
                                            <div class="text-base text-gray-600 mt-1">Current Session</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-4">
                                            <div class="flex">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check report-box__icon text-theme-9"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                                <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer tooltipstered"> 22% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4"><polyline points="18 15 12 9 6 15"></polyline></svg> </div>
                                                </div>
                                            </div>
                                            <div class="text-2xl font-bold leading-8 mt-6">0</div>
                                            <div class="text-base text-gray-600 mt-1">Admitted</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
			<div class="row sparkboxes mt-5 mb-4">
              <!--div class="col-md-4">
                <div class="box box1">
                  <div id="spark1"></div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box box2">
                  <div id="spark2"></div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="box box3">
                  <div id="spark3"></div>
                </div>
              </div-->
			</div>
			<div class="row mt-3">
              <div class="col-md-7">
                <div class="box shadow p-4">
                  <div id="bar"></div>
                </div>
			  </div>
			  <div class="col-md-5">
                <div class="box shadow mt-0">
                  <div id="radialBarBottom"></div>
                </div>
              </div>
              <div class="col-md-12 mt-5">
                <div class="box shadow p-5">
                  <div id="area-adwords"></div>
                </div>
              </div>
            </div>
			
			
	        
		
			
			<div class="mx-5" id="chart"></div>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	<script>
		$(document).ready(function(){
			
		})
	</script>

@endsection       