<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('asset_sementara/css/loginv2.css')}}">

	</head>
	<body>
   
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">                
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
                        @include('alert')                         
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
                
		      	<h3 class="text-center mb-4">Admin Exim Traders</h3>
                <form action="/loginadmin" class="login-form" method="post">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" name="username" required>
		      		</div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" name="pass" placeholder="Password" required>
                    </div>
                    <div class="form-group d-md-flex mb-0">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" name="checkremember" id="checkremember" value="checkremember" checked>
                                <span class="checkmark"></span>
                            </label>
                        </div>                                       				
                    </div>
				{{-- <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div> --}}
	            <div class="form-group">
					<a href="/logincust"><button type="button" class="btn btn-primary rounded submit p-3">To Customer Login</button></a>
					<button type="submit" class="btn btn-primary rounded submit p-3 px-5" style="left:220px">Login</button>
	            </div>				

				{{-- <button type="submit" class="btn btn-primary rounded submit p-3 px-5 col-12" style="position: relative;top:100px">To Admin Login</button> --}}
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('asset_sementara/js/jquery.min.js')}}"></script>
  	<script src="{{ asset('asset_sementara/js/popper.min.js')}}"></script>
  	<script src="{{ asset('asset_sementara/js/bootstrap.min.js')}}"></script>
  	<script src="{{ asset('asset_sementara/js/loginv2.js')}}"></script>

	</body>
</html>

