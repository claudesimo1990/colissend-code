@extends('admin.layout.layout')

@section('page-title')

    <h1>Images</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.galleries.index') }}">Galeries</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.galleries.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row my-2">
                                <div class="col-md-12">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Toutes les transactions</h5>
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr class="text-center">
                                    <td class="text-start">{{ $gallery->title }}</td>
                                    <td class="d-flex justify-content-between">
                                        <a type="button" class="btn btn-info text-white rounded-pill">edit</a>
                                        <a type="button" href="#" class="btn btn-success rounded-pill text-white">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $galleries->links('pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
