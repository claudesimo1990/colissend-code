@extends('app.layout.layout')

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <div class="container">

        <div class="row mt-3 h-100 mt-4">
            <div class="col-9"></div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <form action="" method="get">
                    <select class="form-select" name="category" aria-label="Default select example" onchange="this.form.submit()">
                        <option selected="">Toutes les catégories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        @foreach($blogs as $key => $blog)
            <div class="row mt-2">
                <div class="col-sm-12 col-sm-12 col-md-9 mt-2">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $blog->getFirstMediaUrl('blog', 'thumb') }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('blog.show', ['blog' => $blog]) }}">
                                        <h1 class="card-title fw-bolder blog-title">{{ $blog->title }}</h1>
                                    </a>
                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="date small text-dark text-muted">{{ formatDate($blog->created_at) }}</div>
                                        <div class="autor small text-dark fw-bold">Auteur Simo Claude</div>
                                    </div>
                                    <div class="card-text">{{ Str::limit(nl2br($blog->content), 120) }}</div>

                                    <div class="pt-4">
                                        <span class="text-muted position-absolute bottom-0"><i class="bi bi-chat text-dark mx-2"></i>{{ $key + 4 }} commentaires</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 mt-4"></div>
            </div>
        @endforeach
        {{ $blogs->links('pagination.custom') }}
    </div>

@endsection
