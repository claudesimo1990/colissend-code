@extends('admin.layout.layout')

@section('page-title')

    <h1>Packs</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Posts</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">Colis</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Toutes les annonces colis</h5>
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#User ID</th>
                                <th scope="col">from</th>
                                <th scope="col">to</th>
                                <th scope="col">Ticket</th>
                                <th scope="col">crée le</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packs as $pack)
                                <tr class="text-center">
                                    <td class="text-start"><a href="{{ route('admin.users.show', ['user' => $pack->user->id ]) }}">#{{ $pack->user->email }}</a></td>
                                    <td class="text-start">{{ $pack->from }}</td>
                                    <td class="text-start">{{ $pack->to }}</td>
                                    <td class="text-start"><a href="{{ $pack->ticket }}"><img src="{{ $pack->ticket }}" width="50" height="50" class="rounded avatar"  alt=""></a></td>
                                    <td class="text-start">{{ $pack->created_at->format('d.m.y') }}</td>
                                    <td class="text-start fw-bold text-secondary">{{ $pack->status == 'PROGRESS' ? 'nouveau' : $pack->status  }}</td>
                                    <td class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-info text-white rounded-pill">details</button>
                                        <a type="button" href="{{ route('admin.post.accepted', ['post' => $pack->id]) }}" class="btn btn-success rounded-pill text-white">publier</a>
                                        <a type="button" href="{{ route('admin.post.rejected', ['post' => $pack->id]) }}" class="btn btn-danger rounded-pill">refuser</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $packs->links('pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    </nav>

@endsection
