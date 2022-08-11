@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes Reservations</h2>

    <div class="col-sm-10 mt-4">
        @foreach($reservations as $reservation)
          <div class="bg-success-light my-4 p-2 d-flex justify-content-between">
              <div class="info">
                  <h4>Post - {{ $reservation->post->from }} => {{ $reservation->post->to }}</h4>
                  @if($reservation->post->type == 'TRAVEL')
                      <div>Reservation de {{ $reservation->kilo }} Kg ..... prix du kilo {{ $reservation->price/100 }}&euro;</div>
                  @else
                      Votre Position de {{ $reservation->price }}&euro;
                  @endif
              </div>
              <div class="status">
                  <div class="small">{{ agoDate($reservation->updated_at) }}</div>
                  @if($reservation->paid)
                      <div class="status badge text-success">
                          Deja payer
                      </div>
                  @else
                      <div class="status badge @if($reservation->status == 'DRAFT')text-info @elseif($reservation->status == 'ACCEPTED')text-success @elseif($reservation->status == 'REJECTED')text-danger @endif">{{ $reservation->status }}</div>
                      @if($reservation->status == 'ACCEPTED')
                          <div class="status badge text-success">
                              <a href="{{ route('booking-checkout', $reservation->id) }}" class="btn btn-link text-success"><span class="bx bxl-paypal"></span>Payer</a>
                          </div>
                      @endif
                  @endif
              </div>
          </div>
        @endforeach
    </div>
    <div>
        {{ $reservations->links('pagination.custom') }}
    </div>
@endsection
