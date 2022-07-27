@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <h1 class="text-dark text-center mb-4">S'inscrire</h1>
            <div class="col-md-8 py-4">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="login-card-footer-nav block-media-login">
                            <a href="{{ route('facebook') }}" class="btn btn-primary my-1">
                                <span class="bi bi-facebook text-white mx-2"></span>Se connecter avec Facebook
                            </a>
                            <a href="{{ route('google') }}" class="btn btn-danger my-1">
                                <span class="bi bi-google text-white mx-2"></span>Se connecter avec Google
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group row my-2">
                                <div class="col-md-6">
                                    <label for="lastname" class="col-form-label text-md-right">Nom</label>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="firstname" class="col-form-label text-md-right">Prénom</label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"  autocomplete="firstname" autofocus>
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <div class="col-md-6">
                                    <label for="email" class="col-form-label text-md-right">Adresse mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="avatar" class="col-form-label text-md-right">Image du Profile</label>
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <div class="col-md-6">
                                    <label for="password" class="col-form-label text-md-right">Mot de passe</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm" class="col-form-label">Mot de passe de confirmation</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        S'inscrire
                                    </button>

                                    <a class="btn btn-link text-success" href="{{ route('login') }}">
                                        Se connecter
                                    </a>

                                </div>
                            </div>
                        </form>
                        <div class="text-muted text-center border">
                            <p class="text-start p-2">
                                Vos données personnelles (email et nom d'utilisateur) ne sont utilisées qu'à des fins d'authentification et ne sont pas partagées avec des tiers
                                <a class="text-success" href="{{ route('privacy') }}">(En savoir plus)</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
