@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Reservations sur le post {{ $post->from }} - {{ $post->to }}</h2>

    <div class="col-sm-12 mt-4">

        <ul class="list-group">
            @forelse($post->reservations as $reservation)
                @if($post->type == 'PACKS')
                    <li class="list-group-item d-flex justify-content-between">
                        <span>La somme de {{ $reservation->price }} Euro vous est proposer par {{ $reservation->user->firstname  }} pour transporter votre coli</span>
                        <span class="d-flex justify-content-between">
                            <a href="" class="text-info">details</a>
                            <a href="" class="text-success mx-2">accepter</a>
                            <a href="" class="text-danger">refuser</a>
                        </span>
                    </li>
                @endif
            @empty

            @endforelse
        </ul>
    </div>

@endsection