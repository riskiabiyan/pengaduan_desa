@extends('admin/master_auth_admin')

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

    <div class="row justify-content-center mt-custom">
        <div class="col col-lg-6">
            <div class="card p-4">
                <h2 class="text-center mb-4">Tambah Akun Admin</h2>
                <form action="/simpan_admin" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="foto_profil" value="foto_default.png">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" name="username" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-custom">Daftar</button>
                    
                </form>
            </div>
        </div>
    </div>

    
    
@endsection