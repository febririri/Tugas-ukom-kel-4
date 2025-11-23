<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>

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

    <h4 class="fw-bold mb-3">Tambah Guru</h4>

    <div class="card card-form p-4">
<form action="{{ route('guru.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label>Nama Guru</label>
    <input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
    <label>NIP</label>
    <input type="text" name="nip" class="form-control">
</div>

<div class="mb-3">
    <label>Email Guru</label>
    <input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
    <label>Password Guru</label>
    <input type="password" name="password" class="form-control" required>
</div>




    <div class="d-flex justify-content-between">
        <a href="{{ url('/guru') }}" class="btn btn-secondary px-4">
            Kembali
        </a>

        <button type="submit" class="btn btn-primary px-4">
            Simpan
        </button>
    </div>
</form>

    </div>
</div>

</body>
</html>
