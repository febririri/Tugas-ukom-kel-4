<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3 class="fw-bold mb-3">Detail Siswa</h3>

    <div class="card p-4">
        
        <div class="text-center mb-3">
            @if($siswa->foto)
                <img src="{{ asset('foto_siswa/' . $siswa->foto) }}" width="150" class="rounded-circle">
            @else
                <small class="text-muted">Tidak ada foto</small>
            @endif
        </div>

        <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
        <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
        <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>

        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>

</div>

</body>
</html>
