@extends('app.user.dashboard')

@section('profile')
    <h2 class="">Inviter un ami</h2>

    <div class="col-sm-10 mt-4">
        <form action="" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Taper l'adresse mail de la personne à inviter</label>
            </div>
            <div class="form-floating mb-3">
                <input type="submit" class="btn btn-success" value="Inviter">
            </div>
        </form>
    </div>

@endsection