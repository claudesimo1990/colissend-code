@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes payments</h2>

    <div class="col-sm-10 mt-4">
        @foreach($payments as $payment)
            <div class="bg-success-light my-4 py-2 d-flex justify-content-between">
                <div class="info">
                    <h4>Post - {{ $payment->reservation->post->from }} => {{ $payment->reservation->post->to }}</h4>
                    <div>Payment de la somme de {{ $reservation->price }}&euro; pour la reservation de {{ $payment->reservation->kilo }} Kg ..... prix du kilo {{ $payment->reservation->post->price/100 }}</div>
                </div>
                <div class="status">
                    <div class="small">{{ agoDate($payment->created_at) }}</div>
                    <div class="status badge @if($reservation->status == 'DRAFT')text-info @elseif($reservation->status == 'ACCEPTED')text-success @elseif($reservation->status == 'REJECTED')text-danger @endif">{{ $reservation->status }}</div>
                    <div class="text-success">
                        info
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $payments->links('pagination.custom') }}
    </div>
@endsection
