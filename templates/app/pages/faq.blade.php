@extends('app.layout.layout')

@section('title')Colissend | FAQ @endsection

@section('app')

    <x-header page="page-howItWork" img="" title="Questions fréquemment posées"/>

    <div class="card-section">

        <div class="container">

            <div class="bg-white">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-title mb-0">
                            @foreach($faqs as $key => $faq)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">{{ $faq['category'] }}</h5>
                                        <div class="accordion accordion-flush" id="faq-group-{{ $key }}">
                                            @foreach($faq['questions'] as $id => $q)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" data-bs-target="#faqsOne-{{ $id }}" type="button" data-bs-toggle="collapse" aria-expanded="false">
                                                            {{ $q['question'] }}
                                                        </button>
                                                    </h2>
                                                    <div id="faqsOne-{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#faq-group-{{ $id }}" style="">
                                                        <div class="accordion-body">
                                                            {{ $q['answer'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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
