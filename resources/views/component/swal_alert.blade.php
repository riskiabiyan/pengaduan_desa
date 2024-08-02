@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('laporan_dikirim'))
<script>
    Swal.fire({
        title: 'Berhasil',
        text: 'Laporan berhasil dikirimkan',
        icon: 'success'
    });
</script>
@endif