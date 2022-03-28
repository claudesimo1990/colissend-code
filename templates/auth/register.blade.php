@extends('app.layout.layout')

@section('app')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 py-4">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="login-card-footer-nav block-media-login my-4">
                            <a href="{{ route('facebook') }}" class="btn btn-primary">
                                <span class="bi bi-facebook text-white"></span> Continuer avec facebook
                            </a>
                            <a href="{{ route('google') }}" class="btn btn-danger">
                                <span class="bi bi-google text-white"></span> Continuer avec google
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group row my-2">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">Image du Profile</label>
                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Adresse mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Mot de passe de confirmation</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Inscription') }}
                                    </button>

                                    <a class="btn btn-link text-success" href="{{ route('login') }}">
                                        Se connecté
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
