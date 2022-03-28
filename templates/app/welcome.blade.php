@extends('app.layout.layout')

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
                                    <i class="bi bi-emoji-heart-eyes" style="font-size: 50px;color: green;"></i>
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
                                    <i class="bi bi-file-lock2-fill" style="font-size: 50px;color: green;"></i>
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
                                    <i class="bi bi-person-check-fill" style="font-size: 50px;color: green;"></i>
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
                                        <i class="bx bxs-plane-take-off" style="font-size: 25px;color: green;"></i>
                                    @else
                                        <i class="bi bi-box-seam" style="font-size: 25px;color: green;"></i>
                                    @endif
                                </div>
                                <div class="time">
                                    <span class="small">{{ $post->updated_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="user-image mt-2">
                                <img src="{{ $post->user->avatar }}" class="rounded-circle" width="50" height="50" alt="{{ $post->user->name }} - avatar">
                            </div>
                            <div class="user-content">
                                <h5 class="mb-0">{{ $post->user->name }}</h5> <span>{{ $post->user->email }}</span>
                                <p>{{ Illuminate\Support\str::limit($post->content, $limit = 150, $end = '...') }}</p>
                            </div>
                            <div class="d-flex justify-content-between text-center">
                                <div>
                                    <i class="bx bxs-plane-take-off home-icon"></i>
                                    <div class="">{{ $post->from }}</div>
                                    <div class="">{{ formatDate($post->dateFrom) }}</div>
                                </div>
                                <div>
                                    <i class="bx bxs-plane-land home-icon"></i>
                                    <div class="">{{ $post->to }}</div>
                                    <div class="">{{ formatDate($post->dateTo) }}</div>
                                </div>
                            </div>
                            <div class="badge bg-success-light text-center text-black-50 m-3">
                                @if($post->type == 'TRAVEL')
                                    <div class="d-flex justify-content-between">
                                        <span>{{ $post->kilo }} kg encore disponibles</span>
                                        <span><i class="bi bi-forward"></i></span>
                                        <span>{{ $post->price }}<i class="bi bi-currency-euro"></i>/kg</span>
                                    </div>
                                @else
                                    Estimation du poids du colis à {{ $post->kilo }} kg
                                @endif
                            </div>
                            <div class="ratings mb-5">
                                @if($post->type == 'TRAVEL')
                                    <span class="badge border-info border-1 text-secondary">Objects acceptés :</span>
                                @else
                                    <span class="badge border-info border-1 text-secondary">Objects à transporter :</span>
                                @endif
                                @foreach($post->objects as $obj)
                                    @if($obj->value == true)
                                        <span class="badge border-success border-1 text-{{ $obj->color }}">{{ $obj->name }}{{ $post->count > 0 ? 'x' . $post->count  : '' }}</span>
                                    @endif
                                @endforeach
                            </div>
                            @if($post->type == 'TRAVEL')
                                <a href="{{ route('posts.show', ['slug' =>  $post->slug]) }}" class="btn btn-success d-flex flex-column justify-content-center align-items-center position-absolute bottom-0 my-4">Contacter le voyageur</a>
                            @else
                                <a href="{{ route('posts.show', ['slug' =>  $post->slug]) }}" class="btn btn-success d-flex flex-column justify-content-center align-items-center position-absolute bottom-0 my-4">Contacter l'expediteur</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                        <div class="col-sm-12 col-xs-12 col-lg-6">
                            <div class="card" style="min-height: 200px">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $howItWork['title'] }}</h5>
                                    <p class="card-text">{{ $howItWork['text'] }}</p>
                                    <a href="{{ route($howItWork['link'], ['id' => $howItWork['id']]) }}" class="btn btn-success">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>

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
                            <img src="{{ asset($destination['image']) }}" class="d-block w-100" alt="{{ $destination['name'] }}-img">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="text-uppercase fw-bolder">{{ $destination['name'] }}</h2>
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

@endsection
