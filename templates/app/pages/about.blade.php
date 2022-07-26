@extends('app.layout.layout')

@section('title')Colissend | A-propos de nous @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <x-header page="page-howItWork" img="" title="A propos de nous"/>

    <div class="card-section">
        <div class="container">
            <div class="card-block bg-white mb30">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-title mb-0">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 my-3">
                                    <img src="{{ asset('images/about/about.jpg') }}" width="300" alt="about">
                                </div>
                                <div class="col-md-8 col-sm-12 col-xs-12 text-justify my-3">
                                    <p>
                                        <span class="fw-bolder">Colissend</span>
                                    </p>
                                    <p>
                                        Est une page mettant en relation les personnes de différentes communautés de l’Afrique comme de sa diaspora dans le but de transporter des colis et courriers destinés à leurs proches de partout dans le monde
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

@endsection
