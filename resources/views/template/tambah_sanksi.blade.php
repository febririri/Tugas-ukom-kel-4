<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Sanksi Pelanggaran</title>

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

    .btn-data {
        background: #0d6efd;
        color: white;
    }
</style>

</head>
<body>

<div class="container mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Tambah Sanksi Pelanggaran</h4>

       
    </div>

    <!-- CARD FORM -->
    <div class="card card-form p-4">

        <form action="{{ url('/tambah_sanksi') }}" method="POST">
            @csrf

            <!-- INPUT KRITERIA -->
            <div class="mb-3">
                <label class="form-label fw-bold">Kriteria Pelanggaran</label>
                <input type="text" name="kriteria_pelanggaran" class="form-control" required>
            </div>

            <!-- RANGE POIN -->
            <label class="fw-bold mb-1">Bobot / Poin Pelanggaran</label>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bobot Dari</label>
                    <input type="number" name="bobot_dari" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Bobot Sampai</label>
                    <input type="number" name="bobot_sampai" class="form-control" required>
                </div>
            </div>

            <!-- SANKSI -->
            <div class="mb-3">
                <label class="form-label fw-bold">Sanksi dan Pembinaan</label>
                <textarea name="sanksi" rows="3" class="form-control" required></textarea>
            </div>


            <button type="submit" class="btn btn-success">
                ✔ Simpan
            </button>

        </form>

    </div>
</div>

</body>
</html>
