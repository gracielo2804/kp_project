<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome To Pray & Go Travel Agent</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset_sementara/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/animate.css')}}">

    <link rel="stylesheet" href="{{ asset('asset_sementara/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('asset_sementara/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('asset_sementara/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('asset_sementara/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{ asset('asset_sementara/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('asset_sementara/css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="/" style="color: black;">Pray & Go</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="/homecust" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="/deposit" class="nav-link">Deposit</a></li>
              
              {{-- <li class="nav-item"><a href="blog" class="nav-link">Artikel Ziarah</a></li>
              <li class="nav-item">
                  <a href="contact" class="nav-link">Contact</a>
              </li> --}}
              <li class="nav-item"><a href="about" class="nav-link">About</a></li>
              @if (Session::has("custLog"))
              <li class="nav-item"><p class="nav-link">Hello, {{Session::get('custLog')['nama_customer']}}<br>Saldo : Rp. <span id="saldo">{{Session::get('custLog')['saldo']}}</span></p>
                <input type="hidden" id="username" value={{Session::get('custLog')['username_customer']}}>
              </li>
              <li class="nav-item cta"><a href="logout" class="nav-link"><span>Log Out</span></a></li>
              @else
              <li class="nav-item cta"><a href="login" class="nav-link"><span>Login</span></a></li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
@yield('body')
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Pray & Go</h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Service</a></li>
              <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Become a partner</a></li>
              <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Jalan Ngagel Jaya Tengah 73-77,Surabaya,Indonesia</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">0315027920</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text"> web_admin@istts.ac.id</span></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="{{ asset('asset_sementara/js/jquery.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/popper.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('asset_sementara/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/jquery.stellar.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/aos.js')}}"></script>
<script src="{{ asset('asset_sementara/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ asset('asset_sementara/js/bootstrap-datepicker.js')}}"></script>
{{-- <script src="{{ asset('asset_sementara/js/jquery.timepicker.min.js')}}"></script> --}}
<script src="{{ asset('asset_sementara/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('asset_sementara/js/google-map.js')}}"></script>
<script src="{{ asset('asset_sementara/js/main.js')}}"></script>
<script>
  $(document).ready(function(){
    console.log($('#username').val())
    $(window).bind("beforeunload", function(){
      if($('#username').val()!=""){
        $.ajax({
            method:'get',
            url:'/ajaxRefreshSession/'+$('#username').val(),
            success:function(res){                                                             
                
            }                
        });
      }
    });
    
    // console.log('/ajaxRefreshSession/'+$('#username').text());
    // console.log($('#username').text())
    //  $('#saldo').ready(function(){     
      
    //  })
  });
</script>
</body>
</html>
