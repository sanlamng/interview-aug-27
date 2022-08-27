
@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from tixia.dexignzone.com/laravel/demo/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jun 2022 10:34:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Testapi | Register</title>
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
                <div class="card-header">{{ __('Create an Account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="row mb-3">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber">

                                @error('phonenumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>


                                @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Login to your Account') }}
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


<!-- Mirrored from tixia.dexignzone.com/laravel/demo/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jun 2022 10:34:03 GMT -->

</html>


@endsection