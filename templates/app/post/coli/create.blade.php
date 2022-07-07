@extends('app.layout.layout')


@section('app')

    <div class="container py-5">
        <Coli-component objects="{{ json_encode($coli) }}"></Coli-component>
    </div>

@endsection
