@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes Reservations</h2>

    <div class="col-sm-10 mt-4">
        @foreach($reservations as $reservation)
          <div class="bg-success-light my-4 py-2 d-flex justify-content-between">
              <div class="info">
                  <h4>Post - {{ $reservation->post->from }} => {{ $reservation->post->to }}</h4>
                  <div>Reservation de {{ $reservation->kilo }} Kg ..... prix du kilo {{ $reservation->price/100 }}&euro;</div>
              </div>
              <div class="status">
                  <div class="small">{{ agoDate($reservation->updated_at) }}</div>
                  <div class="status badge @if($reservation->status == 'DRAFT')text-info @elseif($reservation->status == 'ACCEPTED')text-success @elseif($reservation->status == 'REJECTED')text-danger @endif">{{ $reservation->status }}</div>
                  @if($reservation->status == 'ACCEPTED')
                    <div class="status badge text-success">
                        <a href="{{ route('booking-checkout', $reservation->id) }}" class="btn btn-link text-success"><span class="bx bxl-paypal"></span>Payer</a>
                    </div>
                  @endif
              </div>
          </div>
        @endforeach
    </div>
    <div>
        {{ $reservations->links('pagination.custom') }}
    </div>
@endsection
