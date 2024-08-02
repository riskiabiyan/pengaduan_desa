@extends('dashboard')

@section('content')


<div class="row justify-content-center">
    <div class="col col-lg-8">
        <div class="card p-4">
            <h3 class="text-center mb-3">Form Pengaduan Desa</h3>
            <form action="/simpan_laporan" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status_id" value="1">
                <div class="form-group">
                    <label for="judul_laporan">Judul laporan</label>
                    <input type="text" class="form-control" name="judul_laporan">
                </div>
                <div class="form-group">
                    <label for="kategori_laporan">Kategori laporan</label>
                    <div class="radio-buttons">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori_id" id="sarana_publik" value="1" checked>
                            <label class="form-check-label" for="sarana_publik">
                                Sarana Publik
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori_id" id="pelayanan" value="2">
                            <label class="form-check-label" for="pelayanan">
                                Pelayanan
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori_id" id="tindak_kejahatan" value="3">
                            <label class="form-check-label" for="tindak_kejahatan">
                                Tindak Kejahatan
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kategori_id" id="saran" value="4">
                            <label class="form-check-label" for="saran">
                                Saran
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="isi_laporan">Isi laporan</label>
                    <textarea class="form-control" name="isi_laporan" id="isi_laporan" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="foto">Pilih foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Kirim</button>
                
            </form>
        </div>
    </div>
</div>
    
@endsection