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

            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
                <li class="nav-item nav-search  d-block w-100">
                    @yield('btn')
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">

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

<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/dashboard/js/off-canvas.js"></script>

<!-- end inject -->
<!-- Custom js for this page-->
<script src="/dashboard/js/dashboard.js"></script>

<!-- End custom js for this page-->

<script src="/dashboard/js/select2.min.js" type="text/javascript"></script>
<script src="/dashboard/js/jquery.mask.min.js" type="text/javascript"></script>
@yield('script')
</body>

</html>

