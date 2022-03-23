@extends('app.layout.layout')


@section('app')

    <div class="container py-5">
        <travel-component objects="{{ json_encode($transportedObjects) }}"></travel-component>
    </div>

@endsection
