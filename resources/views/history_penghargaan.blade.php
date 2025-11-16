<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Penghargaan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef4ff;
            font-family: "Poppins", sans-serif;
            padding: 20px;
            display: flex;
            gap: 20px;
        }

        /* MINI SIDEBAR */
        .mini-sidebar {
            width: 230px;
            background: #e9f0ff;
            padding: 25px 20px;
            border-radius: 14px;
            height: 100vh;
        }

        .mini-sidebar a {
            display: block;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 10px;
            text-decoration: none;
            color: #334;
            font-weight: 500;
        }
        .mini-sidebar a.active {
            background: #d6e5ff;
            color: #2b55d4;
            font-weight: 600;
        }
        .mini-sidebar a:hover {
            background: #dce9ff;
        }

        /* KONTEN */
        .content-area {
            width: 100%;
        }

        .pastel-card {
            background: #f3f8ff;
            border: 1px solid #d9e7ff;
            border-radius: 14px;
            padding: 25px;
        }

        .btn-pastel-primary {
            background-color: #6ea8ff;
            border-color: #6ea8ff;
            color: white;
        }

        .btn-pastel-primary:hover {
            background-color: #5d95ee;
        }

        h3 {
            color: #4468c8;
            font-weight: 600;
        }

    </style>
</head>

<body>

    <!-- MINI SIDEBAR -->
    <div class="mini-sidebar">
        <a href="{{ route('history.pelanggaran') }}">History Pelanggaran</a>
        <a href="{{ route('history.penghargaan') }}" class="active">History Penghargaan</a>
    </div>

    <!-- KONTEN -->
    <div class="content-area">

        <div class="pastel-card shadow-sm">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">History Penghargaan</h3>

                <div>
                    <a href="{{ route('penghargaan') }}" class="btn btn-pastel-primary">
                        + Input Penghargaan
                    </a>
                </div>
            </div>

            <p class="text-muted">
                Halaman ini akan menampilkan riwayat penghargaan siswa.  
                (Tabel akan dibuat setelah halaman dasar siap)
            </p>

        </div>

    </div>

</body>
</html>
