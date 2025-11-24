<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SistemPoin')</title>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #eef3ff;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #ffffff;
            border-right: 1px solid #dce4f7;
            padding: 20px 15px;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar h4 {
            font-weight: 700;
            color: #3b5bdb;
            text-align: center;
            margin-bottom: 25px;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed h4 {
            opacity: 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            font-size: 15px;
            color: #3d3d3d;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 6px;
            transition: 0.2s;
            white-space: nowrap;
        }

        .sidebar a i {
            font-size: 20px;
        }

        .sidebar.collapsed a span {
            display: none;
        }

        .sidebar a:hover {
            background: #3b5bdb;
            color: white;
        }

        .sidebar a.active {
            background: #3b5bdb;
            color: white;
            font-weight: 600;
        }

        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* Toggle Button */
        .toggle-btn {
            font-size: 26px;
            cursor: pointer;
            color: #3b5bdb;
            margin-bottom: 15px;
        }

        .dash-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        thead {
            background: #3b5bdb !important;
            color: white;
        }
    </style>

</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar" id="sidebar">
        <h4>SistemPoin</h4>

        <a href="/dashboard-admin"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
        <a href="{{ route('kategori.pelanggaran') }}"><i class="bi bi-list-check"></i> <span>Data Tata Tertib</span></a>
        <a href="{{ route('history.pelanggaran') }}"><i class="bi bi-exclamation-octagon"></i> <span>Pelanggaran Siswa</span></a>
        <a href="{{ route('penghargaan.index') }}"><i class="bi bi-star"></i> <span>Penghargaan</span></a>
        <a href="{{ route('kelas.index') }}"><i class="bi bi-people"></i> <span>Kelas</span></a>
        <a href="{{ route('siswa.index') }}"><i class="bi bi-mortarboard"></i> <span>Siswa</span></a>
        <a href="{{ route('guru.index') }}"><i class="bi bi-person-badge"></i> <span>Guru</span></a>

        <hr>

        <a class="text-danger" href="/logout"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a>
    </div>

    {{-- Main Content --}}
    <div class="main-content" id="main-content">

        <span class="toggle-btn" id="toggle-btn">
            <i class="bi bi-list"></i>
        </span>

        @yield('content')
    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Toggle Script --}}
    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
    </script>

</body>
</html>
