<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/base/vendor.bundle.base.css">
    <!-- end inject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/dashboard/css/style.css">
    <link rel="stylesheet" href="/dashboard/css/select2.min.css">
    <!-- end inject -->
    <link rel="shortcut icon" href="/dashboard/images/favicon.png"/>
</head>
<body>
<style>
    html {
        direction: rtl;
    }
</style>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="{{route('panel.index')}}">
                    فناوران
                    {{--                    <img src="/dashboard/images/logo.svg" alt="logo"/>--}}
                </a>
                <a class="navbar-brand brand-logo-mini" href="/panel">
                    فناوران
                </a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
                <li class="nav-item nav-search  d-block w-100">
                    @yield('btn')
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                {{--                <li class="nav-item dropdown me-1">--}}
                {{--                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"--}}
                {{--                       id="messageDropdown" href="#" data-bs-toggle="dropdown">--}}
                {{--                        <i class="mdi mdi-message-text mx-0"></i>--}}
                {{--                        <span class="count"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">--}}
                {{--                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>--}}
                {{--                        <a class="dropdown-item">--}}
                {{--                            <div class="item-thumbnail">--}}
                {{--                                <img src="images/faces/face4.jpg" alt="image" class="profile-pic">--}}
                {{--                            </div>--}}
                {{--                            <div class="item-content flex-grow">--}}
                {{--                                <h6 class="ellipsis font-weight-normal">David Grey--}}
                {{--                                </h6>--}}
                {{--                                <p class="font-weight-light small-text text-muted mb-0">--}}
                {{--                                    The meeting is cancelled--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                        <a class="dropdown-item">--}}
                {{--                            <div class="item-thumbnail">--}}
                {{--                                <img src="/dashboard/images/faces/face2.jpg" alt="image" class="profile-pic">--}}
                {{--                            </div>--}}
                {{--                            <div class="item-content flex-grow">--}}
                {{--                                <h6 class="ellipsis font-weight-normal">Tim Cook--}}
                {{--                                </h6>--}}
                {{--                                <p class="font-weight-light small-text text-muted mb-0">--}}
                {{--                                    New product launch--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                        <a class="dropdown-item">--}}
                {{--                            <div class="item-thumbnail">--}}
                {{--                                <img src="/dashboard/images/faces/face3.jpg" alt="image" class="profile-pic">--}}
                {{--                            </div>--}}
                {{--                            <div class="item-content flex-grow">--}}
                {{--                                <h6 class="ellipsis font-weight-normal"> Johnson--}}
                {{--                                </h6>--}}
                {{--                                <p class="font-weight-light small-text text-muted mb-0">--}}
                {{--                                    Upcoming board meeting--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item dropdown me-4">--}}
                {{--                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"--}}
                {{--                       id="notificationDropdown" href="#" data-bs-toggle="dropdown">--}}
                {{--                        <i class="mdi mdi-bell mx-0"></i>--}}
                {{--                        <span class="count"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown"--}}
                {{--                         aria-labelledby="notificationDropdown">--}}
                {{--                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>--}}
                {{--                        <a class="dropdown-item">--}}
                {{--                            <div class="item-thumbnail">--}}
                {{--                                <div class="item-icon bg-success">--}}
                {{--                                    <i class="mdi mdi-information mx-0"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="item-content">--}}
                {{--                                <h6 class="font-weight-normal">Application Error</h6>--}}
                {{--                                <p class="font-weight-light small-text mb-0 text-muted">--}}
                {{--                                    Just now--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                        <a class="dropdown-item">--}}
                {{--                            <div class="item-thumbnail">--}}
                {{--                                <div class="item-icon bg-warning">--}}
                {{--                                    <i class="mdi mdi-settings mx-0"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="item-content">--}}
                {{--                                <h6 class="font-weight-normal">Settings</h6>--}}
                {{--                                <p class="font-weight-light small-text mb-0 text-muted">--}}
                {{--                                    Private message--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                        <a class="dropdown-item">--}}
                {{--                            <div class="item-thumbnail">--}}
                {{--                                <div class="item-icon bg-info">--}}
                {{--                                    <i class="mdi mdi-account-box mx-0"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="item-content">--}}
                {{--                                <h6 class="font-weight-normal">New user registration</h6>--}}
                {{--                                <p class="font-weight-light small-text mb-0 text-muted">--}}
                {{--                                    2 days ago--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="/dashboard/images/faces/face5.jpg" alt="profile"/>
                        <span class="nav-profile-name">{{auth()->user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-primary"></i>
                            {{__('label.logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('panel.index')}}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">داشبورد</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.index',['type'=>'OPERATOR'])}}">
                        <i class="mdi mdi-brush menu-icon"></i>
                        <span class="menu-title">{{__('label.designers')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.index',['type'=>'USER'])}}">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">{{__('label.customers')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                       aria-controls="ui-basic">
                        <i class="mdi mdi-file-document menu-icon"></i>
                        <span class="menu-title">  {{__('input.invoice')}}</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invoice.index')}}">
                                    {{__('input.invoice')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invoice.index',['status'=> 'PROGRESS'])}}">
                                    {{__('input.invoice_progress')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invoice.index',['status'=> 'COMPLETE'])}}">
                                    {{__('input.invoice_complete')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invoice.index',['status'=> 'PAYMENT'])}}">
                                    {{__('input.invoice_payment')}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invoice.index',['status'=> 'WITHDRAWAL'])}}">
                                    {{__('input.invoice_withdrawal')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('msg'))
                    <div class="alert alert-success"> {{session()->get('msg')}}</div>
                @endif



                @if(count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                            href="#" target="_blank"> psobhanlo </a>2023</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a
                            href="#"
                            target="_blank"> psobhanlo  </a>  </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="/dashboard/vendors/base/vendor.bundle.base.js"></script>
<!-- end inject -->
<!-- Plugin js for this page-->
<script src="/dashboard/vendors/chart.js/Chart.min.js"></script>
<script src="/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/dashboard/js/off-canvas.js"></script>
<script src="/dashboard/js/hoverable-collapse.js"></script>
<script src="/dashboard/js/template.js"></script>
<!-- end inject -->
<!-- Custom js for this page-->
<script src="/dashboard/js/dashboard.js"></script>
<script src="/dashboard/js/data-table.js"></script>
<script src="/dashboard/js/jquery.dataTables.js"></script>
<script src="/dashboard/js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->

<script src="/dashboard/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/dashboard/js/select2.min.js" type="text/javascript"></script>
@yield('script')
</body>

</html>

