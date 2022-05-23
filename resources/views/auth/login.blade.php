@extends('layout.app')

@section('css')

<link rel="stylesheet" href={{ asset('css/auth.css') }}>
    
@endsection

@section('content')

<div class="container login__grid">


        <form class="card rounded login__card" method="POST">

            @csrf

            <h1 class="card-header text-center">LOGIN</h1>

            @error('form-error')

            <div class="alert alert-danger">{{ $message }}</div>

            @enderror

            <div class="login__container">
            <label for="lemail" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="lemail" value="{{ old('email') }}">
            @error('email')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <label for="lpass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="lpass">
            @error('password')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <input type="submit" value="Login" class="my-3 btn btn-primary">
            </div>
            
    
        </form>
    

</div>
    
@endsection