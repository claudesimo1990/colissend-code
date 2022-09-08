@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container px-4 px-lg-5 mt-5">

        <div class="my-5">
            <h2 class="fw-bold text-center">Votre Panier</h2>
        </div>

        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">

                <shopping-cart></shopping-cart>

                <div class="card mb-4">
                    <div class="card-body py-2">
                        <p><strong>Possible date de livraison</strong></p>
                        <p class="mb-0">{{ formatDate(now()) }} - {{ formatDate(now()->addDay(3)) }}</p>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body py-2">
                        <p><strong>Nous acceptons</strong></p>
                        <i class="bx bxl-visa big-icon"></i>
                        <i class="bx bxl-mastercard big-icon"></i>
                        <i class="bx bxl-paypal big-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Details de la facture</h5>
                    </div>
                    <div class="card-body py-2">

                        <total-to-pay></total-to-pay>

                        <a href="{{ route('shop.cart.by') }}" type="button" class="btn btn-success btn-lg btn-block w-100">
                            Proceder au payment
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
