<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.themefisher.com/themefisher/focus//beneficiaries by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 21:30:44 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Akasiimo </title>

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
    <link href="{{asset('bootstrap/assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/assets/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/assets/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" style="background-color: black">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo" style="background-color:black">
                    <a href="">
                        <img class="img-responsive" src="{{asset('bootstrap/assets/images/logo.png')}}" alt="" style="max-width:50%; max-height:50%"/>
                    </a></div>
                    <ul>
                        <li><a href="/index"><i class="ti-home"></i>Dashboard</a></li>
                        <li><a href="/view-beneficiary"><i class="ti-layout-grid4-alt"></i>Beneficiaries</a></li>
                        <li class="active"  style="color: red"><a href="/beneficiaries"><i class="fa fa-plus" style="color: red"></i> Add Beneficiary </a></li>
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
                        <!--<li><a href="/beneficiaries-status"><i class="fa fa-battery-three-quarters"></i> Beneficiaries Status </a></li> -->
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
                                    <li class="breadcrumb-item active">Add Beneficiary</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Add New Beneficiaries</h4>

                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                    <form action="/create-beneficiary" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">National Identity Number </p>
                                                <input type="text" class="form-control input-default " placeholder="NIN" name="national_id_number">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Surname</p>
                                                <input type="text" class="form-control input-default " placeholder="Surname" name="surname" required/>
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Other Names</p>
                                                <input type="text" class="form-control input-default " placeholder="Other Names" name="other_names" required/>
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Date of birth</p>
                                                <input type="number" class="form-control input-default " placeholder="Age" name="age" required/>
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">District</p>
                                                <select id = "search_by_district"  class="form-control input-default " placeholder="district" name="district" required>
                                                <option></option>
                                                <option>ABIM</option>
                                                <option>ADJUMANI</option>
                                                <option>AGAGO</option>
                                                <option>ALEBTONG</option>
                                                <option>AMOLATAR</option>
                                                <option>AMUDAT</option>
                                                <option>AMURIA</option>
                                                <option>AMURU</option>
                                                <option>APAC</option>
                                                <option>ARUA</option>
                                                <option>BUDAKA</option>
                                                <option>BUDUDA</option>
                                                <option>BUGIRI</option>
                                                <option>BUHWEJU</option>
                                                <option>BUIKWE</option>
                                                <option>BUKEDEA</option>
                                                <option>BUKOMANSIMBI</option>
                                                <option>BUKWO</option>
                                                <option>BULAMBULI</option>
                                                <option>BULIISA</option>
                                                <option>BUNDIBUGYO</option>
                                                <option>BUSHENYI</option>
                                                <option>BUSIA</option>
                                                <option>BUTALEJA</option>
                                                <option>BUTAMBALA</option>
                                                <option>BUVUMA</option>
                                                <option>BUYENDE</option>
                                                <option>DOKOLO</option>
                                                <option>GOMBA</option>
                                                <option>GULU</option>
                                                <option>HOIMA</option>
                                                <option>IBANDA</option>
                                                <option>IGANGA</option>
                                                <option>ISINGIRO</option>
                                                <option>JINJA</option>
                                                <option>KAABONG</option>
                                                <option>KABALE</option>
                                                <option>KABAROLE</option>
                                                <option>KABERAMAIDO</option>
                                                <option>KALANGALA</option>
                                                <option>KALIRO</option>
                                                <option>KALUNGU</option>
                                                <option>KAMPALA</option>
                                                <option>KAMULI</option>
                                                <option>KAMWENGE</option>
                                                <option>KANUNGU</option>
                                                <option>KAPCHORWA</option>
                                                <option>KASESE</option>
                                                <option>KATAKWI</option>
                                                <option>KAYUNGA</option>
                                                <option>KIBAALE</option>
                                                <option>KIBOGA</option>
                                                <option>KIBUKU</option>
                                                <option>KIRUHURA</option>
                                                <option>KIRYANDONGO</option>
                                                <option>KISORO</option>
                                                <option>KITGUM</option>
                                                <option>KOBOKO</option>
                                                <option>KOLE</option>
                                                <option>KOTIDO</option>
                                                <option>KUMI</option>
                                                <option>KWEEN</option>
                                                <option>KYAKWANZI</option>
                                                <option>KYEGEGWA</option>
                                                <option>KYENJOJO</option>
                                                <option>LAMWO</option>
                                                <option>LIRA</option>
                                                <option>LUUKA</option>
                                                <option>LUWERO</option>
                                                <option>LWENGO</option>
                                                <option>LYANTONDE</option>
                                                <option>MANAFWA</option>
                                                <option>MARACHA</option>
                                                <option>MASAKA</option>
                                                <option>MASINDI</option>
                                                <option>MAYUGE</option>
                                                <option>MBALE</option>
                                                <option>MBARARA</option>
                                                <option>MITOOMA</option>
                                                <option>MITYANA</option>
                                                <option>MOROTO</option>
                                                <option>MOYO</option>
                                                <option>MPIGI</option>
                                                <option>MUBENDE</option>
                                                <option>MUKONO</option>
                                                <option>NAKAPIRIPIRIT</option>
                                                <option>NAKASEKE</option>
                                                <option>NAKASONGOLA</option>
                                                <option>NAMAYINGO</option>
                                                <option>NAMUTUMBA</option>
                                                <option>NAPAK</option>
                                                <option>NEBBI</option>
                                                <option>NGORA</option>
                                                <option>NTOROKO</option>
                                                <option>NTUNGAMO</option>
                                                <option>NWOYA</option>
                                                <option>OTUKE</option>
                                                <option>OYAM</option>
                                                <option>PADER</option>
                                                <option>PALLISA</option>
                                                <option>RAKAI</option>
                                                <option>RUBIRIZI</option>
                                                <option>RUKUNGIRI</option>
                                                <option>SERERE</option>
                                                <option>SHEEMA</option>
                                                <option>SIRONKO</option>
                                                <option>SOROTI</option>
                                                <option>SSEMBABULE</option>
                                                <option>TORORO</option>
                                                <option>WAKISO</option>
                                                <option>YUMBE</option>
                                                <option>ZOMBO</option>
                                    </select>
                                            </div>
											<div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Sub County</p>
                                                <input type="text" class="form-control input-default " placeholder="sub county" name="sub_county" required/>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Amount</p>
                                                <input type="text" class="form-control input-default " placeholder="Amount" name="amount" required/>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Schedule</p>
                                                <input type="text" class="form-control input-default " placeholder="Schedule" name="schedule" required/>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">S/No</p>
                                                <input type="text" class="form-control input-default " placeholder="S/No" name="serial_no"/>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">Payment Status</p>
                                                <select class="form-control" name="payment_status">
                                                    <option Value="Paid">Paid</option>
                                                    <option Value="Pending">Not Paid</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" type="submit"><i class="ti-save"></i> save</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8"></div>
                                            </div>
                                        </form>
                                        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <input type="file" class="" name="import_file" accept=".csv">
                                                <br>
                                                <button class="btn btn-success">Import Excel</button>
                                        </form>
                                        <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-6"></div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#create-user"><i class="fa fa-user-plus"></i> Create User</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal for search by Payment-->
                        <div class="modal fade none-border" id="create-user">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body" style="margin-top:30px">
                                        <h4>Create User</h4>
                                            <form method="POST" action="/create-new-user">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="role" class="col-md-4 col-form-label text-md-right"></label><br>
                                                    <input type="radio" value="admin" name="user_role">: Admin<br><br>
                                                    <input type="radio" value="user" name="user_role">: Data Entrant
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Create User') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- END MODAL -->
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
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
    <!-- needed for modal to work -->
    <script src="{{asset('bootstrap/assets/js/lib/jquery.min.js')}}"></script>
    <!-- sidebar and Modal-->
    <script src="{{asset('bootstrap/assets/js/lib/bootstrap.min.js')}}"></script>
    <!-- bootstrap -->


    <script src="{{asset('bootstrap/assets/js/scripts.js')}}"></script>
    <!-- scripit init-->
</body>


<!-- Mirrored from demo.themefisher.com/themefisher/focus//beneficiaries by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 21:30:44 GMT -->
</html>
