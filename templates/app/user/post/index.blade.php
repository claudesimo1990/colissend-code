@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes annonces</h2>

    <div class="col-sm-10 mt-4">
        @foreach($posts as $post)
            <a href="">
                @if($post->type == 'TRAVEL')
                    <div  class="bg-white border my-3">
                        <div class="icon p-2 d-flex justify-content-between gap-5">
                            <i class="bx bxs-plane big-icon"></i>
                            <div class="fw-bold text-muted">{{ $post->from }} - <span class="text-muted">{{ formatDate($post->dateFrom) }}</span></div>
                            <div class="fw-bold text-muted">{{ $post->from }} - <span class="text-muted">{{ formatDate($post->dateTo) }}</span></div>
                        </div>
                        <div class="infos">
                            <div class="d-flex justify-content-center gap-5 fw-bold">
                                <div class="text-muted">{{ $post->kilo }} kilos</div>
                                <div class="text-muted">{{ $post->price }}Euro/kilo</div>
                                <div class="text-muted">{{ $post->reservations->count() }} reservations</div>
                            </div>
                        </div>
                    </div>
                @endif
            </a>
        @endforeach
    </div>

@endsection