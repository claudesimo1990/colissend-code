@extends('app.layout.layout')

@section('title')Colissend | poster votre annonce voyage @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container py-5">
        <travel-component privacy="{{ route('privacy') }}" payments="{{ json_encode($payments) }}" objects="{{ json_encode($transportedObjects) }}" companies="{{ json_encode($companies) }}"></travel-component>
    </div>

@endsection
