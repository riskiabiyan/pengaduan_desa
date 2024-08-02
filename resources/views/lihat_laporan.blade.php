@extends('dashboard')

@section('content')
    

    <h2>Daftar Laporan</h2>
    @if($laporan->isEmpty())
        <p>Tidak ada laporan untuk ditampilkan.</p>
    @else
    <div class="container-fluid">
        <div class="row">
            @foreach($laporan as $data_laporan)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        @if($data_laporan->foto)
                            <img src="{{ asset($data_laporan->foto) }}" alt="Foto" class="card-img-top img-thumbnail">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title mt-3">{{ $data_laporan->judul_laporan }}</h5>
                            <p class="card-text">Status : {{ $data_laporan->statusLaporan->nama_status }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('detail_laporan', $data_laporan->id) }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    @endif


@endsection

