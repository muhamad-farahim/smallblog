@extends('layout.app')



@section('content')

<div class="container">


    @foreach ($blogs as $blog)

    <a class="black_link" href="{{ route('specific_blog', ["username" => $blog->getUsername(), "blogid" => $blog->id]) }}">
    <div class="card max-width-1000 mx-auto my-5 arti__card">
        <div class="arti__cardimg card-img-top rounded-top">
            <img src="{{ $blog->getImg() }}" alt="">
        </div>
        <div class="card-body">
            <div class="card-title"><h2>{{ $blog->title }}</h2></div>
            <div class="card-text">
                {{ $blog->desc }}
            </div>
            <a href="{{ route("user_blogs", ['username' => $blog->getUsername()]) }}" class="card-subtitle text-muted">{{ $blog->getUsername() }}</a>
        </div>
    </div>
    </a>

                
    @endforeach



</div>
    
@endsection