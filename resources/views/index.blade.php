<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SistemPoin - Manajemen Poin Siswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f3f8fc;
      color: #333;
    }
    .navbar {
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .hero-section {
      background: linear-gradient(135deg, #f3f8fc, #e6f1fa);
      padding: 100px 0;
    }
    .hero-badge {
      background-color: #e8f0ff;
      color: #2563eb;
      font-weight: 600;
      border-radius: 50px;
      padding: 8px 16px;
      display: inline-block;
    }
    .hero-title span {
      color: #2563eb;
    }
    .feature-box {
      background: white;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      padding: 25px;
      transition: 0.3s;
    }
    .feature-box:hover {
      transform: translateY(-5px);
    }
    .cta-section {
      background-color: #e6f1fa;
      padding: 100px 0;
    }
    .btn-primary {
      background-color: #2563eb;
      border: none;
    }
    .btn-primary:hover {
      background-color: #1e4ed8;
    }
    .btn-outline-primary {
      border-color: #2563eb;
      color: #2563eb;
    }
    .btn-outline-primary:hover {
      background-color: #e8f0ff;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center fw-semibold" href="#">
        <div class="bg-primary text-white p-2 rounded me-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="6" width="18" height="12" rx="2"></rect>
            <circle cx="9" cy="12" r="2"></circle>
          </svg>
        </div>
        SistemPoin
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#manfaat">Manfaat</a></li>
        </ul>
      </div>
      <div class="d-flex">
        <button class="btn btn-outline-secondary me-2">Masuk</button>
        <button class="btn btn-primary">Daftar Sekarang</button>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
      <div class="col-md-6">
        <p class="hero-badge mb-3">✨ Solusi Manajemen Disiplin Siswa</p>
        <h1 class="fw-bold display-5 hero-title mb-4">
          Kelola Poin Pelanggaran & Penghargaan dengan <span>Mudah</span>
        </h1>
        <p class="text-muted mb-4">
          Platform terpadu untuk mencatat pelanggaran dan prestasi siswa secara real-time. 
          Tingkatkan disiplin dan motivasi dengan sistem poin yang transparan dan adil.
        </p>
        <button class="btn btn-primary px-4 py-2">Mulai Sekarang</button>
      </div>
      <div class="col-md-5 mt-5 mt-md-0">
        <div class="bg-white rounded-4 p-4 shadow-sm">
          <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded mb-3">
            <span>⚠️ Pelanggaran Ringan</span><span class="text-secondary">-5 Poin</span>
          </div>
          <div class="d-flex justify-content-between align-items-center bg-opacity-50 p-3 rounded mb-3" style="background-color:#e8f0ff;">
            <span>🏅 Prestasi Akademik</span><span class="text-muted">+10 Poin</span>
          </div>
          <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
            <span>🎖️ Penghargaan Khusus</span><span class="text-muted">+20 Poin</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tentang Section -->
  <section id="tentang" class="py-5 text-center">
    <div class="container">
      <h2 class="fw-bold mb-3">Mengapa SistemPoin?</h2>
      <p class="text-muted mb-5">
        Sistem manajemen poin yang dirancang untuk meningkatkan disiplin dan prestasi siswa dengan cara yang adil dan transparan.
      </p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-box">
            <h5>👥 Transparan & Adil</h5>
            <p class="text-muted small">Siswa dapat melihat riwayat poin secara real-time tanpa keputusan tersembunyi.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box">
            <h5>📊 Analitik Mendalam</h5>
            <p class="text-muted small">Pantau tren pelanggaran & prestasi dengan grafik dan data yang jelas.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-box">
            <h5>🧾 Laporan Otomatis</h5>
            <p class="text-muted small">Cetak laporan PDF dengan satu klik untuk guru dan orang tua.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section text-center">
    <div class="container">
      <h2 class="fw-bold mb-3">Siap Meningkatkan Disiplin Siswa?</h2>
      <p class="text-muted mb-4">
        Bergabunglah dengan sekolah yang telah mempercayai SistemPoin untuk mengelola disiplin dan prestasi siswa.
      </p>
      <button class="btn btn-primary me-3 px-4 py-2">Mulai Sekarang</button>
      <button class="btn btn-outline-primary px-4 py-2">Hubungi Kami</button>
    </div>
  </section>

  <footer class="py-4 text-center text-muted bg-white small">
    © 2025 SistemPoin. Semua hak dilindungi.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
