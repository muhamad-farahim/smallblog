@extends('layout.app')



@section('content')

<div class="container">


    @foreach ($blogs as $blog)

    <a class="black_link" href="{{ route('specific_blog', ["username" => $blog->getUsername(), "blogid" => $blog->id]) }}">
    <div class="card max-width-1000 mx-auto my-5 arti__card">
        <div class="arti__cardimg card-img-top">
            <img src="{{ $blog->getImg() }}" alt="">
        </div>
        <div class="card-body">
            <div class="card-title"><h2>{{ $blog->title }}</h2></div>
            <div class="card-text">
                {{ $blog->desc }}
            </div>
            <div class="card-subtitle text-muted">{{ $blog->getUsername() }}</div>
            <div class="my-2 d-flex">
                <button class="btn-lg btn-warning">Edit</button>
                <form action="{{ route('delete_blog') }}" class="mx-2" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $blog->id }}">
                    <button class="btn-lg btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    </a>

    @if (session('deletesuc'))

    <script>

        alert("{{ session('deletesuc') }}")

    </script>
        
    @endif

                
    @endforeach



</div>
    
@endsection