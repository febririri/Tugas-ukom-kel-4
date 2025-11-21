<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Bentuk Pelanggaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: Arial, sans-serif;
    }
    .card-form {
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
</style>

</head>
<body>

<div class="container mt-4">

    {{-- Tombol kembali ke daftar bentuk --}}
    <a href="{{ route('bentuk.index', $kategori->id) }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card card-form p-4">
        <h4 class="fw-bold mb-3">Tambah Bentuk Pelanggaran</h4>

        <form action="{{ route('bentuk.store') }}" method="POST">
            @csrf

            {{-- WAJIB! kirim id kategori agar tidak NULL --}}
            <input type="hidden" name="id_kategori_pelanggaran" value="{{ $kategori->id }}">

            <div class="mb-3">
                <label class="form-label">Nama Bentuk Pelanggaran</label>
                <input type="text" name="nama_bentuk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Poin Pelanggaran</label>
                <input type="number" name="poin" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>

    </div>
</div>

</body>
</html>
