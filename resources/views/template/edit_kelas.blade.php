<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h4 class="fw-bold mb-3">Edit Kelas</h4>

    <div class="card p-3">

<form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
@csrf

    <div class="mb-3">
        <label class="form-label">Nama Kelas</label>
        <input type="text" name="nama_kelas" class="form-control"
               value="{{ $kelas->nama_kelas }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>

</form>

    </div>

</div>

</body>
</html>
