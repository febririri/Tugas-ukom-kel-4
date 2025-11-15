<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Pelanggaran Siswa</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5faff;
      font-family: "Poppins", sans-serif;
    }
    h1 {
      font-weight: 700;
      color: #0a1931;
    }
    p {
      color: #5c677d;
    }
    .card {
      border-radius: 15px;
      border: 1px solid #e3eaf5;
      background-color: #ffffff;
    }
    .form-control, .form-select, textarea {
      background-color: #f2f8ff;
      border: 1px solid #d9e4f5;
    }
    .form-control:focus, .form-select:focus, textarea:focus {
      border-color: #1976d2;
      box-shadow: 0 0 5px rgba(25, 118, 210, 0.2);
    }
    .upload-area {
      border: 2px dashed #bcd2f5;
      border-radius: 10px;
      padding: 60px;
      text-align: center;
      background-color: #f5faff;
      transition: all 0.3s ease;
    }
    .upload-area:hover {
      border-color: #1976d2;
      background-color: #e9f3ff;
    }
    .btn-primary {
      background-color: #1976d2;
      border: none;
      font-weight: 500;
    }
    .btn-primary:hover {
      background-color: #125ea8;
    }
    .btn-secondary {
      background-color: #90a4ae;
      border: none;
    }
    .btn-secondary:hover {
      background-color: #78909c;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <h1 class="mb-2">Input Pelanggaran Siswa</h1>
    <p class="mb-4">Cari siswa, pilih jenis pelanggaran, dan upload bukti</p>

    <form action="#" method="POST" enctype="multipart/form-data">

      <div class="card shadow-sm p-4 mb-4">
        <h5 class="fw-semibold mb-3"><i class="bi bi-search"></i> Cari dan Pilih Siswa</h5>
        <label class="form-label fw-semibold">Cari Siswa (Nama atau NIS)</label>
        <input type="text" class="form-control" placeholder="Ketik nama atau NIS siswa..." required>
      </div>

      <div class="card shadow-sm p-4 mb-4">
        <h5 class="fw-semibold mb-3">Detail Pelanggaran</h5>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Tanggal Pelanggaran</label>
            <input type="date" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">Jenis Pelanggaran</label>
            <select class="form-select" required>
              <option value="">Pilih jenis pelanggaran</option>
              <option value="Ringan">Ringan</option>
              <option value="Sedang">Sedang</option>
              <option value="Berat">Berat</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Bentuk Pelanggaran</label>
          <select class="form-select" required>
            <option value="">Pilih bentuk pelanggaran</option>
            <option value="Tidak Mengikuti Upacara">Tidak Mengikuti Upacara</option>
            <option value="Terlambat Masuk Sekolah">Terlambat Masuk Sekolah</option>
            <option value="Berkata Kasar">Berkata Kasar</option>
            <option value="Tidak Memakai Seragam Lengkap">Tidak Memakai Seragam Lengkap</option>
            <option value="Meninggalkan Kelas Tanpa Izin">Meninggalkan Kelas Tanpa Izin</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Deskripsi Pelanggaran</label>
          <textarea class="form-control" rows="4" placeholder="Jelaskan secara detail pelanggaran yang terjadi..." required></textarea>
        </div>
      </div>

      <!-- Upload Bukti -->
      <div class="card shadow-sm p-4 mb-4">
        <h5 class="fw-semibold mb-3"><i class="bi bi-upload"></i> Upload Bukti Pelanggaran</h5>
        <p class="text-muted">File Bukti (Foto/Video/Dokumen)</p>
        <div class="upload-area mb-3">
          <i class="bi bi-cloud-arrow-up display-5 text-primary mb-2"></i>
          <p class="fw-semibold mb-1">Klik untuk upload file</p>
          <p class="text-muted small mb-2">atau drag dan drop file di sini</p>
          <input type="file" class="form-control mt-2" accept=".jpg,.jpeg,.png,.mp4,.pdf,.docx">
          <p class="text-muted small mt-2">Format: Gambar, Video, PDF, atau Dokumen</p>
        </div>
      </div>

      <!-- Tombol -->
      <div class="d-flex justify-content-end">
        <button type="reset" class="btn btn-secondary me-2">Bersihkan</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pelanggaran</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
