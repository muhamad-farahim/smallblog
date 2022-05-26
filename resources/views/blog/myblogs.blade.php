@extends('layout.app')



@section('content')

<div class="container">

    @if ($blogs === "empty")

        <div class="w-100 h-100 text-center">

            <h1>You dont have blogs under your name</h1>
            <a href="{{ route('add_blog') }}"><h1>Create blog here</h1></a>


        </div>
        
    @else

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
        </a>
            <a href="{{ route('user_blogs', ["username" => $blog->getUsername()]) }}" class="card-subtitle text-muted">{{ $blog->getUsername() }}</a>
            <div class="my-2 d-flex">
                <a class="btn-lg btn-warning text-decoration-none" href="{{ route('update_blog', ['id' => $blog->id]) }}">Edit</a>
                <form action="{{ route('delete_blog') }}" class="mx-2" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $blog->id }}">
                    <button class="btn-lg btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    



                
    @endforeach

        
    @endif

    @if (session('deletesuc'))

    <script>

        alert("{{ session('deletesuc') }}")

    </script>
        
    @endif

</div>
    
@endsection