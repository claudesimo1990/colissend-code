@extends('app.layout.layout')

@section('app')

    <x-header page="page-howItWork" img="{{ $blog->getFirstMediaUrl('blog', 'header') }}" title="{{ $blog->title }}"/>

    <div class="card-section">

        <div class="container">

            <div class="bg-white">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-title mb-0">
                            <div class="card">
                                <div class="card-body pt-5">
                                    <p>
                                        {!! nl2br(e($blog->content)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
