@php
	$page = "500";
@endphp

@extends('layouts.error')

@section('content')
	<div class="container text-center text-dark">
        <div class="display-2 mb-5">
            <span class=""><i class="ti-face-smile mr-1"></i></span>ops
        </div>
        <h1 class="h2 mb-5">Error 500: Internal Server Error</h1>
        <p>If you are seeing this page, it means the system has encountered an error that prevented your request from been processed. <br><a href="mailto:{{config('nt_config.company_email') ?? 'navtechng@outlook.com'}}" data-toggle="tooltip" title="NavingTechnologies">Click here to report this error to the developer by e-mail</a></p>

        <a class="btn btn-primary mb-0" href="{{url()->previous()}}"> Go Back</a>
    </div>
@endsection
