@extends('app.user.dashboard')

@section('profile')

    <h2 class="fw-bold">Mon profil</h2>

    <div class="list-group">
        <a href="{{ route('user.friend.invitation') }}" type="button" class="list-group-item list-group-item-action my-2 w-50 d-flex justify-content-between"><i class="bi bi-people"></i><span>inviter un ami</span><i class="bi bi-arrow-right"></i></a>
        <a href="{{ route('user.profile.edit') }}" type="button" class="list-group-item list-group-item-action my-2 w-50 d-flex justify-content-between"><i class="bi bi-info-circle"></i><span>Informations personnelles</span><i class="bi bi-arrow-right"></i></a>
        <a href="{{ route('user.profile.bank') }}" type="button" class="list-group-item list-group-item-action my-2 w-50 d-flex justify-content-between"><i class="bi bi-bank"></i><span>Coordonnées bancaires</span><i class="bi bi-arrow-right"></i></a>
        <a href="{{ route('user.profile.paypal') }}" type="button" class="list-group-item list-group-item-action my-2 w-50 d-flex justify-content-between"><i class="bx bxl-paypal"></i><span>Paypal</span><i class="bi bi-arrow-right"></i></a>
        <a href="{{ route('user.profile.password') }}" type="button" class="list-group-item list-group-item-action my-2 w-50 d-flex justify-content-between"><i class="bi bi-key"></i><span>Mot de passe</span><i class="bi bi-arrow-right"></i></a>
        <a href="{{ route('user.profile.detail') }}" type="button" class="list-group-item list-group-item-action my-2 w-50 d-flex justify-content-between"><i class="bi bi-person"></i><span>Voir mon profil public</span><i class="bi bi-arrow-right"></i></a>
    </div>

@endsection