<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('assets/user/bootstrap/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/user/css/main.css')}}" />
        <noscript><link rel="stylesheet" href="{{asset('assets/user/css/noscript.css')}}" /></noscript>
        @yield('css')
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

                @include('user.layouts.navbar')

                <!-- Main -->
                @yield('modal')
                @yield('main')

                <!-- Footer -->
                @if (Route::is('password.email') || Route::is('password.request') || Route::is('password.reset') || Route::is('password.confirm') || Route::is('password.update'))
                    @include('user.layouts.footer-login')
                @else
                    @include('user.layouts.footer')
                @endif


			</div>

		<!-- Scripts -->
			{{-- <script src="{{asset('assets/user/js/jquery.min.js')}}"></script> --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="{{asset('assets/user/js/app.js')}}"></script>
			<script src="{{asset('assets/user/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
			<script src="{{asset('assets/user/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('assets/user/js/jquery.scrollex.min.js')}}"></script>
            <script src="{{asset('assets/user/js/main.js')}}"></script>

            @yield('js')

	</body>
</html>
