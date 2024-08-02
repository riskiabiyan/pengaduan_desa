@extends('master')

@section('title', 'Register')
    
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">

    <div class="row justify-content-center mt-custom">
        <div class="col col-lg-8 p-4">
            <div class="card p-4">

                <form action="/simpanuser" method="POST">
                    @csrf
                    <h2 class="text-center mb-4">Buat akun baru!</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" autofocus>
                    </div>
                    <input type="hidden" name="foto_profil" value="foto_default.png">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Daftar</button>
                    <p class="text-center mt-3">Sudah punya akun?</p>
                    <a href="{{ url('/login') }}" class="btn btn-dark w-100">Masuk</a>
                    </form>

            </div>
        </div> 
    </div>

</div>
    
    
@endsection