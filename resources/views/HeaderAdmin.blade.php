<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashboard Admin</title>
    <style>
        .fa-bars {
            color : white;
        }
        /* Style the Image Used to Trigger the Modal */
        #preview {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        #preview:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content, #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
}
    </style>
    <!-- Favicons -->
    <link href="{{asset('asset_sementara/admin/img/favicon.png')}}" rel="icon">
    <link href="{{asset('asset_sementara/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{ asset('asset_sementara/admin/lib/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('asset_sementara/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_sementara/admin/lib/bootstrap-fileupload/bootstrap-fileupload.css') }}" />
    <link href="{{ asset('asset_sementara/css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_sementara/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_sementara/admin/css/style.css') }}" rel="stylesheet">
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
                    <div id="navmenu" color="white" class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" onclick="klikaj()"></div>
                    <input type="text"  id="navkey" value="Open" hidden>
                </div>
        <!--logo start-->
            <a href="/homecust" class="logo"><b>ADMIN EXIM TRADERS</span></b></a>
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
            <div id="sidebar" class="nav-collapse " style="display: block">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    @if (Session::get('adminLog') == "owner")
                        <h5 class="centered">Welcome, {{Session::get('adminLog')}}!</h5>
                    @else
                        <h5 class="centered">Welcome,Admin {{Session::get('adminLog')}}!</h5>
                    @endif
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
      <script src="{{ asset('asset_sementara/js/lightbox.js') }}"></script>
      <script>
          var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("preview");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }
            // function klikaj() {
            //     if(document.getElementById('navkey').value=="Open"){
            //         $("#sidebar").detach();
            //         span.appendTo('body');
            //         document.getElementById('navkey').value='Close';
            //         event.preventDefault();
            //     }
            //     else{
            //         document.getElementById('sidebar').style.visibility='visible';
            //         document.getElementById('nav-accordion').style.visibility='visible';
            //         document.getElementById('navkey').value='Open';
            //         event.preventDefault();
            //     }
            // }
      </script>
    @stack('js')
</body>

</html>
