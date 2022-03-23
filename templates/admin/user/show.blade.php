@extends('admin.layout.layout')

@section('page-title')

    <h1>Utilisateur n° {{ $user->id }}</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">users</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.show', ['user' => $user->id]) }}">{{ $user->email }}</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ $user->avatar }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name }}</h2>
                        <h3>{{ $user->email }}</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-posts">Posts</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">A propos de moi</h5>
                                <p class="small fst-italic">{{ $user->profile->about }}</p>

                                <h5 class="card-title">Details du profile</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nom complet</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->profile->full_name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Pays</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->profile->country }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">adresse</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->profile->street }}, {{ $user->profile->city }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Telephone</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->profile->phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Date de Naissance</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->profile->birthday }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-posts">
                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Depart</th>
                                        <th scope="col">Arrivée</th>
                                        <th scope="col">Date de depart</th>
                                        <th scope="col">Date d'arrivée</th>
                                        <th scope="col">Kilos</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->posts as $post)
                                        <tr class="border">
                                            <th scope="row"><a href="#">#{{ $post->id }}</a></th>
                                            <td>{{ $post->from }}</td>
                                            <td>{{ $post->to }}</td>
                                            <td>{{ formatDate($post->dateFrom) }}</td>
                                            <td>{{ formatDate($post->dateTo) }}</td>
                                            <td>{{ $post->kilo }}</td>
                                            @if($post->status == 'ACCEPTED')
                                                <td><span class="badge bg-success">ACCEPTED</span></td>
                                            @elseif($post->status == 'REJECTED')
                                                <td><span class="badge bg-danger">REJECTED</span></td>
                                            @else
                                                <td><span class="badge bg-primary">PROGRESS</span></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
