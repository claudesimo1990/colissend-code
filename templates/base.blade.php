<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="@yield('meta_keywords','some default keywords')">
    <meta name="description" content="@yield('meta_description','my custom homepage')">
    <link rel="canonical" href="{{ url()->current() }}"/>

    <link rel="icon" type="image/x-icon" href="{{ asset('/images/flavicon.png') }}">

    <title>@yield('title','Colissend votre site de reservation et de publication de voyages')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/baseController.css') }}">

     @yield('stylesheets')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
         @yield('content')
            <script src="{{ mix('js/baseController.js') }}"></script>
        @yield('scripts')
    </div>
</body>
</html>
