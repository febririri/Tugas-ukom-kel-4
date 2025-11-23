<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <div class="card shadow-sm">
            <div class="card-header text-center" style="font-weight: bold; font-size: 18px;">
                Edit Data Guru
            </div>

            <div class="card-body">

                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf

                    <!-- NAMA -->
                    <div class="mb-3">
                        <label class="form-label">Nama Guru</label>
                        <input
                            type="text"
                            name="nama"
                            value="{{ $guru->nama }}"
                            class="form-control"
                            required
                        >
                    </div>

                    <!-- NIP -->
                    <div class="mb-3">
                        <label class="form-label">NIP</label>
                        <input
                            type="text"
                            name="nip"
                            value="{{ $guru->nip }}"
                            class="form-control"
                            required
                        >
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ $guru->email }}"
                            class="form-control"
                            required
                        >
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="text"
                            name="password"
                            value="{{ $guru->password }}"
                            class="form-control"
                        >
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
