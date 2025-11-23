<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pelanggaran Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-light">
<div class="container py-5">
    <h3 class="mb-4 text-primary">Riwayat Pelanggaran: {{ $siswa->nama }} ({{ $siswa->kelas }})</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Bentuk Pelanggaran</th>
                <th>Keterangan</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->bentuk_pelanggaran }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                    @if($item->bukti)
                        <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank" class="btn btn-info btn-sm">Lihat Bukti</a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-muted text-center">Belum ada riwayat pelanggaran</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('dashboard.guru') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>
</body>
</html>
