@extends('app.layout.layout')

@section('app')

    @section('header') @include('app.include.header')

@endsection

<section class="py-4">
    <div class="row container-fluid">
        <div class="title text-center mb-5">
            <h2>Pourquoi choisir Colissend ?</h2>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body pb-0 text-center">
                        <div class="">
                            <div class="post-item clearfix">
                                <i class="bi bi-emoji-heart-eyes" style="font-size: 50px;color: green;"></i>
                                <h2 class="mb-2">Confortable</h2>
                                <p>Du bestellst dein Auto komplett online. Wir liefern dir deinen neuen Gebrauchten bis nach Hause oder an einen Abholstandort in deiner Nähe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body pb-0 text-center">
                        <div class="">
                            <div class="post-item clearfix">
                                <i class="bi bi-file-lock2-fill" style="font-size: 50px;color: green;"></i>
                                <h2 class="mb-2">Sûre</h2>
                                <p>Du bestellst dein Auto komplett online. Wir liefern dir deinen neuen Gebrauchten bis nach Hause oder an einen Abholstandort in deiner Nähe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body pb-0 text-center">
                        <div class="">
                            <div class="post-item clearfix">
                                <i class="bi bi-person-check-fill" style="font-size: 50px;color: green;"></i>
                                <h2 class="mb-2">Individuel</h2>
                                <p>Du bestellst dein Auto komplett online. Wir liefern dir deinen neuen Gebrauchten bis nach Hause oder an einen Abholstandort in deiner Nähe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4 bg-success-light">
    <div class="row container-fluid" id="carouselExampleIndicators">
        <div class="title text-center">
            <h2>Les dernieres annonces</h2>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-3 col-sm-12">
                    <div class="card p-3 text-center" style="min-height: 600px">
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
                            <img src="{{ $post->user->avatar }}" class="rounded-circle" width="80">
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
                        <div class="badge bg-success m-3">
                            @if($post->type == 'TRAVEL')
                                {{ $post->kilo }} kg encore disponibles
                            @else
                                Estimation du poids du colis à {{ $post->kilo }} kg
                            @endif
                        </div>
                        <div class="ratings">
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
                        <div class="position-absolute bottom-0 m-5 text-center">
                            @if($post->type == 'TRAVEL')
                                <a href="{{ route('posts.show', ['slug' =>  $post->slug]) }}" class="btn btn-success">Contacter le voyageur</a>
                            @else
                                <a href="{{ route('posts.show', ['slug' =>  $post->slug]) }}" class="btn btn-success">Contacter l'expediteur</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="my-4 py-4">
        <div class="row container-fluid">
            <div class="title text-center mb-5">
                <h2>Ce que pensent nos utilisateurs</h2>
            </div>
            <div class="row">
                @foreach($testimonials as $testimonial)
                    <div class="col-md-4">
                        <div class="card p-3 text-center">
                            <div class="user-image"><img src="{{ asset($testimonial['avatar']) }}" class="rounded-circle" width="80"></div>
                            <div class="user-content">
                                <h5 class="mb-0">{{ $testimonial['name'] }}</h5> <span><i class="bi bi-pin-map-fill"></i> {{ $testimonial['city'] }}</span>
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
    <div class="row container-fluid">

        <div class="title text-center mb-5">
            <h2>Comment ça marche ?</h2>
        </div>

            <div class="row">
                @foreach($howItWorks as $howItWork)
                    <div class="col-sm-12 col-xs-12 col-lg-6">
                        <div class="card">
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
                            <img src="{{ asset($destination['image']) }}" class="d-block w-100" alt="...">
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
