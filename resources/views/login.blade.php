@extends('master')

@section('title', 'Login')

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
        <div class="col col-lg-8">
            <div class="card p-4">
                <form action="/cek_pengguna" method="POST">
                @csrf
                <h2 class="text-center mb-4">Selamat Datang</h2>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="sumbit" class="btn btn-dark w-100 mt-4">Masuk</button>
                <p class="text-center mt-3">Belum punya akun?</p>
                <a href="{{ url('/register') }}" class="btn btn-dark w-100">Buat akun</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection