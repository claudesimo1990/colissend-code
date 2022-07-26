@extends('app.layout.layout')

@section('title')Colissend | {{ $post->from }} => {{ $post->to }} @endsection

@section('app')

    <div class="container">
        <post-booking-component
                :auth="{{ Auth::user()  }}"
                :post="{{ $post }}">
        </post-booking-component>
    </div>

@endsection
