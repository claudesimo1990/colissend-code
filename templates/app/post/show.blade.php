@extends('app.layout.layout')


@section('app')

    <div class="container">
        <post-booking-component
                :auth="{{ Auth::user()  }}"
                :post="{{ $post }}">
        </post-booking-component>
    </div>

@endsection
