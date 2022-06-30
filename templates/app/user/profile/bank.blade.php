@extends('app.user.dashboard')


@section('profile')
    <h2 class="fw-bold">Coordonnées bancaires</h2>
    <p>Les informations du compte bancaire doivent être au même nom que votre compte Colissend.</p>

    <div class="col-sm-10 mt-4">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('bank_address_1') is-invalid @enderror" id="bank_address_1" placeholder="adresse" name="bank_address_1" value="{{ $profile->bank_address_1 }}">
                        <label for="bank_adresse_1">Adresse</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="bank_address_2" placeholder="" name="bank_address_2" value="{{ $profile->bank_address_2 }}">
                        <label for="bank_address_2">Complément d'adresse</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('bank_postal_code') is-invalid @enderror" id="bank_postal_code" placeholder="" name="bank_postal_code" value="{{ $profile->bank_postal_code }}">
                        <label for="bank_postal_code">Code postal</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('bank_city') is-invalid @enderror" id="bank_city" placeholder="" name="bank_city" value="{{ $profile->bank_city }}">
                        <label for="bank_city">Ville</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('bank_owner') is-invalid @enderror" id="bank_owner" placeholder="" name="bank_owner" value="{{ $profile->bank_owner }}">
                        <label for="bank_owner">Titulaire du compte</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('bank_iban') is-invalid @enderror" id="bank_iban" placeholder="" name="bank_iban" value="{{ $profile->bank_iban }}">
                        <label for="bank_iban">IBAN</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" class="btn btn-success" value="Enregistrer">
            </div>
        </form>
    </div>

@endsection