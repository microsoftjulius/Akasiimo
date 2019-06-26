<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themefisher.com/themefisher/focus//index by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 21:29:28 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Akasiimo</title>
        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
        <!-- Styles -->
        <link href="{{asset('bootstrap/assets/css/lib/calendar2/semantic.ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/themify-icons.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('bootstrap/assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
        <link href="{{asset('bootstrap/assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('bootstrap/assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/lib/helper.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/assets/graphsCss/css/mdb.min.css')}}" rel="stylesheet">
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" style="background-color: black">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo" style="background-color:black">
                        <img class="img-responsive" src="{{asset('bootstrap/assets/images/logo.png')}}" alt="" style="max-width:50%; max-height:50%"/>
                    </div>
                    <ul>
                        <li class="active"  style="color: red"><a href="/index"><i class="ti-home" style="color: red"></i>Dashboard</a></li>
                        <li><a href="/view-beneficiary"><i class="ti-layout-grid4-alt"></i>Beneficiaries</a></li>
                        <li><a href="/beneficiaries"><i class="fa fa-plus"></i> Add Beneficiary </a></li>
                        <li><a href="/user-create"><i class="fa fa-users"></i> Users </a></li>
                        <li>
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-lock"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                          <div class="float-right">
                            <ul>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">Recent Notifications</span>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/3.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. {{auth()->user()->name}}</div>
                                                    <div class="notification-text">5 members joined today </div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/3.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mariam</div>
                                                    <div class="notification-text">likes a photo of you</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/3.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Tasnim</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/3.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. {{auth()->user()->name}}</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">2 New Messages</span>
                                            <a href="email.html'"><i class="ti-pencil-alt pull-right"></i></a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/1.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/2.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. {{auth()->user()->name}}</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/3.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('bootstrap/assets/images/avatar/2.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. {{auth()->user()->name}}</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-icon dib"><span class="user-avatar">{{auth()->user()->name}} <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <!--<div class="dropdown-content-heading">
                                            <span class="text-left">Upgrade Now</span>
                                            <p class="trial-day">30 Days Trail</p>
                                        </div>-->
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <!-- <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li> -->
                                                <li>
                                                    <a class="" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-lock"></i>{{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Hello, <span>{{auth()->user()->name}}</span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4 p-l-0 title-margin-left">
                            <div class="page-header">
                                <div class="page-title">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-star color-success border-success"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Beneficiaries</div>
                                            <div class="stat-digit">{{number_format(auth()->user()->count_number_of_beneficiaries())}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="fa fa-money color-pink border-pink"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Paid Beneficiaries</div>
                                            <div class="stat-digit">{{number_format(auth()->user()->count_number_of_paid_beneficiaries())}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="fa fa-cog color-danger border-danger"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Pending Beneficiaries</div>
                                            <div class="stat-digit">{{number_format(auth()->user()->count_number_of_Not_paid_beneficiaries())}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Expected Budget</div>
                                            <div class="stat-digit">{{number_format(auth()->user()->calculate_total_amount_of_money())}} Shs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Paid Amount</div>
                                            <div class="stat-digit">{{number_format(auth()->user()->calculate_total_amount_of_money_paid())}} Shs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Pending Amount</div>
                                            <div class="stat-digit">{{number_format(auth()->user()->calculate_total_amount_of_money_pending())}} Shs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-title">
                                    </div>
                                    <div class="card-body">
                                    <canvas id="myChart" style="max-width:100%" ></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-title"></div>
                                    <div class="card-body">
                                        <canvas id="pieChart" height="340"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="bootstrap-data-table-panel">
                                        <div class="table-responsive">
                                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>District</th>
                                                        <th>Total Amount Of Money</th>
                                                        <th>Total Number Of People</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>

                                                    @foreach(auth()->user()->get_districts_and_amount() as $districts)
                                                    <tr>
                                                            <td>{{$districts->district}}</td>
                                                            <td>{{number_format($districts->Amount)}}</td>
                                                            <td>{{number_format($districts->Number)}}</td>
                                                    </tr>
                                                    @endforeach()
                                                    </tbody>
                                            </table>
                                            {{auth()->user()->get_districts_and_amount()->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                            </div>

                            <!-- /# column -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer">
                                    <p>2018 © Admin Board. - <a href="#">pahappa.com</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- jquery vendor -->
        <script src="{{asset('bootstrap/assets/js/lib/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
        <!-- nano scroller -->
        <script src="{{asset('bootstrap/assets/js/lib/menubar/sidebar.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/preloader/pace.min.js')}}"></script>
        <!-- sidebar -->

        <!-- bootstrap -->

        <script src="{{asset('bootstrap/assets/js/lib/calendar-2/moment.latest.min.js')}}"></script>
        <!-- scripit init-->
        <script src="{{asset('bootstrap/assets/js/lib/calendar-2/semantic.ui.min.js')}}"></script>
        <!-- scripit init-->
        <script src="{{asset('bootstrap/assets/js/lib/calendar-2/prism.min.js')}}"></script>
        <!-- scripit init-->
        <script src="{{asset('bootstrap/assets/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
        <!-- scripit init-->
        <script src="{{asset('bootstrap/assets/js/lib/calendar-2/pignose.init.js')}}"></script>
        <!-- scripit init-->


        <script src="{{asset('bootstrap/assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/weather/weather-init.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/chartist/chartist.min.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/chartist/chartist-init.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/sparklinechart/sparkline.init.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
        <script src="{{asset('bootstrap/assets/js/scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('bootstrap/assets/graphsCss/js/mdb.min.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [ {!! $my_schedules !!} ],
      datasets: [{
        label: 'A graph Showing Amount in Billions(\'000,000,000) Vs Schedules',
        data: [ {!! $my_amounts !!} ],
        backgroundColor: [
        'rgb(255, 0, 0)','rgb(255,255,0)','rgba(0,0,0)','red','yellow','black',
        'red','yellow','black','red','yellow','black','red','yellow','black',
        'red','yellow','black','red','yellow','black','red','yellow','black',
        'red','yellow','black','red','yellow','black','red','yellow','black','red','yellow','black'
        ],
        borderColor: [
        'rgb(255,0,0)','rgb(255,255,0)','rgba(0,0,0)','red','yellow','black',
        'red','yellow','black','red','yellow','black','red','yellow','black',
        'red','yellow','black','red','yellow','black','red','yellow','black',
        'red','yellow','black','red','yellow','black','red','yellow','black','red','yellow','black'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

</script>
<script>
  //pie
  var ctxP = document.getElementById("pieChart").getContext('2d');
  var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
      labels: ["Paid in Percentage", "Pending in Percentage"],
      datasets: [{
        data: [{!! auth()->user()->count_paid_in_percentage() !!}, {!! auth()->user()->count_pending_in_percentage() !!}],
        backgroundColor: ["Yellow", "Red"],
        hoverBackgroundColor: ["yellow", "red"]
      }]
    },
    options: {
      responsive: true
    }
  });

</script>
        <!-- scripit init-->
    </body>


<!-- Mirrored from demo.themefisher.com/themefisher/focus//index by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 21:29:39 GMT -->
</html>
