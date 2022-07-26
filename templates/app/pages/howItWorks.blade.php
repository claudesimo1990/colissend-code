@extends('app.layout.layout')

@section('title')Colissend | Comment ca marche @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <x-header page="page-howItWork" img="" title="{{ $section['title'] }}"/>

    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="section-title mb-0 dashboard">
                    <div class="activity">
                        <p class="mb-4">{{ $section['text'] }}</p>
                        <div class="accordion accordion-flush">
                            @foreach($section['steps'] as $key => $step)

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fw-bold">{{ $step['step'] }}</h4>
                                    </div>
                                    <div class="card-body py-1">
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
