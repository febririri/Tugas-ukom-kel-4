<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .card-form {
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <h4 class="fw-bold mb-3">Tambah Siswa</h4>

    <div class="card card-form p-4">
        

<form action="{{ route('kelas.siswa.simpan',$kelas->id) }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="hidden" name="kelas" value="{{ $kelas->nama_kelas }}">

 <div class="mb-3">
        <label class="form-label">Kelas</label>
        <input type="text" class="form-control" value="{{ $kelas->nama_kelas }}" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Siswa</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">NIS</label>
        <input type="number" name="nis" class="form-control" required>
    </div>


    <div class="mb-3">
        <label class="form-label fw-semibold">Foto Siswa</label>
        <input type="file" name="foto" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between">
   <a href="{{ route('kelas.siswa', $kelas->id) }}" class="btn btn-secondary mb-3">Kembali</a>

        <button type="submit" class="btn btn-primary px-4">Simpan</button>
    </div>
</form>

    </div>
</div>

</body>
</html>
