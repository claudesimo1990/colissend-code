@extends('base')

@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success text-center mt-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <span class="d-none d-lg-block">Colissend - Admin</span>
                            </a>
                        </div>

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Admin Login</h5>
                                </div>

                                <form class="row g-3 needs-validation" action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="youremail" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" id="youremail" required="">
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required="">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection