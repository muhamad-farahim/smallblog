@extends('layout.app')


@section('content')

    <div class="blog-container my-5">

        <h1 class="text-center my-5">{{ $blog->title }}</h1>

        
            <img class="card-img-top my-5" src="{{ asset($blog->getImg()) }}" alt="">
        

        {!! html_entity_decode($blog->body) !!}

    </div>
    
@endsection