@extends('app.user.dashboard')

@section('profile')

    <h2 class="fw-bold">Mes messages</h2>

    <div class="py-3">
        @if($messages->count() > 0)
            <div class="d-flex justify-content-between">
                <div></div>
                <form action="{{ route('user.profiles.messages.mark-all-read') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Marquer tous comme lus</button>
                </form>
            </div>
            <messages-component
                    :messages="{{ $messages }}"
                    :auth="{{ Auth::user()  }}">
            </messages-component>
        @else
            <div class="messages d-flex justify-content-center align-items-center flex-column mt-5 pt-5">
                <p class="text-wrap">Vous souhaitez envoyer des objets ? <br>Créer une annonce gratuitement en 2 minutes.</p>
                <a href="{{ route('posts.coli.create') }}" class="btn btn-success p-2">Nouvelle annonce</a>
            </div>
        @endif
    </div>

@endsection
