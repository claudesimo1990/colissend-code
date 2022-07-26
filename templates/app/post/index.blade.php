@extends('app.layout.layout')

@section('title')Colissend | annonces @endsection

@section('app')

   <div class="container">

       <div class="row mt-4">
           <div class="col-sm-12 col-sm-12 col-md-9">

               <search-component location="posts"></search-component>

               <post-component></post-component>

           </div>
           <div class="col-sm-12 col-md-3 mt-4">
               @foreach($pubs as $pub)
                   <div class="card">
                       <div class="alert alert-secondary">PUB</div>
                       <div class="card-body pb-0 mt-1">
                           <div class="pub">
                               <a href="{{ $pub->link }}">
                                   <div class="post-item clearfix">
                                       <img src="{{ asset('/images/' . $pub->image) }}" alt="">
                                       <h4>{{ $pub->title }}</h4>
                                       <p>{{ $pub->content }}</p>
                                   </div>
                               </a>
                           </div>
                       </div>
                   </div>
               @endforeach
           </div>
       </div>
   </div>

@endsection
