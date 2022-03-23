@extends('app.layout.layout')

@section('style')

@endsection


@section('app')

    <x-header page="page-howItWork" title="{{ $section['title'] }}"/>

    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="section-title mb-0 dashboard">
                    <div class="activity">
                        @foreach($section['steps'] as $step)
                            <div class="activity-item d-flex">
                                <div class="activite-label">{{ $step['step'] }}</div>
                                <i class="bi bi-circle-fill activity-badge {{ $step['color'] }} align-self-start"></i>
                                <div class="activity-content">{{ $step['text'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
