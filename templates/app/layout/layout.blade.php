@extends('base')

@section('stylesheets')

    @yield('style')

@endsection

@section('scripts')

    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{ env('GOOGLE_PLACES_KEY', 'AIzaSyD7wMuFt6bKsYUflmbP4HUwbkHOD22S-D4') }}">
    </script>

    <script src="{{ mix('js/appController.js') }}"></script>

@endsection

@section('content')

    <div id="app">

        <div class="min-vh-100">

            @include('app.include.nav')

            @yield('header')

            <div class="container text-center">
                @if(session('success'))
                    <div class="alert alert-success mt-5">
                        {!! session('success') !!}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mt-5">
                        {!! session('error') !!}
                    </div>
                @endif
            </div>

            @yield('app')

        </div>

        <x-whatsapp></x-whatsapp>

        @include('app.include.footer')

    </div>

    @if(Auth::check())
        <script>window.auth={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.auth=null;</script>
    @endif

@endsection
