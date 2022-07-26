@extends('app.layout.layout')

@section('title')Colissend | Contactez-nous @endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/appController.css') }}">
@endsection

@section('app')

    <x-header page="page-howItWork" img="" title="Nous somme a l'ecoute de vos preocupations"/>

    <section class="section contact my-5 container">

        <div class="row gy-4">

            <div class="col-xl-6">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box card">
                            <i class="bi bi-geo-alt text-success"></i>
                            <h3>Adresse</h3>
                            <p>Herreshagener Str 6<br>51643, Gummersbach</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card">
                            <i class="bi bi-telephone text-success"></i>
                            <h3>Appelez-nous</h3>
                            <p>02214567894<br>01602346748</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card">
                            <i class="bi bi-envelope text-success"></i>
                            <h3>Envoyez-nous un e-mail</h3>
                            <p>colissend@gmail.com<br>contact@colissend.com</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card">
                            <i class="bi bi-clock text-success"></i>
                            <h3>Heures d'ouverture</h3>
                            <p>Du lundi au vendredi<br>9H00 - 17H00</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-6">
                <div class="card p-4">
                    <form action="{{ route('contact') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nom" value="{{ old('name') }}">
                                @error('name')
                                <span class="is-invalid small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <span class="is-invalid small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Sujet" value="{{ old('subject') }}">
                                @error('subject')
                                <span class="is-invalid small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="is-invalid small text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Votre message a été envoyé. Merci !</div>

                                <button type="submit" class="bg-success">Envoyer le message</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection
