@extends('app.layout.layout')

@section('app')

    <div class="container my-5">

        <section class="section">

            <div class="row m-2 d-flex justify-content-between">

                <div class="col-lg-3">

                    <div id="sidebar" class="profile-dashboard">

                        @include('app.user.sidebar')

                    </div>

                </div>

                <div class="col-lg-9">

                    <div class="row mb-2 fw-bold">
                        <a href="{{ route('user.profile.board') }}" class="text-success"><i class="bi bi-arrow-left fw-bold"></i> retour</a>
                    </div>

                    @yield('profile')

                </div>

            </div>

        </section>

    </div>

@endsection
