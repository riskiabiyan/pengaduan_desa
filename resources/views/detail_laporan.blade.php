@extends('dashboard')

@section('content')
    
<h2>Detail Laporan</h2>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $laporan->judul_laporan }}</h5>
        <p class="card-text">{{ $laporan->isi_laporan }}</p>
        <p class="card-text">Status: {{ $laporan->statusLaporan->nama_status }}</p>
        @if($laporan->foto)
            <img src="{{ asset($laporan->foto) }}" alt="Foto" class="img-thumbnail" style="width: 80rem">
        @endif
    </div>
</div>
<a href="{{ route('lihat_laporan') }}" class="btn btn-primary mt-3">Kembali ke Daftar Laporan</a>

@endsection

