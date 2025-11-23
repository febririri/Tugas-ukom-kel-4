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
      overflow-x: hidden;
      color: #1e293b;
    }

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
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    footer {
      text-align: center;
      margin-top: 40px;
      color: #64748b;
      font-size: 14px;
    }

    .topbar img {
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
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
    <a href="#" class="nav-link text-danger"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
  </div>

  <div class="main-content">

    <!-- Topbar -->
  <div class="topbar d-flex justify-content-between align-items-center">

    <h5 class="mb-0">Dashboard Guru</h5>

    <div class="d-flex align-items-center gap-3">

        <!-- Profil Guru -->
        <div class="text-end">
            <div class="fw-semibold">{{ $guru->nama }}</div>
            <div class="text-muted" style="font-size: 13px;">{{ $user->email }}</div>
        </div>

        <!-- Foto Profil -->
        <img src="{{ asset('foto_guru/' . ($guru->foto ?? 'profile.png')) }}"
             width="45" height="45"
             style="object-fit: cover;"
             class="rounded-circle border">
    </div>

</div>

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

                <a href="{{ route('dashboard.guru.pelanggaran', $siswa->id) }}" 
                   class="btn btn-primary btn-sm">
                    Lihat Pelanggaran
                </a>
            </div>
        </div>
    @endforeach

</div>


<!-- Top 5 Pelanggaran + Grafik -->
<div class="row g-3">

    <!-- TOP 5 -->
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

    <!-- GRAFIK -->
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('grafikPelanggaran').getContext('2d');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
          label: 'Pelanggaran per Jurusan',
          data: [30, 45, 28, 60, 40, 70],
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
