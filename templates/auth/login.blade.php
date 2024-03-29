@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <h1 class="text-dark text-center mb-4">Se connecter</h1>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <div class="login-card-footer-nav block-media-login">
                        <a href="{{ route('facebook') }}" class="btn btn-primary  my-1">
                            <span class="bi bi-facebook text-white mx-2"></span>Se connecter avec Facebook
                        </a>
                        <a href="{{ route('google') }}" class="btn btn-danger my-1">
                            <span class="bi bi-google text-white mx-2"></span>Se connecter avec Google
                        </a>
                    </div>
                </div>
                <div class="card-body py-5">
                    <form action="{{ route('login') }}" method="POST">

                        @method('post')
                        @csrf

                        <div class="form-group row my-2 text-center">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2 text-center">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4 my-4 d-flex justify-content-between">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>

                                <div class="form-check">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                                            Mot de passe oublié
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Se connecter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
