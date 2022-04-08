@extends('admin.layout.layout')

@section('page-title')

    <h1>Blogs</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.blog.index') }}">blogs</a></li>
        </ol>
    </nav>

@endsection

@section('admin')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr class="text-center">
                                    <td class="">{{ $blog->title }}</td>
                                    <td class="">
                                        <img src="{{ $blog->getFirstMediaUrl('blog', 'thumb') }}" width="50px" height="50px" alt="{{ $blog->title }}">
                                    </td>
                                    <td class="">
                                        @if(is_null($blog->publishedAt))
                                            <strong class="text-danger">Pas Publier</strong>
                                        @else
                                            <strong class="text-success">Publier</strong>
                                        @endif
                                    </td>
                                    <td class="">
                                        <a type="button" href="{{ route('admin.blog.edit', ['blog' => $blog->id ]) }}" class="btn btn-primary text-white rounded-pill">Editer</a>
                                        <a type="button" href="{{ route('admin.blog.publish', ['blog' => $blog->id ]) }}" class="btn btn-success text-white rounded-pill">Publier</a>
                                        <form action="{{ route('admin.blog.delete', ['blog' => $blog->id ]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" href="" class="btn btn-danger rounded-pill text-white">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $blogs->links('pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
