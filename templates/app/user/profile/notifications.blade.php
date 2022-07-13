@extends('app.user.dashboard')

@section('profile')

    @include('app.include.svg')

    <h2 class="fw-bold">Mes Notifications</h2>

    <div class="py-3">
        <notification-component :propsnotifications="{{ $notifications }}"></notification-component>
    </div>

@endsection
