@php
	$page = "404";
@endphp

@extends('layouts.error')

@section('content')
	<div class="container text-center text-dark">
        <div class="display-2 mb-5">
            <span class=""><i class="ti-face-smile mr-1"></i></span>ops
        </div>
        <h1 class="h2 mb-5">Error 404: Page Not Found</h1>
        <a class="btn btn-primary mb-0" href="{{url()->previous()}}"> Go Back</a>
    </div>
@endsection
