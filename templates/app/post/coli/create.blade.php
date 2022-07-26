@extends('app.layout.layout')


@section('app')

    <div class="container py-5">
        <Coli-component privacy="{{ route('privacy') }}" objects="{{ json_encode($coli) }}"></Coli-component>
    </div>

@endsection
