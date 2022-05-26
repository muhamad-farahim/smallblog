@extends('layout.app')


@section('css')

<link rel="stylesheet" href="{{ asset('css/trix.css') }}">
<link rel="stylesheet" href="{{ asset('css/addblog.css') }}">
    
@endsection

@section('content')

<div class="container form__grid">


    <form class="card rounded form__card" enctype="multipart/form-data" method="POST">
        <div class="form__inputs w-100">

            @csrf

            

            @error('form-error')

            <div class="alert alert-danger">{{ $message }}</div>

            @enderror

            <div class="form__container mx-auto">
            <label for="ftitle" class="form-label">Title</label>
            <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="ftitle" value="{{ $blog->title }}">
            @error('title')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror


            <label for="fdesc" class="form-label">Desc</label>
            <input type="desc" name="desc" class="form-control @error('desc') is-invalid @enderror" id="fdesc" value="{{ $blog->desc }}">
            @error('desc')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror


            <label class="form-label" for="customFile">Image</label>
            <input type="file" name="img" class="form-control mb-5" id="customFile"/>
            @error('img')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror
           

            

            <input tagName value="{{ $blog->body }}" id="x" type="hidden" name="body">
            <trix-editor input="x"></trix-editor>

            <input type="submit" value="UPDATE" class="my-3 btn btn-primary">

            </div>
    </div>


  
    

    </form>


</div>
@endsection


@section('js') 


<script src="{{ asset('js/trix.js') }}"></script>
@endsection







