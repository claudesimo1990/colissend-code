@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes Reservations</h2>

    <div class="col-sm-10 mt-4">
        @foreach($reservations as $reservation)
          <div class="bg-white my-4 py-2">
              <h4>Post - {{ $reservation->post->from }} {{ $reservation->post->to }}</h4>
              <div>Reservation {{ $reservation->kilo }} x {{ $reservation->price }}</div>
          </div>
        @endforeach
    </div>
    <div>
        {{ $reservations->links('pagination.custom') }}
    </div>
@endsection