<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{strtoupper(App\setting::where('description','name')->value('value'))}}</title>

	<link href="public/assetss/cssimg/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="public/assetss/cssimg/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="public/assetss/cssimg/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="public/assetss/cssimg/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="public/assetss/cssimg/favicon.png" rel="icon" type="image/png">
	<link href="public/assetss/cssimg/favicon.ico" rel="shortcut icon">
	<link rel="icon" href="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" type="image/x-icon"/>

	<!-- HTML5 shim and Respond. js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->
	<link rel="stylesheet" href="{{ asset('public/assetss/css/separate/vendor/tags_editor.min.css') }}">
<link rel="stylesheet" href="{{ asset ('public/assetss/css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset ('public/assetss/css/separate/vendor/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assetss/css/lib/lobipanel/lobipanel.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assetss/css/separate/vendor/lobipanel.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assetss/css/lib/jqueryui/jquery-ui.min.css') }}">

<link rel="stylesheet" href="{{ asset('public/assetss/css/lib/datatables-net/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assetss/css/separate/vendor/datatables-net.min.css') }}">

<link rel="stylesheet" href="{{asset ('public/assetss/css/lib/ladda-button/ladda-themeless.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/assetss/css/separate/pages/widgets.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/assetss/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset ('public/assetss/css/lib/bootstrap/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{asset ('public/assetss/css/main.css') }}">

	<link href="{{asset ('public/assets/css/lib/charts-c3js/c3.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="with-side-menu control-panel control-panel-compact">

	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" alt="">
	            <img class="hidden-lg-down" src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','logo')->value('value')}}" alt="">
	        </a>
	
	        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
	            <span>toggle menu</span>
	        </button>
	
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown dropdown-notification notif">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-notification"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
	                            <div class="dropdown-menu-notif-header">
	                                Notifications
	                                <span class="label label-pill label-danger">4</span>
	                            </div>
	                            <div class="dropdown-menu-notif-list">
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="public/assetss/cssimg/photo-64-1.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Morgan</a> was bothering about something
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="public/assetss/cssimg/photo-64-2.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Lioneli</a> had commented on this <a href="#">Super Important Thing</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="public/assetss/cssimg/photo-64-3.jpg" alt="">
	                                    </div>
	                                    <div class="dot"></div>
	                                    <a href="#">Xavier</a> had commented on the <a href="#">Movie title</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="photo">
	                                        <img src="public/assetss/cssimg/photo-64-4.jpg" alt="">
	                                    </div>
	                                    <a href="#">Lionely</a> wants to go to <a href="#">Cinema</a> with you to see <a href="#">This Movie</a>
	                                    <div class="color-blue-grey-lighter">7 hours ago</div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-notification messages">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-messages"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-mail"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-messages" aria-labelledby="dd-messages">
	                            <div class="dropdown-menu-messages-header">
	                                <ul class="nav" role="tablist">
	                                    <li class="nav-item">
	                                        <a class="nav-link active"
	                                           data-toggle="tab"
	                                           href="#tab-incoming"
	                                           role="tab">
	                                            Inbox
	                                            <span class="label label-pill label-danger">8</span>
	                                        </a>
	                                    </li>
	                                    <li class="nav-item">
	                                        <a class="nav-link"
	                                           data-toggle="tab"
	                                           href="#tab-outgoing"
	                                           role="tab">Outbox</a>
	                                    </li>
	                                </ul>
	                                <!--<button type="button" class="create">
	                                    <i class="font-icon font-icon-pen-square"></i>
	                                </button>-->
	                            </div>
	                            <div class="tab-content">
	                                <div class="tab-pane active" id="tab-incoming" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something...</span>
	                                        </a>
	                                    </div>
	                                </div>
	                                <div class="tab-pane" id="tab-outgoing" role="tabpanel">
	                                    <div class="dropdown-menu-messages-list">
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burton</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something...</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something! Morgan was bothering about something.</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/avatar-2-64.png" alt=""></span>
	                                            <span class="mess-item-name">Christian Burtons</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                        <a href="#" class="mess-item">
	                                            <span class="avatar-preview avatar-preview-32"><img src="public/assetss/cssimg/photo-64-2.jpg" alt=""></span>
	                                            <span class="mess-item-name">Tim Collins</span>
	                                            <span class="mess-item-txt">Morgan was bothering about something!</span>
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown dropdown-lang">
	                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="flag-icon flag-icon-us"></span>
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <div class="dropdown-menu-col">
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ru"></span>Ð ÑƒÑ?Ñ?ÐºÐ¸Ð¹</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-de"></span>Deutsch</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-it"></span>Italiano</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-es"></span>EspaÃ±ol</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-pl"></span>Polski</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-li"></span>Lietuviu</a>
	                            </div>
	                            <div class="dropdown-menu-col">
	                                <a class="dropdown-item current" href="#"><span class="flag-icon flag-icon-us"></span>English</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-fr"></span>FranÃ§ais</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-by"></span>Ð‘ÐµÐ»Ð°Ñ€ÑƒÑ?Ðºi</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ua"></span>Ð£ÐºÑ€Ð°Ñ—Ð½Ñ?ÑŒÐºÐ°</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-cz"></span>ÄŒesky</a>
	                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-ch"></span>ä¸­åœ‹</a>
	                            </div>
	                        </div>
	                    </div>
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="public/assetss/cssimg/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                       
                          <div class="help-dropdown text-success" >         
                      <h3>  {{strtoupper(App\setting::where('description','name')->value('value'))}}</h3>
                          </div>
	                      
	                        <div class="site-header-search-container">
	                            <form class="site-header-search closed">
	                                <input type="text" placeholder="Search"/>
	                                <button type="submit">
	                                    <span class="font-icon-search"></span>
	                                </button>
	                                <div class="overlay"></div>
	                            </form>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
	        
	       
	       
	         <li class="gold">
	            <a href="{{ URL::to('admin/dashboard') }}">
	                <i class="font-icon font-icon-speed"></i>
	                <span class="lbl">Dashboard</span>
	            </a>
	        </li> 
		   
			<li class=" purple  with-sub  ">
					<span>
						<span class="fa fa-home"></span>
						<span class="lbl">Setup</span>
					</span>
					<ul>
							<li class="with-sub"> <span class="lbl">School</span> 
								<ul>
										<li><a href="{{ URL::to('admin/addsch') }}"><span class="lbl">Add New</span></a></li>
								 
								</ul>
							</li>
							<li class="with-sub"> <span class="lbl">Department</span> 
								<ul>
										<li><a href="{{ URL::to('admin/adddep') }}"><span class="lbl">Add New</span></a></li>
										 
								</ul>
							</li>
							<li class="with-sub"> <span class="lbl">Course</span> 
								<ul>
										<li><a href="{{ URL::to('admin/addcourse') }}"><span class="lbl">Add New</span></a></li>
								 
								</ul>
							</li>
							<li><a href="{{ URL::to('admin/setting') }}"><span class="lbl">Setting</span></a></li>
							<li><a href="{{ URL::to('admin/fee') }}"><span class="lbl">Define Fees</span></a></li>
							 
							
					</ul>
	        </li>

	        
			 

	        <li class=" blue  with-sub opened">
	            <span>
	                <span class="fa fa-book"></span>
	                <span class="lbl"> Post- UTME/Direct</span>
	            </span>
	            <ul>
					 
	                <li><a href="{{ URL::to('admin/utmeregister') }}"><span class="lbl">Application</span></a></li>
					<li><a href="{{ URL::to('admin/payments') }}"><span class="lbl"></span>Payments</a></li>					
	                <li><a href="{{ URL::to('admin/utmeacc') }}"><span class="lbl"></span>Accounts</a></li>
					
	                
	            </ul>
	        </li>
	    </ul>
	
	    
	</nav><!--.side-menu-->
  @yield('content')
	 <!--.page-content-->
 

	<script src="{{ asset('public/assetss/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('public/assetss/js/lib/popper/popper.min.js') }}"></script>
	<script src="{{asset ('public/assetss/js/lib/tether/tether.min.js') }}"></script>
	<script src="{{asset ('public/assetss/js/lib/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{asset ('public/assetss/js/plugins.js') }}"></script>

	<script type="text/javascript" src="{{ asset ('public/assetss/js/lib/jqueryui/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/assetss/js/lib/lobipanel/lobipanel.min.js') }}"></script>
	<script type="text/javascript" src="{{asset ('public/assetss/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	<script src="{{ asset('public/assetss/js/lib/jquery-tag-editor/jquery.caret.min.js') }}"></script>
	<script src="{{ asset('public/assetss/js/lib/jquery-tag-editor/jquery.tag-editor.min.js') }}"></script>
	<script src="{{asset ('public/assetss/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('public/assetss/js/lib/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('public/assetss/js/lib/ladda-button/spin.min.js') }}"></script>
	<script src="{{ asset('public/assetss/js/lib/ladda-button/ladda.min.js') }}"></script>
	<script src="{{ asset ('public/assetss/js/lib/ladda-button/ladda-button-init.js') }}"></script>

		
	<script src="{{ asset ('public/assetss/js/lib/datatables-net/datatables.min.js') }}"></script>
	<script src="{{ asset ('public/assets/js/lib/d3/d3.min.js') }}"></script>
	<script src="{{ asset ('public/assets/js/lib/charts-c3js/c3.min.js') }}"></script>
	<script src="{{ asset ('public/assets/js/lib/charts-c3js/c3js-init.js') }}"></script>
	<script>

 
    $(function() {
        $('#tags-editor-textarea').tagEditor();
    });
	
  
	$(function() {
		$('#example').DataTable({
			responsive: true
		});
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
	window.Apex = {
  dataLabels: {
    enabled: false
  }
};


//
	var options = {
  chart: {
    type: 'bar'
  },
  series: [
    {
      name: 'sales',
      data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
    }
  ],
  xaxis: {
    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
  }
}

var chart = new ApexCharts(document.querySelector('#chart'), options)
//chart.render()


//new 
	var optionsBar = {
	chart: {
		type: 'bar',
		height: 250,
		width: '100%',
		stacked: true,
		foreColor: '#999',
	},
	plotOptions: {
		bar: {
		dataLabels: {
			enabled: false
		},
		columnWidth: '50%',
		endingShape: 'rounded'
		}
	},
	colors: ["#00C5A4", '#F3F2FC'],
	series: [{
		name: "Applications",
		data: [20, 16, 24, 28, 26, 22, 15, 5, 14, 16, 22, 29, 24, 19, 15, 10, 11, 15, 19, 23],
	}, {
		name: "Registrations",
		data: [20, 16, 24, 28, 26, 22, 15, 5, 14, 16, 22, 29, 24, 19, 15, 10, 11, 15, 19, 23],
	}],
	labels:   ["1st Sept 2020", "2nd Sept 2020", "3rd Sept 2020", "4th Sept 2020", "5th Sept 2020", "6th Sept 2020", "7th Sept 2020", "8th Sept 2020", "9th Sept 2020", "10th Sept 2020", "11th Sept 2020", "12th Sept 2020", "13th Sept 2020", "14th Sept 2020", "15th Sept 2020", "16th Sept 2020", "17th Sept 2020",  "18th Sept 2020",  "19th Sept 2020", "20th Sept 2020"],
	xaxis: {
		axisBorder: {
		show: false
		},
		axisTicks: {
		show: false
		},
		crosshairs: {
		show: false
		},
		labels: {
		show: false,
		style: {
			fontSize: '14px'
		}
		},
	},
	grid: {
		xaxis: {
		lines: {
			show: false
		},
		},
		yaxis: {
		lines: {
			show: false
		},
		}
	},
	yaxis: {
		axisBorder: {
		show: false
		},
		labels: {
		show: false
		},
	},
	legend: {
		floating: true,
		position: 'top',
		horizontalAlign: 'right',
		offsetY: -36
	},
	title: {
		text: 'Analytics',
		align: 'left',
	},
	subtitle: {
		text: 'Applications and Registrations'
	},
	tooltip: {
		shared: true
	}

	}

var chartBar = new ApexCharts(document.querySelector('#bar'), optionsBar);
chartBar.render();



var optionsArea = {
  chart: {
    height: 421,
    type: 'area',
    background: '#fff',
    stacked: true,
    offsetY: 39,
    zoom: {
      enabled: false
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: false
      }
    }
  },
  stroke: {
    curve: 'straight'
  },
  colors: ["#3F51B5", '#2196F3'],
  series: [{
      name: "Adwords Views",
      data: [15, 26, 20, 33, 27, 43, 17, 26, 19]
    },
    {
      name: "Adwords Clicks",
      data: [33, 21, 42, 19, 32, 25, 36, 29, 49]
    }
  ],
  fill: {
    type: 'gradient',
    gradient: {
      inverseColors: false,
      shade: 'light',
      type: "vertical",
      opacityFrom: 0.9,
      opacityTo: 0.6,
      stops: [0, 100, 100, 100]
    }
  },
  title: {
    text: 'Visitor Insights',
    align: 'left',
    offsetY: -5,
    offsetX: 20
  },
  subtitle: {
    text: 'Adwords Statistics',
    offsetY: 30,
    offsetX: 20
  },
  markers: {
    size: 0,
    style: 'hollow',
    strokeWidth: 8,
    strokeColor: "#fff",
    strokeOpacity: 0.25,
  },
  grid: {
    show: false,
    padding: {
      left: 0,
      right: 0
    }
  },
  yaxis: {
    show: false
  },
  labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002', '01/21/2002', '01/22/2002', '01/23/2002'],
  xaxis: {
    type: 'datetime',
    tooltip: {
      enabled: false
    }
  },
  legend: {
    offsetY: -10,
    position: 'top',
    horizontalAlign: 'right'
  }
}

var chartArea = new ApexCharts(document.querySelector('#area-adwords'), optionsArea);
chartArea.render();


var optionsCircle4 = {
  chart: {
    type: 'radialBar',
    height: 280,
    width: 465,
  },
  plotOptions: {
    radialBar: {
	  offsetX: -105,
	  offsetY: -20,
      size: undefined,
      inverseOrder: true,
      hollow: {
        margin: 5,
        size: '28%',
        background: 'transparent',

      },
      track: {
        show: false,
      },
      startAngle: -180,
      endAngle: 180

    },
  },
  stroke: {
    lineCap: 'round'
  },
  <?php
  $results = DB::select("SELECT DISTINCT t2.course_name, 
  (SELECT COUNT(*) FROM choice WHERE t2.id = course) as total
  FROM choice t1
  LEFT JOIN courses t2
  ON t1.course = t2.id LIMIT 3");
  $depts = array();
  $dep_regs = array();
  $totals = 0;
  foreach ($results as $result) {
	  array_push($depts, $result->course_name);
	  array_push($dep_regs, $result->total);
	  $totals  += $result->total;
  }
  $i = 0;
  foreach ($dep_regs as $regs) {
	$dep_regs[$i] = number_format(($regs/$totals * 100), 2);
	$i++;
   } ?>
  series: <?php echo json_encode($dep_regs); ?>,
  labels: <?php echo json_encode($depts); ?>,
  legend: {
    show: true,
    floating: true,
    position: 'right',
    offsetX: 55,
    offsetY: 150
  },
  title: {
    text: 'Top Courses'
  }
}

var chartCircle4 = new ApexCharts(document.querySelector('#radialBarBottom'), optionsCircle4);
chartCircle4.render();

		function load_options(id, index,name,rem) {
	  
	   var course='{{ old('course') }}';
	   var duration='{{ old('duration') }}';
		$.ajax({
			url: "study/" + name + "/" + id + "/" + rem,
			complete: function () { 
			},
			success: function (data) {  
				 $("#"+index ).html(data); 
			}
	  
		}) 
	  
	  } 

	  function  not (title, body){
		$(".modal-body" ).html(title.id); 
		$(".bd-example-modal-sm").modal();

		 
		
		
	  } 
	
	  
	</script>
<script>
		function load_options(id, index,name,rem) {
	  
	   var course='{{ old('course') }}';
	   var duration='{{ old('duration') }}';
		$.ajax({
			url: "study/" + name + "/" + id + "/" + rem,
			complete: function () { 
			},
			success: function (data) {  
				 $("#"+index ).html(data); 
			}
	  
		}) 
	  
	  } 

	  function  not (title, body){
		$(".modal-body" ).html(title.id); 
		$(".bd-example-modal-sm").modal();

		 
		
		
	  } 
	  @if(old('department2')!="")load_options({{ old('department2') }},"course2","course1","{{ old('course2') }}");
	  
	  @endif


	  @if(old('department')!="")load_options({{ old('department') }},"course","course1","{{ old('course') }}");
	  
	   @endif
	  @if(old('course')!="")load_options({{ old('course') }},"duration","duration","{{ old('duration') }}"); @endif

	</script>
<script src="{{ asset ('public/assetss/js/app.js') }}"></script>  
<!-- Modal -->
<div class="modal fade bd-example-modal-sm"
					 tabindex="-1"
					 role="dialog"
					 aria-labelledby="mySmallModalLabel"
					 aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
									<i class="font-icon-close-2"></i>
								</button>
								<h4 class="modal-title" id="myModalLabel">Modal title</h4>
							</div>
							<div class="modal-body">
								...
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
						 	</div>
						</div>
					</div>
				</div>
</body>
</html>