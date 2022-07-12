@extends('app.user.dashboard')

@php
$type = app()->request->get('type');
$reservations = $post->reservations()->paginate(3);
@endphp

@section('back-button')
    <div class="row mb-2 fw-bold">
        <a href="{{ $type == 'TRAVEL' ? route('user.posts.travels') : route('user.posts.packs') }}" class="text-success"><i class="bi bi-arrow-left fw-bold"></i> retour</a>
    </div>
@endsection

@section('profile')

    <h2 class="fw-bold">Reservations sur le post {{ $post->from }} - {{ $post->to }}</h2>

    <div class="col-sm-12 mt-4">

        <ul class="list-group">
            @forelse($reservations as $reservation)
               <li class="card">
                   <div class="card-header d-flex justify-content-between">
                       <div>
                           <x-avatar width="36" height="36" class="rounded-circle d-none d-sm-block"></x-avatar>
                           {{ $reservation->user->firstname }} {{ $reservation->user->lastname }}
                       </div>
                       <div class="small">
                           {{ agoDate($reservation->created_at) }}
                       </div>
                   </div>
                   <div class="card-body">
                       @if($post->type == 'PACKS' && $type = 'PACKS')
                           <h5 class="card-title p-0 my-1">La somme de {{ $reservation->price }} Euro est proposer pour le transporter de votre coli</h5>
                       @endif
                       @if($post->type == 'TRAVEL' && $type = 'TRAVEL')
                           <h5 class="card-title p-0 my-1">Reservation de {{ $reservation->kilo }}Kg</h5>
                       @endif
                       <div class="row">
                           <div class="col-8 card-text small">{{ $reservation->message }}.</div>
                           <div class="col-4 d-flex align-items-center">
                               <form action="{{ route('booking-validate', $reservation->id) }}" method="get">
                                   @csrf
                                   <button type="submit" class="btn btn-link text-success">accepter</button>
                               </form>
                               <form action="{{ route('booking-validate', $reservation->id) }}" method="get">
                                   @csrf
                                   <button type="submit" class="btn btn-link text-info">refuser</button>
                               </form>
                               <form action="{{ route('booking-delete', $reservation->id) }}" method="get">
                                   @csrf
                                   <button type="submit" class="btn btn-link text-danger">supprimer</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </li>
            @empty
                il y'a pas encore aucune reservation sur ce post.
            @endforelse
        </ul>
        {{ $reservations->links('pagination.custom') }}
    </div>

@endsection
