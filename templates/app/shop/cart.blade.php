@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container px-4 px-lg-5 mt-5">

        <div class="my-5">
            <h2 class="fw-bold text-center">Votre Panier</h2>
        </div>

{{--        <div class="row d-flex justify-content-center align-items-center h-100">--}}
{{--            <div class="col-10">--}}
{{--                @forelse(Cart::session(Auth()->user()->id)->getContent() as $item)--}}

{{--                    <div class="card rounded-3 mb-4">--}}
{{--                        <div class="card-body p-4">--}}
{{--                            <div class="row d-flex justify-content-between align-items-center">--}}
{{--                                <div class="col-md-2 col-lg-2 col-xl-2">--}}



{{--                                </div>--}}
{{--                                <div class="col-md-3 col-lg-3 col-xl-3">--}}
{{--                                    <p class="lead fw-normal mb-2">{{ $item->name }}</p>--}}
{{--                                    <p>{{ $item->associatedModel->description }}</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">--}}
{{--                                    <button class="btn btn-link px-2"--}}
{{--                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">--}}
{{--                                        <i class="bx bx-minus"></i>--}}
{{--                                    </button>--}}

{{--                                    <input id="form1" min="0" name="quantity" value="2" type="number"--}}
{{--                                           class="form-control form-control-sm" />--}}

{{--                                    <button class="btn btn-link px-2"--}}
{{--                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">--}}
{{--                                        <i class="bx bx-plus"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">--}}
{{--                                    <h4 class="mb-0 fw-bold">{{ $item->associatedModel->formatted_price }}</h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">--}}
{{--                                    <a href="#!" class="text-danger"><i class="bx bx-trash bx-lg"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                @empty--}}

{{--                @endforelse--}}
{{--                <div class="card">--}}
{{--                    <button type="button" class="btn btn-success btn-block w-100">Proceed to Pay</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <h6 class="mb-0 text-muted">{{ Cart::session(auth()->user()->id)->getContent()->count() }} Articles</h6>
                                    <hr class="my-4">

                                    @forelse(Cart::session(Auth()->user()->id)->getContent() as $item)
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                @php
                                                /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $media */
                                                    $media = $item->associatedModel->getMedia('products')->first();
                                                    $media->setAttribute('class', 'responsive');
                                                    $img = $media('thumb')
                                                @endphp

                                                {{ $img }}

                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">{{ $item->name }}</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="{{ $item->quantity }}" type="number"
                                                       class="form-control form-control-sm" />

                                                <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">{{ $item->associatedModel->formatted_price }}</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    @empty
                                        <p>Aucun aticle trouve</p>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-lg-4 bg-success-light">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h4 class="text-uppercase fw-bold">items 3</h4>
                                        <h4 class="fw-bold">€ 132.00</h4>
                                    </div>

                                    <h5 class="text-uppercase mb-3">Shipping</h5>

                                    <div class="mb-4 pb-2">
                                        <select class="form-select">
                                            <option value="1">Standard-Delivery- €5.00</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                        </select>
                                    </div>

                                    <h5 class="text-uppercase mb-3">Give code</h5>

                                    <div class="mb-5">
                                        <div class="form-group">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h4 class="text-uppercase fw-bold">Total price</h4>
                                        <h4 class="fw-bold">{{ Cart::session(Auth()->user()->id)->getTotal()/100 }}€</h4>
                                    </div>

                                    <button type="button" class="btn btn-success btn-block btn-lg"
                                            data-mdb-ripple-color="dark">Proceder au payement</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
