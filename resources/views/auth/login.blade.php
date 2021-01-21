<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In or Sign Up | DigitalSurel.com</title>
    <link rel="stylesheet" href="{{asset('assets/login/css/login.css')}}">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <span>Use your account</span>
                <input type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif

                    <button type="submit">
                        Sign In
                    </button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <a href="{{route('register')}}"><button class="ghost" id="signUp">Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{asset('assets/login/js/login.js')}}"></script> --}}
</body>
</html>
