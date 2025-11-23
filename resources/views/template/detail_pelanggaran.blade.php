<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Pelanggaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #e9f0ff; font-family: 'Poppins', sans-serif; }
        .card { margin: 50px auto; max-width: 600px; border-radius: 15px; background: #f4f8ff; }
        h2 { color: #2d4ca8; font-weight: 700; margin-bottom: 30px; }
        .label { font-weight: 600; color: #354b72; }
    </style>
</head>
<body>
<div class="card shadow">
    <div class="card-body">
        <h2>Detail Pelanggaran</h2>
        <div class="mb-2"><span class="label">Nama Siswa:</span> {{ $pelanggaran->siswa->nama }}</div>
        <div class="mb-2"><span class="label">Kelas:</span> {{ $pelanggaran->kelas }}</div>
        <div class="mb-2"><span class="label">Bentuk:</span> {{ $pelanggaran->bentuk_pelanggaran }}</div>
        <div class="mb-2"><span class="label">Keterangan:</span> {{ $pelanggaran->keterangan }}</div>
        <div class="mb-3"><span class="label">Bukti:</span>
            @if($pelanggaran->bukti)
                <a href="{{ asset('storage/' . $pelanggaran->bukti) }}" target="_blank" class="btn btn-info btn-sm ms-2">Lihat Bukti</a>
            @else
                Tidak Ada
            @endif
        </div>
        <a href="{{ route('history.pelanggaran') }}" class="btn btn-outline-primary">Kembali ke History</a>
    </div>
</div>
</body>
</html>
