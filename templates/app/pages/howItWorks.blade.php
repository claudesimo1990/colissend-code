@extends('app.layout.layout')

@section('app')

    <x-header page="page-howItWork" img="" title="{{ $section['title'] }}"/>

    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="section-title mb-0 dashboard">
                    <div class="activity">
                        <h2 class="card-title">{{ $section['title'] }}</h2>
                        <p class="mb-4">{{ $section['text'] }}</p>
                        <div class="accordion accordion-flush">
                            @foreach($section['steps'] as $key => $step)
                                <div class="accordion-item">
                                    <h3 class="accordion-header bold">
                                        {{ $step['step'] }}
                                    </h3>
                                    <div class="accordion-body">
                                        {{ $step['text'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
