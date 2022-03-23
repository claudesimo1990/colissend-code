@extends('app.layout.layout')

@section('style')

@endsection


@section('app')

    <x-header page="page-howItWork" title="A-propos de nous"/>

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
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet fuga maxime quisquam
                                        reiciendis unde. Amet at aut dignissimos error itaque odit quo reiciendis sapiente
                                        tempore. Accusantium assumenda beatae perspiciatis possimus.
                                    </div>
                                    <div>Aliquam, aspernatur consequatur dolorem et exercitationem illum modi nesciunt
                                        perferendis quaerat sunt temporibus totam voluptates. Corporis dolorem enim fuga omnis
                                        quisquam. Asperiores eos esse in optio ratione ut vel voluptatem.
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4 py-3">
                                <div class="col-md-8 col-sm-12 col-xs-12 my-3">
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet fuga maxime quisquam
                                        reiciendis unde. Amet at aut dignissimos error itaque odit quo reiciendis sapiente
                                        tempore. Accusantium assumenda beatae perspiciatis possimus.
                                    </div>
                                    <div>Aliquam, aspernatur consequatur dolorem et exercitationem illum modi nesciunt
                                        perferendis quaerat sunt temporibus totam voluptates. Corporis dolorem enim fuga omnis
                                        quisquam. Asperiores eos esse in optio ratione ut vel voluptatem.
                                    </div>
                                    <div>Aliquam, aspernatur consequatur dolorem et exercitationem illum modi nesciunt
                                        perferendis quaerat sunt temporibus totam voluptates. Corporis dolorem enim fuga omnis
                                        quisquam. Asperiores eos esse in optio ratione ut vel voluptatem.
                                    </div>
                                    <div>Aliquam, aspernatur consequatur dolorem et exercitationem illum modi nesciunt
                                        perferendis quaerat sunt temporibus totam voluptates. Corporis dolorem enim fuga omnis
                                        quisquam. Asperiores eos esse in optio ratione ut vel voluptatem.
                                    </div>
                                    <div>Aliquam, aspernatur consequatur dolorem et exercitationem illum modi nesciunt
                                        perferendis quaerat sunt temporibus totam voluptates. Corporis dolorem enim fuga omnis
                                        quisquam. Asperiores eos esse in optio ratione ut vel voluptatem.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 my-3">
                                    <img src="{{ asset('images/about/manager.jpg') }}" width="300" alt="manager">
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
