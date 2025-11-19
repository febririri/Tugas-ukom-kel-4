 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f4f4;
        }
        .table thead {
            background: #f8f9fa;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Seluruh Kelas</h4>

        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahKelas">
            + Tambah Kelas
        </button>
    </div>
    

    <!-- TABEL -->
    <div class="card p-3">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Siswa</th>
                    <th>Pelanggaran</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
<tbody>
@forelse($kelas as $i => $row)
<tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $row->nama_kelas }}</td>
    <td>0</td> <!-- sementara -->
    <td>0 Kali</td>
    <td>0</td>
    <td>
       <a href="{{ route('kelas.siswa', $row->id) }}" class="btn btn-success btn-sm">
    Lihat Siswa
</a>
        <a href="{{ route('kelas.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('kelas.hapus', $row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
        <a href="{{ route('kelas.print', $row->id) }}" class="btn btn-primary btn-sm">Print</a>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-muted py-4">
        Belum ada data kelas
    </td>
</tr>
@endforelse
</tbody>
        </table>
    </div>
</div>


<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambahKelas">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('kelas.simpan') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>