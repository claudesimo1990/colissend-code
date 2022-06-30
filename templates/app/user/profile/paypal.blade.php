@extends('app.user.dashboard')

@section('profile')

    <h2 class="fw-bold">Coordonnées paypal</h2>

    <div class="col-sm-10 mt-4">
        <form action="{{ route('user.profile.paypal.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('paypal_name') is-invalid @enderror" id="paypal_name" placeholder="" name="paypal_name" value="{{ $profile->paypal_name }}">
                            @error('paypal_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label for="paypal_name">Votre nom sur paypal</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('paypal_email') is-invalid @enderror" id="paypal_email" placeholder="" name="paypal_email" value="{{ $profile->paypal_email }}">
                        @error('paypal_email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="paypal_email">Votre adresse mail sur paypal</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" class="btn btn-success" value="Modifier mes informations">
            </div>
        </form>
    </div>

@endsection