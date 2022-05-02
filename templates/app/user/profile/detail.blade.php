@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mon profil public</h2>

    <div class="col-sm-8 mt-4 bg-white py-2">
        <div class="logo d-flex gap-5 text-center m-4">
            <img src="{{ !is_null($profile->getFirstMedia('avatar')) ? $profile->getFirstMedia('avatar')->getUrl('thumb') : $profile->avatar ?? asset('images/colissend/default.svg') }}" alt="{{ $profile->firstname }}">
            <div class="name">
                <h4 class="fw-bold">{{ $profile->firstname }}</h4>
                <h4 class="fw-bold">{{ $profile->lastname }}</h4>
            </div>
        </div>
        <hr>
        <div class="info m-4">
            <div>
                @if($profile->phone_verify_at)
                    <i class="bi bi-check bg-success text-white rounded mx-2"></i>
                @else
                    <i class="bi bi-check bg-danger text-white rounded mx-2"></i>
                @endif
                Téléphone vérifié
            </div>
            @if(is_null($profile->confirmation_token))
                <i class="bi bi-check bg-success text-white rounded mx-2"></i>
            @else
                <i class="bi bi-check bg-danger text-white rounded mx-2"></i>
            @endif
            Email vérifié
            <hr>
            <div class="fw-bold mx-2 my-2">Dernière connexion le {{ \Carbon\Carbon::parse($profile->last_connexion)->format('d/m/Y') }}</div>
        </div>
    </div>

@endsection