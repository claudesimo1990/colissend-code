@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container px-4 px-lg-5 mt-5">

        <div class="my-5">
            <h2 class="fw-bold text-center">Proceder au payment</h2>
        </div>

        <form action="{{ route('shop.cart.checkout') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Adresse de livraison</h5>
                        </div>
                        <div class="card-body py-2">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="street">Rue</label>
                                        <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" />
                                        @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="street_number">N°</label>
                                        <input type="text" name="number" id="form7Example2" class="form-control @error('number') is-invalid @enderror"/>
                                        @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="postal">Boite Postal</label>
                                        <input type="text" name="postal" id="postal" class="form-control @error('postal') is-invalid @enderror"/>
                                        @error('postal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="city">Ville</label>
                                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"/>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">N° Telephone</label>
                                        <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"/>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Details de la facture</h5>
                        </div>
                        <div class="card-body">

                            <total-to-pay></total-to-pay>

                            <button type="submit" class="btn btn-outline-success btn-lg btn-block w-100">
                                payer avec paypal <i class="bx bxl-paypal"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
