@extends('app.user.dashboard')

@section('profile')

    <h2 class="fw-bold">Mot de passe</h2>
    <p>Le mot de passe doit faire 8 caractères minimum</p>
    <p>Il doit contenir au moins:</p>
    <ul>
        <li>Une majuscule</li>
        <li>Une minuscule</li>
        <li>Un chiffre</li>
        <li>Un caractère spécial (%, #, :, $, *, !, ?, -)</li>
    </ul>

    <div class="col-sm-10 mt-4">
        <form action="{{ route('user.profile.password.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('current') is-invalid @enderror" id="current" placeholder="" name="current">
                            @error('current')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label for="current">Mot de passe actuel</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password">Nouveau mot de passe</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirm-password" placeholder="" name="password_confirmation">
                        <label for="confirm-password">Confirmez votre nouveau mot de passe</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" class="btn btn-success" value="Modifier mes informations">
            </div>
        </form>
    </div>

@endsection