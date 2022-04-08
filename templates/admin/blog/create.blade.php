@extends('admin.layout.layout')

@section('page-title')

    <h1>Blog</h1>

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
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row my-3">
                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="title" value="{{ old('title') }}" autocomplete="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row my-3">
                                <div class="col-md-12">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="content" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    @error('content')
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

                            <div class="form-group row mb-4 mt-2">
                                <div class="col-md-12">
                                    <select class="form-select @error('category') is-invalid @enderror" name="category" aria-label="Default select example">
                                        <option value="">Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
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
