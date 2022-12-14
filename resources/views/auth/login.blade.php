{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Yayasan Tarbiatul Wildan </title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row">
            <div class="col-12 col-lg-5 ">
                <div id="auth-left">

                    <form method="POST" need-validation action="{{ route('login') }}">
                        @csrf

                        <div class="text-center">
                            <h5>
                                <div class="text-center">
                                    <img src="assets/images/logo/favicon.svg" class="avatar-xl mb-2" alt="Logo"
                                        style="height:60px;width:60px;">
                                </div>
                                <div class="text-center mb-5">
                                    Laporan Yayasan Tarbiatul Wildan
                                </div>
                            </h5>
                        </div>

                        {{-- MASUKKAN dEMAIL --}}
                        <div class="form-group position-relative has-icon-left mb-0">
                            <input asp-for="email" type="email" name="email"
                                class="form-control form-control-xl @error('email') is-invalid @enderror"
                                placeholder="email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        @error('email')
                            <div class="mt-1">
                                <span class="text-danger" asp-validation-for="email">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                        {{-- MASUKKAN EMAIL --}}
                        
                        {{-- MASUKKAN PASSWORD --}}
                        <div class="form-group position-relative has-icon-left mt-4 mb-0">
                            <input asp-for="password" type="password" name="password"
                                class="form-control form-control-xl  @error('password') is-invalid @enderror"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @error('password')
                            <div class="mt-1">
                                <span class="text-danger" asp-validation-for="password">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                        {{-- MASUKKAN PASSWORD --}}
                            
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    {{-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> --}}
                </div>
            </div>

            {{-- ----------------------------------------------------------------------------------------- --}}
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <img src="assets/images/samples/madrasah1.jpg" width="900px" height="713px">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
