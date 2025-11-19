<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Sanksi Pelanggaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body { background: #f5f5f5; font-family: Arial, sans-serif; }
    .card-form { border-radius: 12px; box-shadow: 0 0 12px rgba(0,0,0,0.1); }
</style>

</head>
<body>

<div class="container mt-4">

    <h4 class="fw-bold mb-3">Tambah Sanksi Pelanggaran</h4>

    <div class="card card-form p-4">

        <form action="{{ route('sanksi.simpan') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Kriteria Pelanggaran</label>
                <input type="text" name="kriteria_pelanggaran" class="form-control" required>
            </div>

            <label class="fw-bold mb-1">Bobot / Poin Pelanggaran</label>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Poin Dari</label>
                    <input type="number" name="poin_dari" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Poin Sampai</label>
                    <input type="number" name="poin_sampai" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Sanksi dan Pembinaan</label>
                <textarea name="sanksi" rows="3" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">✔ Simpan</button>

        </form>

    </div>

</div>

</body>
</html>