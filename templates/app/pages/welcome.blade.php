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
                <h2>@lang('site.how_use_colissend')</h2>
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

        <div class="container text-center">

            <div class="title text-center mb-5">
                <h2>Comment ça marche ?</h2>
            </div>

                <div class="row py-3">
                    <div class="col-sm-12 col-xs-12 col-lg-6">
                        <div class="how-it-work-block">
                            <i class="bi bi-people" style="font-size: 50px;color: green;"></i>
                            <h3 class="fw-bold">Créer gratuitement votre compte</h3>
                            <p class="text-justify">Pour créer son compte sur qui-go.com, rien de plus simple,que ce soit avec votre compte Facebook, Gmail ou via l'adresse mail de votre choix</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6">
                        <div class="how-it-work-block">
                            <i class="bi bi-pencil-square" style="font-size: 50px;color: green;"></i>
                            <h3 class="fw-bold">Placer votre annonce</h3>
                            <p class="text-wrap">Pour publier une annonce de voyage veuillez clicquer sur le lien <a href="{{ route('posts.travel.create') }}">Proposer un trajet</a></p>
                            <p class="text-wrap">Pour publier une annonce de transport de colis le lien est <a href="{{ route('posts.coli.create') }}">Expedier un colis</a></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6">
                        <div class="how-it-work-block">
                            <i class="bi bi-phone-vibrate" style="font-size: 50px;color: green;"></i>
                            <h3 class="fw-bold">Recevoir des propositions</h3>
                            <p class="text-wrap">Avec Colissend, lorsque vous publiez votre annonce, elle est visible par de potentiels expéditeurs qui pourront vous contacter directement.</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6">
                        <div class="how-it-work-block">
                            <i class="bi bi-currency-exchange" style="font-size: 50px;color: green;"></i>
                            <h3 class="fw-bold">Percevez votre commission</h3>
                            <p class="text-wrap">Pour plus de tranquilité pour le voyageur et l'expéditeur,les fonds sont débloqués à reception du colis</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('more') }}" class="btn btn-success">En savoir plus</a>

            </div>
    </section>

    @if(count($destinations) > 0)
        <section class="text-center py-4 my-4">

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

    @if($blogs->count())
        <section class="my-4 py-4 bg-success-light">

            <div class="container">

                <div class="title text-center mb-5">
                    <h2>Quelques dernieres informations de notre Blog</h2>
                </div>

                <div class="row py-5">
                    @foreach($blogs as $key => $blog)
                        <div class="col-xs-12 col-sm-12 col-lg-4 card-deck">
                            <div class="card" style="min-height: 300px">
                                <div class="card-body">
                                    <a href="{{ route('blog.show', ['blog' => $blog]) }}">
                                        <h1 class="card-title fw-bolder blog-title">{{ $blog->title }}</h1>
                                    </a>

                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="date small text-dark text-muted">{{ formatDate($blog->created_at) }}</div>
                                        <div class="autor small text-dark fw-bold">Auteur Simo Claude</div>
                                    </div>

                                    <div class="card-text">{{ Str::limit(nl2br($blog->content), 120) }}</div>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="pt-4">
                                        <span class="text-muted position-absolute bottom-0"><i class="bi bi-chat text-dark mx-2"></i>{{ $key + 4 }} commentaires</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
            @endif


    <section class="text-center py-4 my-4">
        <div class="container py-4 my-4">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12 text-center d-flex align-items-center justify-content-between flex-column">
                    <div>
                        <span class="fs-4 text-success ls-md text-uppercase fw-bold">Colissend</span>
                        <h2 class="display-3 mt-4 mb-3 fw-bold">Rejoigner notre newsletter</h2>
                        <p class="lead px-lg-8 mb-6 fw-bold">Pour ne pas manquer les annonces en temps reel</p>
                    </div>

                    <form action="" class="d-flex align-items-center justify-content-between flex-column">
                        <div class="form-group text-center">
                            <input type="text" class="form-control lead px-lg-8 mb-6" name="email" placeholder="Tapez votre adresse mail..">
                        </div>

                        <div class="mt-4">
                            <a href="#" class="btn btn-success">Envoyer</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
