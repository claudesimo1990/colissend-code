@extends('app.user.dashboard')

@section('profile')
    <div class="row">
        <div class="col-lg-3">
            <div class="card info-card sales-card">
                <div class="card-body my-2">
                    <div class="d-flex align-items-center flex-column">
                        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center text-success">0</div>
                        <div class="ps-3">
                            <span class="text-secondary  text-uppercase">Annonce voyage EN COURS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card info-card sales-card">
                <div class="card-body my-2">
                    <div class="d-flex align-items-center flex-column">
                        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center text-success">0</div>
                        <div class="ps-3">
                            <span class="text-secondary  text-uppercase">Annonce colis EN COURS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card info-card sales-card">
                <div class="card-body my-2">
                    <div class="d-flex align-items-center flex-column">
                        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center text-success">
                            30 <i class="bi bi-currency-euro text-success"></i>
                        </div>
                        <div class="ps-3">
                            <span class="text-secondary text-uppercase">SOMME GAGNÉ EN {{ now()->translatedFormat('F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card info-card sales-card">
                <div class="card-body my-2">
                    <div class="d-flex align-items-center flex-column">
                        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center text-success">
                            80 <i class="bi bi-currency-euro text-success"></i>
                        </div>
                        <div class="ps-3">
                            <span class="text-secondary  text-uppercase">SOMME GAGNÉ EN {{ now()->format('Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 m-2">
            <div class="row">
                <div class="col-md-12 card p-2">
                    <div class="card-header d-flex justify-content-between">
                        <h6 class="title text-dark fw-bold">Mes annonces en cours de livraison</h6>
                        <a href="#" class="title">Voir toutes mes annonces</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p>Aucune annonce en cours</p>
                            <a href="" class="btn btn-success rounded-pill">Ajouter une annonce</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 card p-2">
                    <div class="card-header d-flex justify-content-between">
                        <h6 class="title text-dark fw-bold">Mes Livraisons en cours</h6>
                        <a href="#" class="title">Voir toutes mes Livraisons</a>
                    </div>
                    <div class="card-body py-2">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <p>Aucune livraison en cours</p>
                            <a href="" class="btn btn-success rounded-pill">Rechercher un coli</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="title text-dark fw-bold">Mon Profil</h6>
                <a href="{{ route('user.profile.edit') }}" class="title text-decoration-underline">Modifier</a>
            </div>
            <div class="card-body">
                <div class="row mt-5">
                    <div class="d-flex  flex-column justify-content-center align-items-center">
                        <img src="{{ !is_null(Auth::user()->getFirstMedia('avatar')) ? Auth::user()->getFirstMedia('avatar')->getUrl('thumb') : asset('images/colissend/default.svg') }}" class="rounded-circle text-center" alt="{{ Auth::user()->name }}" style="width: 100px">
                        <div class="my-2 fw-bold">{{ $profile->firstname }}</div>
                        <span class="d-flex  small gap-1">
                            <i class="bx bx-user-check"></i>
                            <span>Email vérifié</span>
                        </span>
                        <span class="d-flex small gap-1">
                            <i class="bx bx-user-check"></i>
                            <span>Téléphone vérifié</span>
                        </span>
                        <div class="d-flex gap-1 small text-danger">
                            <i class="bx bxs-user-check"></i>
                            <span>Pièce d'identité non vérifiée</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card-body border mt-5 py-4 bottom-0">
                <div class="d-flex justify-content-between">
                    <h6 class="title text-dark fw-bold d-flex flex-column fw-bold"><span>Mes trajets </span><span>0</span></h6>
                    <a href="#" class="title">Voir tous mes trajets</a>
                </div>
            </div>
        </div>
    </div>
@endsection