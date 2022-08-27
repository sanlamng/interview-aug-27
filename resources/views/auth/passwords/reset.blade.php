@extends('layouts.auth')

@section('content')
    <p class="text-muted">Create a new account password below</p>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group mb-3">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" value="{{$email ?? old('email')}}" placeholder="example@domain.com" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
        </div>
        <div class="input-group mb-4">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required/>
        </div>

        <div class="input-group mt-4">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
    </form>
@endsection
