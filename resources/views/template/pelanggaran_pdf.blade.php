<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggaran Siswa</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #333; padding: 8px 5px; font-size: 12px; }
        th { background: #dde6f6; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Pelanggaran Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Bentuk Pelanggaran</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->siswa ? $item->siswa->nama : '-' }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->bentuk_pelanggaran }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
