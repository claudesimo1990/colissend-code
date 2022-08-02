@extends('admin.layout.layout')

@section('page-title')

    <h1>Products</h1>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.blog.index') }}">products</a></li>
        </ol>
    </nav>

@endsection

@section('admin')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary float-end" href="{{ route('admin.shop.products.create') }}">Add product</a>
                    </div>
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Title</th>
                                <th scope="col">price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="text-center">
                                    <td class="">{{ $product->name }}</td>
                                    <td class="">{{ $product->formatted_price }}</td>
                                    <td class="">
                                        <img src="{{ $product->getFirstMediaUrl('products', 'thumb') }}" width="50px" height="50px" alt="">
                                    </td>
                                    <td class="">
                                        @if($product->active)
                                            <strong class="text-success">Publier</strong>
                                        @else
                                            <strong class="text-danger">Pas Publier</strong>
                                        @endif
                                    </td>
                                    <td class="">1</td>
                                    <td class="">
                                        <a type="button" href="{{ route('admin.shop.products.edit', ['product' => $product->id ]) }}" class="btn btn-primary text-white rounded-pill">Editer</a>
                                        <a type="button" href="{{ route('admin.shop.products.publish', ['product' => $product->id ]) }}" class="btn btn-success text-white rounded-pill">Publier</a>
                                        <form action="{{ route('admin.shop.products.delete', ['product' => $product->id ]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" href="" class="btn btn-danger rounded-pill text-white">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $products->links('pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
