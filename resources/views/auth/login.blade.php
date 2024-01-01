<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/animate/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/css_login/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/css_login/main.css') }}">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('img/images_login/img_sekolah.png') }}" alt="IMG" style="margin-bottom: 100px;">
				</div>

				<form action="{{ route('login') }}" method="post" class="login100-form validate-form">
					@csrf
					<span class="login100-form-title">
						MASUK
					</span>

					<div class="form-control @error('email') is-invalid @enderror d-none">
					</div>
					@error('email')
					<div class="card text-white bg-danger mb-3 text-center" style="max-width: 18rem; font-size: 12px;">
						<div class="card-header">{{ $message }}</div>
					</div>
					@enderror

					<div class="wrap-input100">
						<input class="input100 mb-4 @error('email') is-invalid @enderror" placeholder="{{ __('Username') }}" name="email" id="email" value="{{ old('email') }}" autocomplete="off" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="form-control @error('password') is-invalid @enderror d-none">
					</div>
					@error('password')
					<div class="card text-white bg-danger mb-3 text-center" style="max-width: 18rem; font-size: 12px;">
						<div class="card-header">{{ $message }}</div>
					</div>
					@enderror

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100 form-control @error('password') is-invalid @enderror" type="password" placeholder="{{ __('Password') }}" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

					</div>

					<div class="container-login100-form-btn">
						<button type="submit" id="btn-login" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>

				<div class="text-center p-t-12 d-none">
					<span class="txt1">
						Forgot
					</span>
					<a class="txt2" href="#">
						Username / Password?
					</a>
				</div>

				<div class="text-center p-t-136 d-none">
					<a class="txt2" href="#">
						Create your Account
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('plugins/tilt/tilt.jquery.min.js') }}"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('plugins/js_login/main.js') }}"></script>
	<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

</body>

</html>