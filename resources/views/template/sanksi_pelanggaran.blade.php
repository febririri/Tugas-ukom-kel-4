<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanksi Pelanggaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .card-kategori {
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        .btn-tambah {
            border-radius: 8px;
            padding: 8px 14px;
        }

        .btn-edit {
            background: #ffc107;
            color: white;
        }

        .btn-hapus {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Sanksi Pelanggaran</h3>
        <button class="btn btn-primary btn-tambah" id="btnTambah">+ Tambah Sanksi Pelanggaran</button>
    </div>

    <!-- Form Tambah Sanksi (default hidden) -->
    <div id="formTambah" class="card p-3 mb-4" style="display: none;">
        <h5 class="mb-3">Form Tambah Sanksi Pelanggaran</h5>
        <form action="{{ route('sanksi.simpan') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kriteria Pelanggaran</label>
                <input type="text" name="kriteria_pelanggaran" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Poin Dari</label>
                <input type="number" name="poin_dari" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Poin Sampai</label>
                <input type="number" name="poin_sampai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sanksi</label>
                <input type="text" name="sanksi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>

    <div class="card card-kategori p-3">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria Pelanggaran</th>
                    <th>Poin</th>
                    <th>Sanksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse(($sanksi ?? []) as $i => $row)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $row['kriteria_pelanggaran'] }}</td>
                        <td>{{ $row['poin_dari'] ?? '' }} - {{ $row['poin_sampai'] ?? '' }}</td>
                        <td>{{ $row['sanksi'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data sanksi pelanggaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Toggle form tambah
    document.getElementById('btnTambah').addEventListener('click', function() {
        let form = document.getElementById('formTambah');
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
    });
</script>

</body>
</html>
