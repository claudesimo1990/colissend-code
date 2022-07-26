@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container text-center mt-5">
        <div class="alert alert-danger">
            Une erreur a ete produite lors du payement.. veueiller reassayer plus tard.
        </div>
    </div>

@endsection
