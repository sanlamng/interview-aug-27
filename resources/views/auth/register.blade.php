@php($page = "Register")
@extends('layouts.auth')

@section('content')
    <p class="text-muted">Welcome, register an account below</p>
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Your Full Name" aria-label="name" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="username" aria-label="username" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" aria-label="email" placeholder="Email Address" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon" title="Date of Birth" data-toggle="tooltip"><i class="fa fa-calendar"></i></span>
            <input type="date" class="form-control" name="dob" value="{{old('dob')}}" aria-label="dob" placeholder="Date of Birth" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" aria-label="phone" placeholder="Phone Number" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
            <input type="password" class="form-control" name="password" aria-label="password" placeholder="Password" />
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="password_confirmation" aria-label="password_confirmation" placeholder="Password confirmation" />
        </div>
        <div class="row">
            <div class="col-12">
                {!! NoCaptcha::display() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
            <div class="col-12">
                <a href="{{route('login')}}" class="btn btn-link box-shadow-0 px-0">Have an account?</a>
            </div>
        </div>
    </form>
@endsection

@section('footer')
    {!! NoCaptcha::renderJs() !!}
@endsection
