<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashboard Admin</title>

    <!-- Favicons -->
    <link href="{{asset('asset_sementara/admin/img/favicon.png')}}" rel="icon">
    <link href="{{asset('asset_sementara/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <link href="{{ asset('asset_sementara/admin/lib/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('asset_sementara/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('asset_sementara/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_sementara/admin/css/style-responsive.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
        <!--logo start-->
            <a href="/homecust" class="logo"><b>Admin Dashboard</span></b></a>
            <!--logo end-->
            <ul class="nav pull-right top-menu">
                <a class="btn btn-danger btn-sm mt-3" href="/logout">Logout</a>
            </ul>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
            MAIN SIDEBAR MENU
            *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <h5 class="centered">Welcome,Admin {{Session::get('adminLog')}}!</h5>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/dashboard")) ? 'active' : '' }}" href="/admin/dashboard">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/list/paketinvestasi")) ? 'active' : '' }}" href="/admin/list/paketinvestasi">
                        <i class="fa fa-tasks"></i>
                        <span>Paket Investasi</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/list/customer")) ? 'active' : '' }}" href="/admin/list/customer">
                        <i class="fa fa-user"></i>
                        <span>Daftar Customer</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/pending/deposit")) ? 'active' : '' }}" href="/admin/pending/deposit">
                        <i class=" fa fa-money"></i>
                        <span>Pending Deposit</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/pending/withdrawal")) ? 'active' : '' }}" href="/admin/pending/withdrawal">
                        <i class=" fa fa-credit-card"></i>
                        <span>Pending Withdrawal</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/pending/editprofile")) ? 'active' : '' }}" href="/admin/pending/editprofile">
                        <i class=" fa fa-users"></i>
                        <span>Pending Edit Profile</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/laporanpembelian")) ? 'active' : '' }}" href="/admin/laporanpembelian">
                        <i class=" fa fa-flag"></i>
                        <span>Laporan Pembelian Paket</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/laporanwddepo")) ? 'active' : '' }}" href="/admin/laporanwddepo">
                        <i class=" fa fa-flag"></i>
                        <span>Laporan Depo & WD</span>
                        </a>
                    </li>
                    @if (Session::get('adminLog') == "owner")
                        <li class="sub-menu">
                            <a class="{{ (url()->current() == url("/admin/logadmin")) ? 'active' : '' }}" href="/admin/logadmin">
                            <i class=" fa fa-sticky-note-o "></i>
                            <span>Log Admin</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a class="{{ (url()->current() == url("/admin/list/admin")) ? 'active' : '' }}" href="/admin/list/admin">
                            <i class=" fa fa-address-book-o  "></i>
                            <span>List Admin</span>
                            </a>
                        </li>
                    @endif
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        @yield('body')
        <footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>Exim Trader</strong>. All Rights Reserved
                </p>
                <div class="credits">
                </div>
            </div>
        </footer>
    <!--footer end-->
    </section>
    <script src="{{ asset('asset_sementara/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/bootstrap/js/bootstrap.js') }}"></script>
    @stack('js')

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <!-- js placed at the end of the document so the pages load faster -->
    <script class="include" type="text/javascript" src="{{ asset('asset_sementara/admin/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ asset('asset_sementara/admin/lib/common-scripts.js') }}"></script>
    <!--script for this page-->
    <script src="{{ asset('asset_sementara/admin/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/advanced-form-components.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

    @stack('js')
</body>

</html>
