@extends('app.layout.layout')

@section('app')

    <div class="container p-5">
        <section class="section profile">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores aspernatur aut beatae, consectetur cupiditate debitis deleniti eius eligendi est fugiat fugit id inventore iure, laborum maiores nam officia perferendis praesentium quaerat quibusdam reiciendis sapiente vel voluptas voluptatem. Iusto, vel!
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
