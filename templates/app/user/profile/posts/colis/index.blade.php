@extends('app.user.dashboard')


@section('profile')

    <h2 class="fw-bold">Mes annonces Colis</h2>

    <div class="col-sm-10 mt-4">
        @forelse($colis as $coli)
            <a href="">
                <div  class="bg-white border my-3">
                    <div class="icon d-flex justify-content-between gap-5 p-2">
                        <i class="bx bxs-package big-icon"></i>
                        <div class="fw-bold text-muted">{{ $coli->from }} - <span class="text-muted">{{ formatDate($coli->dateFrom) }}</span></div>
                        <div class="fw-bold text-muted">{{ $coli->from }} - <span class="text-muted">{{ formatDate($coli->dateTo) }}</span></div>
                    </div>
                    <div class="infos">
                        <div class="d-flex justify-content-center gap-5 fw-bold p-2">
                            @foreach($coli->objects as $object)
                                <div class="object border bg-secondary-light d-flex justify-content-between gap-3">
                                    <span>{{ $object->name }}</span>
                                    <span>Poids: {{ $object->weight }}</span>
                                    <span>Prix: {{ $object->price }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p><a href="{{ route('posts.travel.create') }}" class="btn btn-success">Poster une annonce</a></p>
        @endforelse
    </div>

@endsection