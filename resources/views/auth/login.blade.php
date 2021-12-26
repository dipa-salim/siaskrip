<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--===============================================================================================-->
	    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('colorlib/css/main.css') }}">
    <!--===============================================================================================-->
    <title>Login</title>
</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ url('adminlte/img/loginlogo.jpg') }}" alt="IMG">
				</div>
    <form class="login100-form validate-form" action="{{ route('login.custom') }}" method="POST">
        @csrf
        <span class="login100-form-title">
            SIASKRIP PTIK
        </span>
            <div class="wrap-input100 validate-input" data-validate = "Login harus dengan email">
                <input class="input100" type="text" name="email" placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            <div class="wrap-input100 validate-input" data-validate = "Password harus diisi">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" value="login">
                Login
            </button>
            {{-- <a class="txt2" href="{{ url('register') }}"><br>
                belum punya akun ? Daftar disini
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a> --}}
        </div>
    </form>
</div>
</div>
</div>
{{-- <div class="formgroup">
            <label for="judullogin">SIASKRIP</label>
            <input type="text" name="email">
            <input type="password" name="password">
            <input type="submit" value="login">
        </div> --}}
    <!--===============================================================================================-->
	    <script src="{{ asset('colorlib/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('colorlib/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('colorlib/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('colorlib/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('colorlib/vendor/tilt/tilt.jquery.min.js') }}"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
    <!--===============================================================================================-->
        <script src="{{ asset('colorlib/js/main.js') }}"></script>
</body>
</html>
