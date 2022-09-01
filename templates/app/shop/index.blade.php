@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
    <link rel="stylesheet" href="{{ mix('css/shop.css') }}">
@endsection

@section('app')

    <div class="container px-lg-5 mt-5">

        <div class="my-5">
            <h2 class="fw-bold text-center">Quelques nouveaux produits</h2>
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-xs-12 col-sm-12 col-lg-3 mb-5 card-deck">

                    <div class="card">
                        @php
                            $media = $product->getMedia('products')->first();
                            $img = $media('thumb')
                        @endphp

                        {{ $img }}
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }} - {{ $product->formatted_price }}</h5>
                            <p class="card-text small">{{ Str::limit($product->description, 100, ' ...') }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <form action="{{ route('shop.product.addToCart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product" value="{{  $product->id }}">
                                <button type="submit" class="btn btn-success">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $products->links('pagination.custom') }}
        </div>
    </div>

@endsection
