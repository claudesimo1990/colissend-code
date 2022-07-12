@extends('app.layout.layout')

@section('app')

    <div class="container my-5">

        <section class="section">

            <div class="row m-2 d-flex justify-content-between">

                <div class="col-lg-3">

                    <div id="sidebar" class="profile-dashboard">

                        @include('app.user.sidebar')

                    </div>

                    <div class="mt-5 text-center py-2">
                        <h4>Pieces d'identitées</h4>

                        <div class="list-group">
                            @forelse(auth()->user()->identities as $identity)
                                <div class="list-group-item list-group-item-action small d-flex justify-content-between"><span>{{ $identity->name }}</span>
                                    <span>
                                        <form action="{{  route('profile.identity.delete', ['identity' => $identity->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-white"><i class="bi bi-trash text-danger"></i></button>
                                        </form>
                                    </span>
                                </div>
                            @empty
                                <p class="text-secondary mt-4">Aucun fichier trouvé</p>
                            @endforelse
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    @yield('back-button')

                    @yield('profile')

                </div>

            </div>

        </section>

    </div>

@endsection
