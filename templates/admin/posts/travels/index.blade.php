@extends('admin.layout.layout')

@section('page-title')

    <h1>Travels</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Posts</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">Voyages</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Toutes les annonces voyages</h5>
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">#User name</th>
                                <th scope="col">from</th>
                                <th scope="col">to</th>
                                <th scope="col">Ticket</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">crée le</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($travels as $travel)
                                    <tr class="text-center">
                                        <td class=""><a href="{{ route('admin.users.show', ['user' => $travel->user->id ]) }}">#{{ $travel->user->firstname }}</a></td>
                                        <td class="">{{ $travel->from }}</td>
                                        <td class="">{{ $travel->to }}</td>
                                        <td class="">
                                            <a href="{{ $travel->getMedia('travels')->first()?->getUrl('thumb') }}">
                                                <img src="{{ $travel->getMedia('travels')->first()?->getUrl('thumb') }}" width="50" height="50" class="rounded avatar"  alt="">
                                            </a>
                                        </td>
                                        <td class="">Paypal</td>
                                        <td class="">{{ $travel->created_at->format('d.m.y') }}</td>
                                        <td class=" fw-bold text-secondary">{{ $travel->status == 'PROGRESS' ? 'NEW' : $travel->status  }}</td>
                                        <td class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-info text-white rounded-pill">details</button>
                                            <a type="button" href="{{ route('admin.post.accepted', ['post' => $travel->id]) }}" class="btn btn-success rounded-pill text-white">publier</a>
                                            <a type="button" href="{{ route('admin.post.rejected', ['post' => $travel->id]) }}" class="btn btn-danger rounded-pill">refuser</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $travels->links('pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    </nav>

@endsection
