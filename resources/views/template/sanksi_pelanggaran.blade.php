<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanksi Pelanggaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f5f5f5; font-family: Arial, sans-serif; }
        .card-kategori { border-radius: 12px; box-shadow: 0 0 12px rgba(0,0,0,0.1); }
        .btn-edit { background: #ffc107; color: white; }
        .btn-hapus { background: #dc3545; color: white; }
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Sanksi Pelanggaran</h3>
        <a href="{{ route('sanksi.tambah') }}" class="btn btn-primary">+ Tambah Sanksi Pelanggaran</a>
    </div>
<a href="{{ route('dashboard.admin') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>


    <div class="card card-kategori p-3">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria Pelanggaran</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($sanksi as $i => $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kriteria_pelanggaran }}</td>
                        <td>{{ $row->poin_dari }} - {{ $row->poin_sampai }}</td>
                       <td>
    <div class="d-flex gap-2">
    <button class="btn btn-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalSanksi{{ $row->id }}">
                                Lihat Sanksi
                            </button>
        <a href="{{ route('sanksi.edit', $row->id) }}" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="{{ route('sanksi.hapus', $row->id) }}" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin ingin menghapus?')">
           Hapus
        </a>

    </div>
</td>
                    </tr>

                    <!-- MODAL LIHAT SANKSI -->
                    <div class="modal fade" id="modalSanksi{{ $row->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">
                                        Sanksi & Pembinaan - {{ $row->kriteria_pelanggaran }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <p><b>Bobot Pelanggaran:</b> {{ $row->poin_dari }} - {{ $row->poin_sampai }}</p>

                                    <b>Sanksi:</b>
                                    <div class="mt-2">
                                        {!! nl2br(e($row->sanksi)) !!}
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

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

</body>
</html>