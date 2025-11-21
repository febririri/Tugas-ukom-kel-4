<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Pelanggaran Siswa</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f3f7ff;
      font-family: "Poppins", sans-serif;
    }

    .custom-wrapper {
      max-width: 1100px;
      margin: auto;
    }

    .card {
      border-radius: 18px;
      border: none;
      padding: 35px;
      background: #ffffff;
      box-shadow: 0px 6px 25px rgba(0,0,0,0.06);
    }

    .card-header-custom {
      background-color: #3b82f6;
      color: white;
      border-radius: 18px 18px 0 0;
      padding: 22px;
      text-align: center;
      font-size: 1.6rem;
      font-weight: 600;
      box-shadow: 0px 3px 10px rgba(59,130,246,0.3);
    }

    .form-control, .form-select {
      border-radius: 12px;
      padding: 14px;
      background: #f8fbff;
      border: 1px solid #dbe7ff;
      transition: 0.2s;
    }

    .form-control:focus, .form-select:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
    }

    .btn-primary {
      background-color: #3b82f6;
      padding: 14px;
      font-size: 1.05rem;
      border-radius: 12px;
      border: none;
      font-weight: 600;
      transition: 0.2s;
    }

    .btn-primary:hover {
      background-color: #2563eb;
    }

    a {
      text-decoration: none;
      color: #2563eb;
      font-weight: 500;
    }
  </style>
</head>

<body>

  <div class="container py-5 custom-wrapper">

    <div class="card-header-custom">
      Input Pelanggaran Siswa
    </div>

    <div class="card mt-0 shadow-sm">
      <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- NAMA SISWA -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Siswa</label>
          <input type="text" name="nama_siswa" class="form-control" placeholder="Cari / Masukkan nama siswa" required>
        </div>

        <!-- KELAS -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Kelas</label>
          <select name="kelas" class="form-select" required>
            <option value="">Pilih kelas</option>
            <option>X</option>
            <option>XI</option>
            <option>XII</option>
          </select>
        </div>

        <!-- BENTUK PELANGGARAN -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Bentuk Pelanggaran</label>
          <select name="bentuk_pelanggaran" class="form-select" required>
            <option value="">Pilih bentuk pelanggaran</option>
            <option>Terlambat Masuk Sekolah</option>
            <option>Tidak Mengikuti Upacara</option>
            <option>Berkata Kasar</option>
            <option>Tidak Memakai Seragam Lengkap</option>
            <option>Meninggalkan Kelas Tanpa Izin</option>
          </select>
        </div>

        <!-- KETERANGAN -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Keterangan</label>
          <textarea name="keterangan" class="form-control" rows="3" placeholder="Tuliskan keterangan tambahan..." required></textarea>
        </div>

        <!-- UPLOAD BUKTI -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Upload Bukti Pelanggaran</label>
          <input type="file" name="bukti" class="form-control" accept="image/*,video/*,.pdf">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">Simpan Pelanggaran</button>
      </form>

      <div class="text-center mt-3">
        <a href="{{ route('dashboard.guru') }}">← Kembali ke Dashboard</a>
      </div>

    </div>
  </div>

</body>
</html>
