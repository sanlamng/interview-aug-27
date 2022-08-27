@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from tixia.dexignzone.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jun 2022 10:31:40 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Testapi | Login</title>
    <meta name="description" content="Some description for the page" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon.png">
    <link href="public/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
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

                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Create an Account') }}
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
    <script src="public/vendor/global/global.min.js" type="text/javascript"></script>
    <script src="public/vendor/bootstrap-datetimepicker/js/moment.js" type="text/javascript"></script>
    <script src="public/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="public/js/custom.min.js" type="text/javascript"></script>
    <script src="public/js/deznav-init.js" type="text/javascript"></script>

    <script id="DZScript" src="../../../dzassets.s3.amazonaws.com/w3-global8bb6.js?btn_dir=right"></script>


    <!--		<script src="https://tixia.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript"></script>
			<script src="https://tixia.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script> -->
    <!--	
 	-->
</body>


<!-- Mirrored from tixia.dexignzone.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jun 2022 10:31:41 GMT -->

</html>



@endsection