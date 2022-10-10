@extends('app.layout.layout')

@section('title')col-6issend | Comment ca marche @endsection

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
                                <a class="nav-link @if($id == 'travel')active @endif" aria-current="page" href="{{ route('more') . '?key=travel' }}">Je souhaite transporter un colis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($id == 'pack')active @endif" href="{{ route('more') . '?key=pack' }}">Je souhaite expédier un colis</a>
                            </li>
                        </ul>
                        <div class="accordion accordion-flush mt-5">
                            @if($id == 'travel')
                                <div class="row">
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-people" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Créer gratuitement votre compte</h3>
                                            <p class="text-wrap w-75 text-start">Pour créer son compte sur qui-go.com, rien de plus simple,que ce soit avec votre compte Facebook, Gmail ou via l'adresse mail de votre choix</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-globe2" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Publiez votre annonce de voyage</h3>
                                            <p class="text-wrap w-75 text-start">Vous pouvez poster une annonce depuis le menu principal. Pour cela, il suffit de vous connecter, puis , depuis le menu principal, cliquer sur Voyageur, puis ajouter un voyage</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-pencil-square" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Remplissez les formalites</h3>
                                            <p class="text-wrap w-75 text-start">Il vous suffit ensuite de remplir les information sur votre voyage puis sur la façon dont vous souhaitez gérer les col-6is. les expéditeurs intéressés réserveront directement en ligne et vous serez prévenu par mail</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-currency-exchange" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Percevez votre commission</h3>
                                            <p class="text-wrap w-75 text-start">Les paiements sont effectués aux voyageurs une fois la livraison du col-6is confirmée. Paiements par virement, PayPal, Orange ou MTN Money.</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-box" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Récupérez puis livrez le colis de l’expéditeur</h3>
                                            <p class="text-wrap w-75 text-start">Que ce soit par l'intermédiaire de Qui-Go ou directement avec le voyageur, vous devez vous coordonner et définir d’un RDV pour récupérer puis pour livrer le col-6is</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-chat" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Laissez un commentaire</h3>
                                            <p class="text-wrap w-75 text-start">Et surtout n’oubliez pas de nous laisser un commentaire sur votre expérience Qui-Go. C’est grâce à vous que nous pouvons améliorer le service</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-people" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Créer gratuitement votre compte</h3>
                                            <p class="text-wrap w-75 text-start">Pour créer son compte sur qui-go.com, rien de plus simple,que ce soit avec votre compte Facebook, Gmail ou via l'adresse mail de votre choix</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-search" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Recherchez une annonce</h3>
                                            <p class="text-wrap w-75 text-start">Vous trouverez toutes les annonces sur la page d'accueil de notre site, et pourrez appliquer les filtres que vous souhaitez pour trouver le voyage correspondant à votre besoin</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-pencil-square" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Remplissez les formalites</h3>
                                            <p class="text-wrap w-75 text-start">Il vous suffit ensuite de remplir les information sur votre voyage puis sur la façon dont vous souhaitez gérer les col-6is. les expéditeurs intéressés réserveront directement en ligne et vous serez prévenu par mail</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-currency-exchange" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Réglez votre commande</h3>
                                            <p class="text-wrap w-75 text-start">Payez votre commande (par Carte bancaire , PayPal, MTN Mobile Money, Orange Money) et récupérez le numéro de contact du voyageur</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-check-circle-fill" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Confirmez la bonne réception de votre colis</h3>
                                            <p class="text-wrap w-75 text-start">Une fois votre colis reçu, validez sa bonne livraison auprès de nous. Le voyageur pourra ainsi percevoir sa commission</p>
                                        </div>
                                    </div>
                                    <div class="col-6 small">
                                        <div class="how-it-work-block text-start">
                                            <i class="bi bi-chat" style="font-size: 50px;color: green;"></i>
                                            <h3 class="fw-bold w-75">Laissez un commentaire</h3>
                                            <p class="text-wrap w-75 text-start">Et surtout n’oubliez pas de nous laisser un commentaire sur votre expérience Colissend. C’est grâce à vous que nous pouvons améliorer le service</p>
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
