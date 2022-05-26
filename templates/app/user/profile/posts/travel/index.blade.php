@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes annonces voyages</h2>

    <div class="col-sm-10 mt-4">
        @forelse($travels as $travel)
            <a href="">
                <div  class="bg-white border my-3 w-50">
                    <div class="icon p-2 d-flex justify-content-between gap-5">
                        <i class="bx bxs-plane big-icon"></i>
                        <div class="fw-bold text-muted">{{ $travel->from }} - <span class="text-muted">{{ formatDate($travel->dateFrom) }}</span></div>
                        <div class="fw-bold text-muted">{{ $travel->from }} - <span class="text-muted">{{ formatDate($travel->dateTo) }}</span></div>
                    </div>
                    <div class="infos">
                        <div class="d-flex justify-content-center gap-5 fw-bold p-2">
                            <div class="object border bg-secondary-light d-flex justify-content-between gap-5">
                                <span>{{ $travel->kilo }} kilos</span>
                                <span>{{ $travel->price }}<i class="bi bi-currency-euro"></i>/kilo</span>
                                <span>{{ $travel->reservations->count() }} reservations</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p><a href="{{ route('posts.travel.create') }}" class="btn btn-success">Poster une annonce</a></p>
        @endforelse
    </div>

@endsection