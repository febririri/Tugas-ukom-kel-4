<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pelanggaran</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #e9f0ff; /* pastel blue */
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
            width: 100%;
            padding: 20px;
        }

        /* MINI SIDEBAR */
        .mini-sidebar {
            width: 220px;
            background: #dce6ff;
            padding: 20px;
            border-radius: 12px;
            height: fit-content;
            margin-right: 20px;
        }

        .mini-sidebar a {
            display: block;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            color: #354b72;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s;
        }

        .mini-sidebar a:hover {
            background: #c8d9ff;
        }

        .mini-sidebar a.active {
            background: #bcd0ff;
            color: #2455d6;
            font-weight: 600;
        }

        /* CARD KONTEN */
        .pastel-card {
            background: #f2f6ff;
            padding: 25px;
            border-radius: 16px;
            border: 1px solid #dfe7ff;
        }

        h3 {
            color: #2d4ca8;
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR KECIL -->
    <div class="mini-sidebar">
        <a href="{{ route('history.pelanggaran') }}" class="active">History Pelanggaran</a>
        <a href="{{ route('history.penghargaan') }}">History Penghargaan</a>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="content-area" style="flex: 1;">

        <div class="pastel-card shadow-sm">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">History Pelanggaran</h3>

                <div>
                    <a href="{{ route('input.pelanggaran') }}" class="btn btn-primary me-2">
                        + Input Pelanggaran
                    </a>
                    <a href="#" class="btn btn-danger">
                        Cetak Pelanggaran
                    </a>
                </div>
            </div>

            <p>Halaman ini akan menampilkan riwayat pelanggaran siswa. Tabel akan ditambahkan setelah data siap.</p>

        </div>

    </div>
</div>

</body>
</html>
