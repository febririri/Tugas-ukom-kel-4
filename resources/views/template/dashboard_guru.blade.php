<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Guru - SistemPoin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f9ff;
      font-family: 'Poppins', sans-serif;
      color: #1e293b;
      overflow-x: hidden;
    }
    .sidebar {
      min-height: 100vh;
      background-color: #e8f0ff;
      color: #1e293b;
      padding-top: 30px;
      position: fixed;
      width: 240px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.05);
      border-right: 1px solid #dce6ff;
      z-index: 10;
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
      transition: 0.2s;
    }
    .sidebar .nav-link:hover,
    .sidebar .active {
      background-color: #dbeafe;
      color: #2563eb;
    }
    .main-content {
      margin-left: 250px;
      padding: 25px;
    }
    @media (max-width: 991px) {
      .main-content {
        margin-left: 0;
        padding: 15px;
      }
      .sidebar {
        position: static;
        width: 100%;
        min-height: auto;
        border-right: none;
        padding-top: 10px;
      }
    }
    .topbar {
      background-color: white;
      border-radius: 10px;
      padding: 12px 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      margin-bottom: 25px;
    }
    .card {
      border: none;
      border-radius: 12px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: 0.2s;
      margin-bottom: 10px;
    }
    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .fw-semibold { font-weight: 600;}
    @media (max-width: 767px) {
      .row.g-3 > [class^="col-"] {
        flex: 0 0 100%; max-width: 100%;
      }
      .sidebar, .main-content { padding-left: 0; padding-right: 0;}
      footer { font-size: 13px;}
    }
    footer {
      text-align: center;
      margin-top: 40px;
      color: #64748b;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4>SistemPoin</h4>
    <a href="{{ route('dashboard.guru') }}" class="nav-link active">Dashboard</a>
    <a href="{{ route('input.pelanggaran') }}" class="nav-link">Input Pelanggaran</a>
    <a href="{{ route('sanksi.pelanggaran') }}" class="nav-link">Sanksi Pelanggaran</a>
    <a href="{{ route('penghargaan') }}" class="nav-link">Penghargaan</a>
    <a href="{{ route('history.pelanggaran') }}" class="nav-link">History</a>
  </div>

  <div class="main-content">

    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center">
      <h5 class="mb-0 fw-semibold">Dashboard Guru</h5>
    </div>

    <!-- Kartu Siswa, Loop dari database -->
    <div class="row g-3 mb-4">
      @foreach($siswas as $siswa)
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card p-3 text-center">
          <h6 class="fw-semibold mb-1">{{ $siswa->nama }}</h6>
          <p class="text-muted mb-1">{{ $siswa->kelas }}</p>
          <h3 class="text-danger fw-bold mb-2">
            {{ $siswa->pelanggaran_sum ?? 0 }}
          </h3>
          <p class="text-muted">Poin Pelanggaran</p>
          <a href="{{ route('dashboard.guru.pelanggaran', $siswa->id) }}" class="btn btn-primary btn-sm">Lihat Pelanggaran</a>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Top 5 Pelanggaran dan Grafik -->
    <div class="row g-3">
      <div class="col-12 col-lg-6">
        <div class="card p-3 h-100">
          <h5>Top 5 Pelanggaran</h5>
          <ul class="mt-3 mb-0">
            @foreach($topPelanggaran as $pelanggaran)
              <li>{{ $pelanggaran }}</li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="card p-3 h-100">
          <h5>Grafik Pelanggaran per Jurusan</h5>
          <canvas id="grafikPelanggaran" height="160"></canvas>
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 SistemPoin | Dashboard Guru</p>
    </footer>
  </div>

  <!-- Bootstrap & Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('grafikPelanggaran').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: {!! json_encode($grafikLabels ?? ['Jan','Feb','Mar','Apr','Mei','Jun']) !!},
        datasets: [{
          label: 'Pelanggaran per Jurusan',
          data: {!! json_encode($grafikData ?? [30,45,28,60,40,70]) !!},
          borderWidth: 3,
          tension: 0.4,
          borderColor: '#2563eb',
          pointBackgroundColor: '#1d4ed8',
          pointRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false }},
        scales: { y: { beginAtZero: true }}
      }
    });
  </script>
</body>
</html>
