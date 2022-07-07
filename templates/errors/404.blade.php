@extends('app.layout.layout')

@section('app')

    <div class="container">

        <section class="section error-404 mt-5 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-success mt-5">404</h1>
            <h2>La page que vous recherchez n'existe pas.</h2>
            <a class="btn" href="{{ route('welcome') }}">Retour à l'accueil</a>
        </section>

    </div>

@endsection
