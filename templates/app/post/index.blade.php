@extends('app.layout.layout')


@section('app')

   <div class="container">

       <div class="row mt-4">
           <div class="col-sm-12 col-sm-12 col-md-9">

               <search-component location="posts"></search-component>

               <post-component></post-component>

           </div>
           <div class="col-sm-12 col-md-3">
               @foreach($pubs as $pub)
                   <div class="card">
                       <div class="card-body pb-0">
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
