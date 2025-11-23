<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sanksi Pelanggaran - Sistem Poin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f8ff;
      font-family: 'Poppins', sans-serif;
    }

    .container {
      max-width: 800px;
      margin-top: 60px;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .card-header {
      background-color: #3a7bd5;
      color: white;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      text-align: center;
      font-weight: 600;
    }

    table {
      border-radius: 10px;
      overflow: hidden;
    }

    th {
      background-color: #e8f0fe;
    }

    .btn-primary {
      background-color: #3a7bd5;
      border: none;
      border-radius: 8px;
      padding: 5px 10px;
      font-size: 14px;
    }

    .btn-primary:hover {
      background-color: #2f6bc4;
    }

    .back-btn {
      display: block;
      margin-top: 25px;
      text-align: center;
      color: #3a7bd5;
      text-decoration: none;
      font-weight: 500;
    }

    .back-btn:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card">
      <div class="card-header py-3">
        <h4 class="mb-0">Daftar Sanksi Pelanggaran</h4>
      </div>
      <div class="card-body p-4">
        <table class="table table-bordered text-center align-middle">
          <thead>
            <tr>
              <th>No</th>
              <th>Kriteria Pelanggaran</th>
              <th>Poin</th>
              <th>Opsi</th>
            </tr>
          </thead>
        <tbody>
                @forelse($sanksi as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kriteria_pelanggaran }}</td>
                        <td>{{ $row->poin_dari }} - {{ $row->poin_sampai }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSanksi{{ $row->id }}">
                                Lihat Sanksi
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Lihat Sanksi -->
                    <div class="modal fade" id="modalSanksi{{ $row->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Sanksi & Pembinaan - {{ $row->kriteria_pelanggaran }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><b>Bobot Pelanggaran:</b> {{ $row->poin_dari }} - {{ $row->poin_sampai }}</p>
                                    <b>Sanksi:</b>
                                    <div class="mt-2">{!! nl2br(e($row->sanksi)) !!}</div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data sanksi pelanggaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
      </div>
    </div>

  <a href="{{ route('dashboard.guru') }}" class="back-btn">
    ← Kembali
</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>