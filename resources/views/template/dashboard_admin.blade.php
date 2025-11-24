<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - SistemPoin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f5f9ff;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            color: #1e293b;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            background-color: #e8f0ff;
            color: #1e293b;
            padding-top: 30px;
            position: fixed;
            width: 240px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            border-right: 1px solid #dce6ff;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
            color: #2563eb;
        }

        .sidebar .nav-link {
            color: #334155;
            font-weight: 500;
            padding: 10px 25px;
            display: block;
            border-radius: 8px;
            margin: 5px 15px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #dbeafe;
            color: #2563eb;
        }

        /* dropdown submenu */
        .submenu {
            display: none;
        }

        .arrow {
            transition: transform 0.25s ease;
        }

        .arrow.open {
            transform: rotate(90deg);
        }

        .main-content {
            margin-left: 250px;
            padding: 25px;
        }

        .topbar {
            background-color: white;
            border-radius: 10px;
            padding: 12px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        .topbar h5 {
            color: #2563eb;
            font-weight: 700;
        }

        .search-box input {
            border: 1px solid #dbeafe;
            border-radius: 25px;
            padding: 6px 14px;
            background-color: #f8fbff;
        }

        .card {
            border: none;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .card h5, .card h6 {
            color: #2563eb;
            font-weight: 600;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">

    <h4>SistemPoin</h4>

    <a href="#" class="nav-link active">Dashboard</a>

    <!-- 🔥 FIX DI SINI: tambah class dropdown-container -->
    <li class="nav-link dropdown-container">
        <a class="dropdown-btn d-flex justify-content-between align-items-center">
            <span>Data Tata Tertib</span>
            <i class="bi bi-chevron-right arrow"></i>
        </a>

        <!-- 🔥 submenu tetap, hanya kasih display:none -->
        <ul class="submenu list-unstyled ms-3">
            <li><a href="kategori_pelanggaran" class="nav-link">Kategori Pelanggaran</a></li>
            <li><a href="bentuk_pelanggaran" class="nav-link">Bentuk Pelanggaran</a></li>
            <li><a href="sanksi_pelanggaran" class="nav-link">Sanksi Pelanggaran</a></li>
        </ul>
    </li>

    <a href="#" class="nav-link">Pelanggaran Siswa</a>
    <a href="{{ route('penghargaan.index') }}" class="nav-link active">Penghargaan</a>
    <a href="kelas" class="nav-link">Kelas</a>
    <a href="siswa" class="nav-link">Siswa</a>
    <a href="guru" class="nav-link">Guru</a>
    

</div>


<div class="main-content">

    <div class="topbar d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Dashboard Admin</h5>

        <div class="search-box">
            <input type="text" class="form-control" placeholder="Cari Siswa...">
        </div>
    </div>

    <!-- konten asli kamu tetap -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6 class="fw-semibold mb-1">Salsabila Ayu</h6>
                <p class="text-muted mb-1">X TKJ</p>
                <h3 class="text-danger fw-bold mb-2">65</h3>
                <p class="text-muted">Poin Pelanggaran</p>
                <button class="btn btn-primary btn-sm">Lihat Pelanggaran</button>
            </div>
        </div>

        <!-- (DIBIARKAN APA ADANYA, TIDAK DIUBAH) -->
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6 class="fw-semibold mb-1">Gio Sanjaya</h6>
                <p class="text-muted mb-1">X RPL</p>
                <h3 class="text-danger fw-bold mb-2">60</h3>
                <p class="text-muted">Poin Pelanggaran</p>
                <button class="btn btn-primary btn-sm">Lihat Pelanggaran</button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6 class="fw-semibold mb-1">Rafi Santoso</h6>
                <p class="text-muted mb-1">X RPL</p>
                <h3 class="text-danger fw-bold mb-2">50</h3>
                <p class="text-muted">Poin Pelanggaran</p>
                <button class="btn btn-primary btn-sm">Lihat Pelanggaran</button>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6 class="fw-semibold mb-1">Muhammad Ali</h6>
                <p class="text-muted mb-1">X TKR</p>
                <h3 class="text-danger fw-bold mb-2">35</h3>
                <p class="text-muted">Poin Pelanggaran</p>
                <button class="btn btn-primary btn-sm">Lihat Pelanggaran</button>
            </div>
        </div>
    </div>

    <div class="row g-3">
      <div class="col-md-6">
        <div class="card p-3">
          <h5>Top 5 Pelanggaran yang Sering Dilakukan</h5>
          <ul class="mt-3 mb-0">
            <li>Tidak Memasukkan Baju (Siswa Putra) 5x</li>
            <li>Meninggalkan Kelas Tanpa Izin 3x</li>
            <li>Tidak Mengikuti Upacara 2x</li>
            <li>Berkata Kotor dengan Guru 2x</li>
            <li>Tidak Mengikuti Pelajaran Tanpa Izin 2x</li>
          </ul>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card p-3">
          <h5>Grafik Pelanggaran per Jurusan</h5>
          <div class="chart-placeholder">[ Grafik Placeholder ]</div>
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 SistemPoin | Dashboard Admin</p>
    </footer>
  </div>

</div>

<!-- 🔥 FIX JAVASCRIPT: hanya memperbaiki selector -->
<script>
document.querySelectorAll(".dropdown-container").forEach((dropdown) => {

    const btn = dropdown.querySelector(".dropdown-btn");
    const menu = dropdown.querySelector(".submenu");
    const arrow = dropdown.querySelector(".arrow");

    btn.addEventListener("click", () => {
        menu.style.display = menu.style.display === "block" ? "none" : "block";
        arrow.classList.toggle("open");
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
