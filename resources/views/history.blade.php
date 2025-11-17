<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pelanggaran</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FONT GOOGLE --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- CSS PASTEL BIRU --}}
    <style>
        body {
            background: #e8f0fe;
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
            gap: 20px;
            padding: 20px;
        }

        .mini-sidebar {
            width: 220px;
            background: #dfe9ff;
            padding: 20px;
            border-radius: 15px;
            height: auto;
        }

        .mini-sidebar a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 12px;
            color: #1a2b4c;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .mini-sidebar a.active {
            background: #c8d9ff;
            color: #2b56d6;
            font-weight: 600;
        }

        .content-area {
            flex: 1;
        }

        .pastel-card {
            background: #f4f7ff;
            border-radius: 20px;
            padding: 25px;
        }

        .btn-pastel-primary {
            background: #6ea8fe;
            color: white;
            border-radius: 10px;
            padding: 7px 14px;
            text-decoration: none;
        }

        .btn-pastel-danger {
            background: #ff8f8f;
            color: white;
            border-radius: 10px;
            padding: 7px 14px;
            text-decoration: none;
        }
    </style>

</head>
<body>

<div class="wrapper">

    <!-- MINI SIDEBAR -->
    <div class="mini-sidebar">
        <a href="{{ route('history.pelanggaran') }}" class="active">History Pelanggaran</a>
        <a href="{{ route('history.penghargaan') }}">History Penghargaan</a>
    </div>

    <!-- CONTENT -->
    <div class="content-area">

        <div class="pastel-card shadow-sm">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">History Pelanggaran</h3>

                <div class="d-flex gap-2">
                    <a href="{{ route('input.pelanggaran') }}" class="btn btn-pastel-primary">+ Input Pelanggaran</a>
                    <a href="#" class="btn btn-pastel-danger">Cetak Pelanggaran</a>
                </div>
            </div>

            <p class="text-secondary">
                Halaman ini akan menampilkan riwayat pelanggaran siswa.  
                (Tabel akan dibuat setelah halaman dasar siap)
            </p>

        </div>

    </div>

</div>

</body>
</html>
