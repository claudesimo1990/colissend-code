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
                        <input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse">
                        <label for="adresse">Adresse</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="adresse2" placeholder="" name="adresse2">
                        <label for="adresse2">Complément d'adresse</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="postal-code" placeholder="" name="postal-code">
                        <label for="postal-code">Code postal</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="country" placeholder="" name="country">
                        <label for="country">Ville</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="bank-owner" placeholder="" name="bank-owner">
                        <label for="bank-owner">Titulaire du compte</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="iban" placeholder="" name="iban">
                        <label for="iban">IBAN</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" class="btn btn-success" value="Enregistrer">
            </div>
        </form>
    </div>

@endsection