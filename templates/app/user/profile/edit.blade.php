@extends('app.user.dashboard')

@section('profile')

<h2 class="fw-bold">Editer votre profile</h2>

<form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="row">
        <div class="col-lg-8 border py-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row my-3">
                        <div class="form-group d-flex justify-content-between">
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre" id="female" {{ $profile->genre == 'femele' ? 'checked=""' : '' }} value="femele" >
                                    <label class="form-check-label" for="female">
                                        Madame
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genre" id="male" {{ $profile->genre == 'male' ? 'checked=""' : '' }} value="male">
                                    <label class="form-check-label" for="male">
                                        Monsieur
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-label">Prenom</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="Prénom" value="{{ $profile->firstname }}">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Nom" value="{{ $profile->lastname }}">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="form-label">Numéro de téléphone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Numéro de téléphone" value="{{ $profile->phone }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Adresse e-mail" value="{{ $profile->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="birthday" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" placeholder="29.03.1990" value="{{ $profile->birthday ? birthdayFormat($profile->birthday) : '' }}">
                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="country" class="form-label">Nationalité</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Votre pays" value="{{ $profile->country }}">
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Modifier mes informations">
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-2 text-center">
            <p class="fw-bold mb-3">Modifier votre image de profile</p>
            <img src="{{ !is_null(Auth::user()->getFirstMedia('avatar')) ? Auth::user()->getFirstMedia('avatar')->getUrl('thumb') : asset('images/colissend/default.svg') }}" class="rounded-circle text-center"   alt="{{ Auth::user()->name }}">
            <div class="pt-2">
                <div class="image-upload mt-3">
                    <label for="file-input" class="btn btn-success" style="padding-left: 36px;padding-right: 36px;">
                        <i class="bi bi-upload text-white"></i>
                    </label>
                    <input id="file-input" name="avatar" type="file" />
                </div>
                @error('avatar')
                    <span class="invalid-feedback d-block" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 my-4 border py-2">
            <h2 class="fw-bold">Pièce d'identité</h2>
            <div class="bg-success-light text-dark p-3">
                <p>Pour garantir une validation rapide des documents, transmettez des photos ou des scans :</p>
                <ul>
                    <li>En couleur : les documents noir et blanc ne seront pas acceptés.</li>
                    <li>Complets : toutes les pages sont présentes, aucune information n’est masquée ou tronquée.</li>
                    <li>Lisibles et de bonne qualité : ni flou, ni sombre, ni abîmé et sans reflet.</li>
                </ul>
                <p>Les formats acceptés sont JPEG, PNG et PDF. La taille maximum autorisée est de 7Mo.</p>
            </div>
            <div class="py-2">
                <p>Assurez-vous que vous avez bien sélectionné le recto ET le verso avant de cliquer sur le bouton “Envoyer le document”.</p>
                <form action="">
                    <div class="form-group">
                        <select class="form-select" multiple="" aria-label="multiple select example">
                            <option selected="">Carte d'identité - recto verso</option>
                            <option value="1">Permis de conduire - recto verso </option>
                            <option value="2">Passeport</option>
                            <option value="3">Titre de séjour - recto verso</option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" value="Envoyer le document">
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
@endsection