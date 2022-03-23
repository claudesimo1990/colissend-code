@extends('base')

@section('stylesheets')

    <link rel="stylesheet" href="{{ mix('css/adminController.css') }}">

@endsection

@section('scripts')

    <script src="{{ mix('js/adminController.js') }}"></script>

@endsection

@section('content')

    @include('admin.include.header')

    @include('admin.include.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            @yield('page-title')
        </div>

        <section class="section">

            <div id="admin">

                @yield('admin')

            </div>

        </section>

    </main>

@endsection