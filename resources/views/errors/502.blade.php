@php
    $page = "Maintenance";
@endphp

@extends('layouts.error')

@section('content')
    <div class="container text-center text-dark">
        <div class="display-2 mb-5">
            <span class=""><i class="fa fa-gears fa-4x"></i><i class="fa fa-gear fa-4x"></i>
        </div>
        <h1 class="h2 mb-5">DEVELOPERS ARE WORKING</h1>
        <h4>We are so sorry for any damages this operation may cause your business, we are upgrading to serve you better.</h4>
        <a href="mailto:{{settings('company_email')}}" class="text-primary-blue w-inline-block pt-4">
            <div>GET IN TOUCH</div>
        </a>
    </div>
@endsection
