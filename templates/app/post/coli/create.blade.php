@extends('app.layout.layout')

@section('title')Colissend | poster votre annonce coli @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container py-5">
        <Coli-component privacy="{{ route('privacy') }}" objects="{{ json_encode($coli) }}"></Coli-component>
    </div>

@endsection
