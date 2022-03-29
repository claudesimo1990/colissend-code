@extends('admin.layout.layout')

@section('page-title')

    <h1>Images</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.galleries.show', ['gallery' => $galerry->id]) }}">Galerie - {{ $galerry->title }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.album.create') }}">Albums</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.albums.uploads') }}" method="POST" enctype="multipart/form-data">
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

@endsection
