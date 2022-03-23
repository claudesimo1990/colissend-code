@extends('app.layout.layout')


@section('app')

    <div class="container->fluid p-4">
        <post-booking-component :auth="{{ \Illuminate\Support\Facades\Auth::user()  }}" :post="{{ $post }}"></post-booking-component>
    </div>

@endsection
