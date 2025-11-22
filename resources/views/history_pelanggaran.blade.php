<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #e9f0ff; font-family: 'Poppins', sans-serif; }
        .wrapper { display: flex; width: 100%; padding: 20px; }
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
        }
        .mini-sidebar a.active {
            background: #bcd0ff;
            color: #2455d6;
            font-weight: 600;
        }
        .pastel-card {
            background: #f2f6ff;
            padding: 25px;
            border-radius: 16px;
            border: 1px solid #dfe7ff;
        }
        h3 { color: #2d4ca8; font-weight: 700; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="mini-sidebar">
        <a href="{{ route('history.pelanggaran') }}" class="active">History Pelanggaran</a>
        <a href="{{ route('history.penghargaan') }}">History Penghargaan</a>
    </div>

    <div class="content-area" style="flex: 1;">
        <div class="pastel-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">History Pelanggaran</h3>
                <div>
                    <a href="{{ route('input.pelanggaran') }}" class="btn btn-primary me-2">
                        + Input Pelanggaran
                    </a>
                    <a href="#" class="btn btn-danger">Cetak Pelanggaran</a>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Bentuk Pelanggaran</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->siswa ? $item->siswa->nama : '-' }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->bentuk_pelanggaran }}</td>
                            <td>
                                @if($item->bukti)
                                    <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pelanggaran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
