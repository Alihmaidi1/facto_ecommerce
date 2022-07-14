<!doctype html>
@if(app()->getLocale()=="ar")
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	<meta name="file-base-url" content="{{ getFileBaseURL() }}">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="icon" href="{{asset('default/logo.png')}}">
	<title>{{ get_setting('website_name').' | '.get_setting('site_motto') }}</title>

	<!-- google font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    @if(app()->getLocale()=="ar")
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif
	<link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css') }}">

    <style>
        body {
            font-size: 12px;
        }
    </style>

</head>
<body class="">

	<div class="aiz-main-wrapper d-flex">
        <div class="flex-grow-1">
            @yield('content')
        </div>
    </div><!-- .aiz-main-wrapper -->

    @yield('modal')


    <script src="{{ asset('assets/js/vendors.js') }}" ></script>
    <script src="{{ asset('assets/js/aiz-core.js') }}" ></script>

    @yield('script')

</body>
</html>
