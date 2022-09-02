@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/homeController.css') }}">
@endsection

@section('app')

    @section('header') @include('app.include.header')

@endsection

    <section class="py-4">

        <div class="container">

            <div class="title text-center mb-5">
                <h2>Pourquoi choisir Colissend ?</h2>
            </div>

            <div class="row py-5">

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card" style="min-height: 100%">
                        <div class="card-body pb-0 text-center">
                            <div class="">
                                <div class="post-item clearfix">
                                    <i class="bi bi-credit-card" style="font-size: 50px;color: green;"></i>
                                    <h2 class="mb-2">Paiement sécurisé</h2>
                                    <p>Colissend vous propose des solutions de paiement sécurisées pour vos transactions telles que Orange Money, MTN Money, PayPal ou encore le paiement par carte bancaire.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card" style="min-height: 100%">
                        <div class="card-body pb-0 text-center">
                            <div class="">
                                <div class="post-item clearfix">
                                    <i class="bi bi-box" style="font-size: 50px;color: green;"></i>
                                    <h2 class="mb-2">Livraison rapide</h2>
                                    <p>Utiliser Colissend, c'est la garantie que votre colis ou courrier arrive à destination en 1 ou 2 jours après son départ du pays d'expédition.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card" style="min-height: 100%">
                        <div class="card-body pb-0 text-center">
                            <div class="">
                                <div class="post-item clearfix">
                                    <i class="bi bi-people" style="font-size: 50px;color: green;"></i>
                                    <h2 class="mb-2">Une équipe à votre service</h2>
                                    <p>Colissend, c'est vous , et c'est aussi une équipe disponible pour simplifier au maximum vos transactions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    @if(count($posts) > 0)
        <section class="py-4 bg-success-light">

            <div class="container" id="carouselExampleIndicators">

                <div class="title text-center mb-5">
                    <h2>Les dernieres annonces</h2>
                </div>

                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 col-sm-12 my-2">
                            <div class="card p-3 text-center" style="min-height: 100%">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="ratings">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div>
                                        @if($post->type == 'TRAVEL')
                                            Vente de kilos
                                        @else
                                            Envoi de Coli
                                        @endif
                                    </div>
                                    <div class="time">
                                        <span class="small">{{ $post->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="user-image mt-2">
                                    <img src="{{ !empty($post->user->getFirstMediaUrl('avatar', 'avatar')) ? $post->user->getFirstMediaUrl('avatar', 'avatar') : asset('images/colissend/default.svg') }}" class="rounded-circle" alt="{{ $post->user->name }} - avatar">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0 fw-bold">{{ $post->user->name }}</h5>
                                </div>
                                <div class="d-flex justify-content-between text-center">
                                    <div>
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <div class="">{{ $post->from }}</div>
                                        <div class="">{{ formatDate($post->dateFrom) }}</div>
                                    </div>
                                    <div>
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <div class="">{{ $post->to }}</div>
                                        <div class="">{{ formatDate($post->dateTo) }}</div>
                                    </div>
                                </div>
                                <div class="badge text-start text-black-50 mt-3 mb-3">
                                    @if($post->type == 'TRAVEL')
                                        <h4 class="fw-bolder">Details:</h4>
                                        <div class="d-flex justify-content-between bg-success-light mb-1">
                                            <h4 class="fw-bold"><i class="bi bi-bag-check-fill mx-2"></i>{{ $post->kilo }} kg</h4>
                                            <span>............................</span>
                                            <h4 class="fw-bold">{{ $post->price }}<i class="bi bi-currency-euro"></i>/kg</h4>
                                        </div>
                                    @if($post->objects->courrier->status)
                                        <div class="d-flex justify-content-between bg-success-light mb-1">
                                            <h4 class="fw-bold"><i class="bi bi-envelope-fill mx-2"></i>x{{ $post->objects->courrier->number }}</h4>
                                            <span>............................</span>
                                            <h4 class="fw-bold">{{ $post->objects->courrier->price }}<i class="bi bi-currency-euro"></i>/<i class="bi bi-envelope-fill mx-2"></i></h4>
                                        </div>
                                    @endif
                                    @else
                                        <h4 class="fw-bolder">Objects à transporter :</h4>
                                        @foreach($post->objects as $obj)
                                            <div class="d-flex justify-content-between bg-success-light mb-1">
                                                <h4 class="fw-bold">{{ $obj->name }} <span class="small fw-bold mx-2">x{{ $obj->quantity }}</span>.......<span class="fw-bold mx-2">Poids: 10kg</span></h4>
                                                <span> ........ </span>
                                                <h4 class="fw-bolder">{{ $obj->price }}<i class="bi bi-currency-euro text-dark fw-bolder"></i>/kg</h4>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="ratings mb-3 text-start small">
                                    <p><span class="fw-bolder">Message: </span>{{ Illuminate\Support\str::limit($post->content, $limit = 150, $end = '...') }}
                                </div>
                                @if($post->type == 'TRAVEL')
                                    <a href="{{ route('posts.show', ['slug' =>  $post->slug]) }}" class="btn btn-success d-flex justify-content-center align-items-center position-absolute bottom-0 my-4">Contacter le voyageur</a>
                                @else
                                    <a href="{{ route('posts.show', ['slug' =>  $post->slug]) }}" class="btn btn-success d-flex justify-content-center align-items-center position-absolute bottom-0 my-4">Contacter l'expediteur</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="my-4 py-4">
            <div class="container">
                <div class="title text-center mb-5">
                    <h2>Ce que pensent nos utilisateurs</h2>
                </div>
                <div class="row py-5">
                    @foreach($testimonials as $testimonial)
                        <div class="col-md-4">
                            <div class="card p-3 text-center">
                                <div class="user-image"><img src="{{ asset($testimonial['avatar']) }}" class="rounded-circle" width="80" alt="{{ $testimonial['name'] }} - testimonials"></div>
                                <div class="user-content">
                                    <h5 class="mb-0">{{ $testimonial['name'] }}
                                    </h5><span><i class="bi bi-pin-map-fill"></i>{{ $testimonial['city'] }}</span>
                                    <div class="my-2"><strong>{{ $testimonial['title'] }}</strong></div>
                                    <p>{{ $testimonial['message'] }}</p>
                                </div>
                                <div class="ratings"> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i> <i class="bi bi-star"></i></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    <section class="my-4 py-4 bg-success-light">

        <div class="container">

            <div class="title text-center mb-5">
                <h2>Comment ça marche ?</h2>
            </div>

                <div class="row py-5">
                    @foreach($howItWorks as $howItWork)
                        <div class="col-sm-12 col-xs-12 col-lg-3">
                            <div class="card text-center" style="height: 300px">
                                <div class="card-title">
                                    <h5 class="card-title">{{ $howItWork['title'] }}</h5>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="card-text small">{{ $howItWork['text'] }}</div>
                                    <a href="{{ route($howItWork['link'], ['id' => $howItWork['id']]) }}" class="btn btn-success" style="position: absolute;bottom: 20px">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>

    @if(count($destinations) > 0)
        <section class="text-center">

            <div class="container">

                <div class="title text-center mb-5">
                    <h2>Destinations preférées de nos utilisateurs</h2>
                </div>

                <div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach($destinations as $key => $destination)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ $destination->getFirstMediaUrl('galleries', 'destinations') }}" width="" height="" class="" alt="{{ $destination->title }}-img">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2 class="text-uppercase fw-bolder">{{ $destination->title }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">précedent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">suivant</span>
                    </button>
                </div>
            </div>
        </section>
    @endif

@endsection
