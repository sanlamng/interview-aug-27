@extends('layouts.auth')

@section('content')
    <p class="text-muted">Enter your registered email address to get reset link</p>
    <form action="{{route('password.email')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="example@domain.com" />
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{route('register')}}" class="btn btn-link box-shadow-0 px-0">Register an account</a>
            </div>

            <div class="col-6">
                <a href="{{route('login')}}" class="btn btn-link box-shadow-0 px-0">Remembered password?</a>
            </div>
        </div>
    </form>
@endsection

@section('footer')

@endsection
