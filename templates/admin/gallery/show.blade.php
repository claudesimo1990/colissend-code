@extends('admin.layout.layout')

@section('page-title')

    <h1>Gallery - {{ $gallery->title }}</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.gallery.index') }}">Galeries</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.gallery.show',['gallery' => $gallery->id]) }}">Gallery - {{ $gallery->title }}</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Ajouter des photos à votre gallery</h5>
                        <form action="{{ route('admin.gallery.albums.store', ['gallery' => $gallery->id]) }}" method="POST" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-success">create</button>
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
                        <div class="row">
                            @foreach($photos as $photo)
{{--                                {{ dd($photo, $gallery) }}--}}
                                <div class="col-md-4 mt-4">
                                    <div class="card" style="min-width: 18rem;">
                                        <img class="card-img-top" src="{{ $photo->getUrl('thumb') }}" alt="{{ $photo->file_name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $photo->file_name }}</h5>
                                            <a href="{{ $photo->getUrl($gallery->tag ?? 'header') }}" class="btn btn-primary mx-2">voir plus</a>
                                            <a href="{{ route('gallery.background', ['gallery' => $gallery->id, 'media' => $photo->id, 'tag' => $gallery->content]) }}" class="btn btn-success">
                                                @if($gallery->active_img == $photo->uuid)
                                                    <span class="bi-check-square text-white bg-success"></span>
                                                @endif
                                                background
                                            </a>
                                            <a href="{{ route('gallery.media.delete', ['media' => $photo]) }}" class="btn btn-danger">
                                                delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
