@php($page = "Login")
@extends('layouts.auth')

@section('content')
    <p class="text-muted">Sign In to your dashboard</p>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="example@domain.com" />
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password" />
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="{{route('register')}}" class="btn btn-link box-shadow-0 px-0">Register an account</a>
            </div>
            {{--<div class="col-6">
                <a href="{{route('password.request')}}" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
            </div>--}}
        </div>
    </form>
@endsection

@section('footer')

@endsection
