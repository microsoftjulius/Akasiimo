<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.themefisher.com/themefisher/focus//view-beneficiary by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 21:30:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OPM Akasiimo</title>

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
    <link href="{{asset('bootstrap/assets/css/lib/data-table/buttons.bootstrap.min.css')}}" rel="stylesheet" />
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
                    </a>
                    </div>
                    <ul>
                        <li><a href="/index"><i class="ti-home"></i>Dashboard</a></li>
                        <li class="active"  style="color: red"><a href="/view-beneficiary"><i class="ti-layout-grid4-alt" style="color: red"></i>Beneficiaries</a></li>
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
                        <!-- <li><a href="/schedules"><i class="fa fa-cc-diners-club custom"></i> Payment Schedules </a></li>
                        <li><a href="/beneficiaries-status"><i class="fa fa-battery-three-quarters"></i> Beneficiaries Status </a></li> -->
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
                                            <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
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
                                    <li class="breadcrumb-item active">View Beneficiaries</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>

                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-3">
                    <form action="{{route('search_by_district_or_any')}}" method="get">
                    @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="search_by_district" class="form-control" placeholder="search by district"/>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="search_by_subcounty" class="form-control" placeholder="search by Sub-County"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="search_by_schedule" class="form-control" placeholder="search by Schedule"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-9">
                                <select name="searc_by_payment_only" id="" class="form-control">
                                    <option></option>
                                    <option value="Paid">Search Paid</option>
                                    <option value="Pending">Search not Paid</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button style="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-plus color-success border-success"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Beneficiaries Searched</div>
                                            <div class="stat-digit">{{number_format($count_total_in_a_search)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-plus color-pink border-pink"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Paid Beneficiaries</div>
                                            <div class="stat-digit">{{number_format($count_paid_in_a_search)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-minus color-danger border-danger"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Pending Beneficiaries</div>
                                            <div class="stat-digit">{{number_format($count_pending_in_a_search)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-plus color-success border-success"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Beneficiaries Total Amount</div>
                                            <div class="stat-digit">{{number_format($sum_total_amount)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-plus color-pink border-pink"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Paid Amount</div>
                                            <div class="stat-digit">{{number_format($sum_paid_amount)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-minus color-danger border-danger"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Pending Amount</div>
                                            <div class="stat-digit">{{number_format($sum_pending_amount)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Names</th>
                                                    <th>NIN</th>
                                                    <th>S/No</th>
                                                    <th>Age</th>
                                                    <th>District</th>
                                                    <th>Sub County</th>
                                                    <th>Amount</th>
                                                    <th>Schedule</th>
                                                    <th>Status</th>
                                                    <th hidden>ID</th>
                                                    @if(auth()->user()->Role == "superadmin")
                                                    <th>Pay/Cancel</th>
                                                    <th>Edit</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all_beneficiaries as $all_beneficiary)
                                                    <tr>
                                                    <td>{{$all_beneficiary -> surname}} {{$all_beneficiary -> other_names}}</td>
                                                    <td>{{$all_beneficiary -> NIN}}</td>
                                                    <td>{{$all_beneficiary -> SNo}}</td>
                                                    <td>{{$all_beneficiary -> Age}}</td>
                                                    <td>{{$all_beneficiary -> district}}</td>
                                                    <td>{{$all_beneficiary -> sub_county}}</td>
                                                    <td>{{number_format($all_beneficiary -> Amount)}}</td>
                                                    <td>{{$all_beneficiary -> Schedule}}</td>
                                                    <td>{{$all_beneficiary -> payment_status}}</td>
                                                    <td hidden>{{$all_beneficiary -> id}}</td>
                                                    @if(auth()->user()->Role == "superadmin")
                                                        @if($all_beneficiary -> payment_status == "Paid")
                                                        <td><button class="btn btn-success" data-toggle="modal" data-target="#cancel-payment"><i class="fa fa-check" title="Cancel payment"></i></button></td>
                                                        @else
                                                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#confirm-payment"><i class="fa fa-remove" title="Mark as paid"></i></button></td>
                                                        @endif
                                                        <td><button class="btn btn-warning" data-toggle="modal" data-target="#edit-beneficiary"><i class="fa fa-pencil" title="Edit Information"></i></button></td>
                                                    @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                {{$all_beneficiaries->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <!-- Modal Edit Beneficiary Category -->
                        <div class="modal fade none-border" id="edit-beneficiary">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><strong>Edit Information</strong></h4>
                                </div>
                                <div class="modal-body" style="margin-top:30px">
                                <form action="/save-edited-data" method="Post">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Name</label>
                                            <input class="form-control form-white" placeholder="Edit Name" type="text" name="beneficiary_name" id="edit-name"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">S/NO</label>
                                            <input class="form-control form-white" placeholder="Edit S/NO" type="text" name="beneficiary_serial_no" id="edit-sno"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">NIN</label>
                                            <input class="form-control form-white" placeholder="Edit NIN" type="text" name="beneficiary_nin" id="edit-nin"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Age</label>
                                            <input class="form-control form-white" placeholder="Edit Age" type="number" name="beneficiary_age" id="edit-age"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">District</label>
                                            <input class="form-control form-white" placeholder="Edit District" type="text" name="beneficiary_district" id="edit-district"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Sub County</label>
                                            <input class="form-control form-white" placeholder="Edit Sub County" type="text" name="beneficiary_subcounty" id="edit-subcounty"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Amount</label>
                                            <input class="form-control form-white" placeholder="Edit Amount" type="text" name="beneficiary_amount" id="edit-amount"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Schedule</label>
                                            <input class="form-control form-white" placeholder="Edit Schedule" type="number" name="benefiary_schedule" id="edit-schedule"/>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Status</label>
                                            <input class="form-control form-white" placeholder="Edit Status" type="text" name="beneficiary_payment_status" id="edit-status"/>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-control form-white" type="hidden" name="beneficiary_id" id="id"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            <!-- END MODAL -->
                    <!-- Modal confirm cancel payment -->
                        <div class="modal fade none-border" id="cancel-payment">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body" style="margin-top:30px">
                                        <form action="/cancel-payment" method="Post">
                                            @csrf
                                            <div class="row">
                                                <h5 style="padding-left:22px">Are you sure you want to cancel this payment ?</h5>
                                                <div class="col-md-12">
                                                    <input class="form-control form-white" type="hidden" name="beneficiary_id" id="update_id"/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal for search by any-->
                        <div class="modal fade none-border" id="search-any">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body" style="margin-top:30px">
                                        <form action="/search_all_db" method="Get">
                                            @csrf
                                            <div class="row">
                                                <input type="text" name="searc_by_all_in_db" class="form-control" placeholder="type here anything you want to search"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- Modal confirm cancel payment -->
                        <div class="modal fade none-border" id="confirm-payment">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-body" style="margin-top:30px">
                                <form action="/confirm-payment" method="Post">
                                @csrf
                                    <div class="row">
                                        <h5 style="padding-left:22px">Are you sure you want to mark this as Paid ?</h5>
                                        <div class="col-md-12">
                                            <input class="form-control form-white" type="hidden" name="beneficiary_id" id="pay_id"/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            <!-- END MODAL -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2019 © Admin Board. - <a href="#">pahappa.com</a></p>
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

    <script src="{{asset('bootstrap/assets/js/scripts.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('bootstrap/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/buttons.dataTables.min.html')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/buttons.flash.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('bootstrap/assets/js/lib/data-table/datatables-init.js')}}"></script>
    <!-- needed for modal to work -->
    <script src="{{asset('bootstrap/assets/js/lib/jquery.min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('bootstrap/assets/js/lib/bootstrap.min.js')}}"></script>


    <script>
    $(document).ready(function(){
        function fetch_beneficiaries_data(query = ''){
            $.ajax({
                url:"{{route('view-beneficiary')}}",
                method: 'GET',
                data:{query:query},
                dataType:'json'
                success:function(data){
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            });
        }
    });
    </script>
</body>
<!-- Mirrored from demo.themefisher.com/themefisher/focus//view-beneficiary by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 May 2019 21:30:31 GMT -->
</html>

<script>
    $('button[data-toggle = "modal"]').click(function(){
        var beneficiary_name = $(this).parents('tr').children('td').eq(0).text();
        document.getElementById('edit-name').setAttribute("Value", beneficiary_name);

        var beneficiary_nin = $(this).parents('tr').children('td').eq(1).text();
        document.getElementById('edit-nin').setAttribute("Value", beneficiary_nin);

        var benefiary_sno = $(this).parents('tr').children('td').eq(2).text();
        document.getElementById('edit-sno').setAttribute("Value",benefiary_sno);

        var beneficiary_age = $(this).parents('tr').children('td').eq(3).text();
        document.getElementById('edit-age').setAttribute("Value",beneficiary_age);

        var beneficiary_district = $(this).parents('tr').children('td').eq(4).text();
        document.getElementById('edit-district').setAttribute("Value",beneficiary_district);

        var beneficiary_sub_county = $(this).parents('tr').children('td').eq(5).text();
        document.getElementById('edit-subcounty').setAttribute("Value",beneficiary_sub_county);

        var beneficiary_amount = $(this).parents('tr').children('td').eq(6).text();
        document.getElementById('edit-amount').setAttribute("Value",beneficiary_amount);

        var beneficiary_schedule = $(this).parents('tr').children('td').eq(7).text();
        document.getElementById('edit-schedule').setAttribute("Value",beneficiary_schedule);

        var payment_status = $(this).parents('tr').children('td').eq(8).text();
        document.getElementById('edit-status').setAttribute("Value",payment_status);

        var beneficiary_id = $(this).parents('tr').children('td').eq(9).text();
        document.getElementById('id').setAttribute("Value", beneficiary_id);

        var update_id = $(this).parents('tr').children('td').eq(9).text();
        document.getElementById('update_id').setAttribute("Value", update_id);

        var pay_id = $(this).parents('tr').children('td').eq(9).text();
        document.getElementById('pay_id').setAttribute("Value", pay_id);
    });
</script>
