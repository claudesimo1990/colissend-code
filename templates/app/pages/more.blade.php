@extends('app.layout.layout')

@section('title')Colissend | Comment ca marche @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <x-header page="page-howItWork" img="" title="{{ $title }}"/>

    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="section-title mb-0 dashboard">
                    <div class="activity">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link @if($id == 'travel')active @endif" aria-current="page" href="{{ route('more') . '?key=travel' }}">Poster un voyage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($id == 'pack')active @endif" href="{{ route('more') . '?key=pack' }}">Poster un coli</a>
                            </li>
                        </ul>
                        <div class="accordion accordion-flush mt-5">
                            @if($id == 'travel')
                                <div class="row py-3">
                                    <div class="col-sm-12 col-xs-12 col-lg-3">
                                        <div class="how-it-work-block">
                                            <i class="bi bi-people" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold">Créer gratuitement votre compte</h3>
                                            <p class="text-justify">Pour créer son compte sur qui-go.com, rien de plus simple,que ce soit avec votre compte Facebook, Gmail ou via l'adresse mail de votre choix</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 col-lg-3">
                                        <div class="how-it-work-block">
                                            <i class="bi bi-pencil-square" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold">Remplissez les formalites</h3>
                                            <p class="text-wrap">Il vous suffit ensuite de remplir les information sur votre voyage puis sur la façon dont vous souhaitez gérer les colis. les expéditeurs intéressés réserveront directement en ligne et vous serez prévenu par mail</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 col-lg-3">
                                        <div class="how-it-work-block">
                                            <i class="bi bi-phone-vibrate" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold">Récupérez puis livrez le colis de l’expéditeur</h3>
                                            <p class="text-wrap">Que ce soit par l'intermédiaire de Qui-Go ou directement avec le voyageur, vous devez vous coordonner et définir d’un RDV pour récupérer puis pour livrer le colis</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 col-lg-3">
                                        <div class="how-it-work-block">
                                            <i class="bi bi-currency-exchange" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold">Publiez votre annonce de voyage</h3>
                                            <p class="text-wrap">Vous pouvez poster une annonce depuis le menu principal. Pour cela, il suffit de vous connecter, puis , depuis le menu principal, cliquer sur Voyageur, puis ajouter un voyage</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 col-lg-3">
                                        <div class="how-it-work-block">
                                            <i class="bi bi-currency-exchange" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold">Percevez votre commission</h3>
                                            <p class="text-wrap">Les paiements sont effectués aux voyageurs une fois la livraison du colis confirmée. Paiements par virement, PayPal, Orange ou MTN Money.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 col-lg-3">
                                        <div class="how-it-work-block">
                                            <i class="bi bi-currency-exchange" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold">Laissez un commentaire</h3>
                                            <p class="text-wrap">Et surtout n’oubliez pas de nous laisser un commentaire sur votre expérience Qui-Go. C’est grâce à vous que nous pouvons améliorer le service</p>
                                        </div>
                                    </div>
                                </div>
                            @else
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
