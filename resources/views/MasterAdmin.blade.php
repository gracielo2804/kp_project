<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Customer Exim Traders</title>

    <!-- Favicons -->
    <link href="{{asset('asset_sementara/admin/img/favicon.png')}}" rel="icon">
    <link href="{{asset('asset_sementara/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <link href="{{ asset('asset_sementara/admin/lib/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--external css-->
    <link href="{{ asset('asset_sementara/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-datepicker/css/datepicker.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-daterangepicker/daterangepicker.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-timepicker/compiled/timepicker.css') }}" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-datetimepicker/css/datetimepicker.css') }}" /> --}}
    <!-- Custom styles for this template -->
    <link href="{{ asset('asset_sementara/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_sementara/css/bootstrap-pincode-input.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/sweetalert2.min.css')}}">
    {{-- <link href="{{ asset('asset_sementara/admin/css/style-responsive.css') }}" rel="stylesheet"> --}}

    <!-- =======================================================
        Template Name: Dashio
        Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
        Author: TemplateMag.com
        License: https://templatemag.com/license/
    ======================================================= -->
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
            <a href="/homecust" class="logo"><b>Exim Traders</span></b></a>
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
                    <h5 class="centered">Welcome,User</h5>
                    {{-- <li class="mt">
                        <a class="{{ (url()->current() == url("/admin/index")) ? 'active' : '' }}" href="index">
                        <i class="fa fa-dashboard"></i>
                        <span>Home</span>
                        </a>
                    </li> --}}
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/invest")) ? 'active' : '' }}" href="/invest">
                        <i class="fa fa-usd"></i>
                        <span>Invest</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/hisInvest")) ? 'active' : '' }}" href="/hisInvest">
                        <i class="fa fa-hospital-o"></i>
                        <span>History Invest</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/editProfile")) ? 'active' : '' }}" href="/editProfile">
                        <i class="fa fa-user-o"></i>
                        <span>Edit Profile</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/deposit")) ? 'active' : '' }}" href="/deposit">
                        <i class="fa fa-tasks"></i>
                        <span>Deposit</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/hisDeposit")) ? 'active' : '' }}" href="/hisDeposit">
                        <i class="fa fa-hospital-o"></i>
                        <span>History Deposit</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/withdraw")) ? 'active' : '' }}" href="/withdraw">
                        <i class="fa fa-tasks"></i>
                        <span>Withdrawal</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/hisWithdraw")) ? 'active' : '' }}" href="/hisWithdraw">
                        <i class="fa fa-hospital-o"></i>
                        <span>History Withdrawal</span>
                        </a>
                    </li>
                    {{-- <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/listPesawat")) ? 'active' : '' }}" href="/admin/listPesawat">
                        <i class=" fa fa-plane"></i>
                        <span>Pesawat</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/listCustomer")) ? 'active' : '' }}" href="/admin/listCutomer">
                        <i class=" fa fa-users"></i>
                        <span>Customer</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="{{ (url()->current() == url("/admin/laporan")) ? 'active' : '' }}" href="/admin/laporan">
                        <i class=" fa fa-users"></i>
                        <span>Laporan Penjualan</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <ul class="sub">
                        <li><a class="{{ (url()->current() == url("/admin/laporan")) ? 'active' : '' }}" href="/admin/laporan">Laporan Penjualan</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="/admin/chat">
                        <i class="fa fa-comments-o"></i>
                            <span>Chat Room</span>
                        </a>
                    </li> --}}
                <!-- sidebar menu end-->
            </div>
        </aside>
        @yield('body')
        <footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
                </p>
                <div class="credits">
                </div>
                <a href="advanced_form_components.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
    <!--footer end-->
    </section>
    <script src="{{ asset('asset_sementara/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset_sementara/js/bootstrap-pincode-input.js') }}"></script>
    <script src="{{ asset('asset_sementara/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('asset_sementara/js/sweetalert2.min.js')}}"></script>
    @stack('js')

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <!-- js placed at the end of the document so the pages load faster -->
    {{-- <script class="include" type="text/javascript" src="{{ asset('asset_sementara/admin/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ asset('asset_sementara/admin/lib/common-scripts.js') }}"></script>
    <!--script for this page-->
    <script src="{{ asset('asset_sementara/admin/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-daterangepicker/date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset_sementara/admin/lib/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('asset_sementara/admin/lib/advanced-form-components.js') }}"></script>
    @stack('js') --}}
</body>

</html>
