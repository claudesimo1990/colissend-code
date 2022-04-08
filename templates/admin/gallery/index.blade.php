@extends('admin.layout.layout')

@section('page-title')

    <h1>Gallery Photos</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.gallery.index') }}">Galeries</a></li>
        </ol>
    </nav>

@endsection

@section('admin')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.gallery.store') }}" method="POST">
                            @csrf
                            <div class="form-group row my-2">
                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Entrer le nom" autocomplete="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <div class="col-md-12">
                                    <select class="form-select" name="tag" aria-label="Default select example">
                                        <option value="default">Choississez un tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag['name'] }}">{{ $tag['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
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
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr class="text-center">
                                    <td class="text-center">{{ $gallery->id }}</td>
                                    <td class="text-center">{{ $gallery->title }}</td>
                                    <td class="text-center text-info">{{ $gallery->content !== '-1' ? $gallery->content : '' }}</td>
                                    <td class="">
                                        <a type="button" href="{{ route('admin.gallery.show', ['gallery' => $gallery->id ]) }}" class="btn btn-success text-white rounded-pill">Edit</a>
                                        <form action="{{ route('admin.gallery.delete', ['gallery' => $gallery->id ]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" href="" class="btn btn-danger rounded-pill text-white">Delete</button>
                                        </form>
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
