@extends('admin.layout.layout')

@section('page-title')

    <h1>Create product</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        </ol>
    </nav>

@endsection

@section('admin')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.shop.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row my-3">
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{ old('name') }}" autocomplete="title">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="slug" value="{{ old('slug') }}" autocomplete="slug">
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <div class="col-md-4">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="price" value="{{ old('price') }}" autocomplete="price">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Visible en ligne  ?
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="active" value="" id="flexCheckChecked" checked>
                                    @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <div class="col-md-12">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="description" id="exampleFormControlTextarea1" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <div class="col-md-12">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
