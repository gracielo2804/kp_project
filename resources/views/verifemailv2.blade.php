<!doctype html>
<html lang="en">
  <head>
  	<title>Register Account</title>
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
					<h2 class="heading-section">Verifikasi Akun</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						@include('alert')              
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Verifikasi Akun</h3>
				  <center>Kode telah dikirimkan ke alamat email : <span id='emailtoverif'><strong>{{ (session()->get('verifemail')!=null) ? session()->get('verifemail'):old('email') }}</strong></span></center>               
				<form action="/verifemail" class="login-form" method="post">
					@csrf	
					<div class="form-group "><input type="text" name="vercode" id="vercode" class='form-control rounded-left' value="{{old('vercode')}}" placeholder="Kode Verifikasi">		      		
						<center><p>Belum Menerima Kode? Klik <button type="submit" class="btn-link" style="background-color:transparent; border:none;padding:0px;" name="action" value="resend">disini</button></p></center>
					<div class="form-group">
						<button type="submit" class="btn btn-primary rounded submit p-3 px-5 col-12" name="action" value="submit">Verifikasi</button>
					</div>
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
	  <script>
		$(document).ready(function(){
			$('#pass, #conpass').on('keyup', function () {
			if ($('#pass').val() == $('#conpass').val()) {
				$('#message').html('').css('color', 'green');
			} else 
				$('#message').html('Password harus sama dengan konfirmasi password').css('color', 'red');
			});
			$('#pin').ForceNumericOnly();
			$('#phone').ForceNumericOnly();
			$('#norek').ForceNumericOnly();
			$('#pin').on('keyup', function () {
				if($(this).val().length > 6) {
					$(this).val($(this).val().substr(0,$(this).val().length-1))
				};
			});
			$('#username').on('blur',function(){
				console.log('test');
				$.ajax({
					method:'get',
					url:'/ajaxUsernameCustomer/'+$('#username').val(),
					success:function(res){      
						if(res.length==0){
							$('#messageusername').html('Username ini bisa digunakan').css('color', 'green');
						}
						else{
							$('#messageusername').html('Username sudah digunakan').css('color', 'red');
						}
						console.log(res);
					// res.forEach(element => {
					//     $('#asalbandara').val(element.bandara_asal);
					//     $('#tujuanbandara').val(element.bandara_tujuan);
					//     $('#durasiflight').val(element.durasi);
					//     $('#hargaflight').val(element.harga);
					// });
					}                
				});
			});
		});               
		
		jQuery.fn.ForceNumericOnly =
		function()
		{
			return this.each(function()
			{
				$(this).keydown(function(e)
				{
					var key = e.charCode || e.keyCode || 0;
					// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
					// home, end, period, and numpad decimal
					return (
						key == 8 || 
						key == 9 ||
						key == 13 ||
						key == 46 ||
						// key == 110 ||
						// key == 190 ||
						(key >= 35 && key <= 40) ||
						(key >= 48 && key <= 57) ||
						(key >= 96 && key <= 105));
				});
			});
		};     
	</script>

	</body>
</html>

