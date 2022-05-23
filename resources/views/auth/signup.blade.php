@extends('layout.app')

@section('css')

<link rel="stylesheet" href={{ asset('css/auth.css') }}>
    
@endsection

@section('content')

<div class="container login__grid">


        <form class="card rounded login__card" method="POST">

            @csrf

            <h1 class="card-header text-center">SIGN UP</h1>

            @error('form-error')

            <div class="alert alert-danger">{{ $message }}</div>

            @enderror

            <div class="login__container">
            <label for="lemail" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="lemail" value="{{ old('email') }}">
            @error('email')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <label for="lname" class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="lname" value="{{ old('name') }}">
            @error('name')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <label for="lusername" class="form-label">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="lusername" value="{{ old('username') }}">
            @error('username')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <label for="lpass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="lpass">
            @error('password')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <label for="lpass" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="lpass">
            @error('password_confirmation')

            <div class="alert alert-danger">{{ $message }}</div>
                
            @enderror

            <input type="submit" value="Login" class="my-3 btn btn-primary">
            </div>
            
    
        </form>
    

</div>
    
@endsection