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
                <div class="col-xs-12 col-sm-12 col-lg-4 mb-5">
                    <div class="card h-100">

                        @php
                            $media = $product->getMedia('products')->first();
                            $img = $media('thumb')
                        @endphp

                        {{ $img }}

                        <div class="card-body">
                            <p class="text-small my-2">{{ $product->description }}</p>
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <span class="fw-bold">{{ $product->formatted_price }}</span>
                            </div>
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <form action="{{ route('shop.product.addToCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product" value="{{  $product->id }}">
                                    <button type="submit" class="btn btn-outline-dark mt-auto">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                        {{-- <add-to-cart :product-id="{{ $product->id }}"></add-to-cart>--}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $products->links('pagination.custom') }}
        </div>
    </div>

@endsection
