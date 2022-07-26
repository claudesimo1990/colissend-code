@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container text-center mt-5">
        <div class="alert alert-success">
            Votre payement a ete bien effectuer. merci nous vous informerons bientôt.
        </div>
    </div>

@endsection
