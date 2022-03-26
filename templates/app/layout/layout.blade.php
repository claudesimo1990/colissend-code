@extends('base')

@section('stylesheets')

    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">

    @yield('style')

@endsection

@section('scripts')

    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBzinmkgT6lSn--CiB3l5H_ffUCG4bpiyY">
    </script>

    <script src="{{ mix('js/appController.js') }}"></script>

@endsection

@section('content')

    <div id="app" class="min-vh-100">

        @include('app.include.nav')

        <div class="container text-center mt-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        @yield('header')

        @yield('app')
    </div>

    <div>
        @include('app.include.footer')
    </div>

    @if (Auth::check())
        <script>window.auth={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.auth=null;</script>
    @endif

@endsection
