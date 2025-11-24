<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>History Pelanggaran</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background: #eee; }
    </style>
</head>

<body>

<h2 style="text-align:center;">Laporan History Penghargaan</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Pelanggaran</th>
            <th>Kelas</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>
    @foreach($data as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->siswa->nama ?? '-' }}</td>
            <td>{{ $item->bentuk_pelanggaran }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
