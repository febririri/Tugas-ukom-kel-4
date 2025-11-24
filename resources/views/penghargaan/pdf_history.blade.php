<!DOCTYPE html>
<html>
<head>
    <title>Laporan History Penghargaan</title>
    <style>
        body { font-family: sans-serif; }
        table { width:100%; border-collapse: collapse; margin-top:20px;}
        th, td { border:1px solid #000; padding:8px; text-align:left;}
        th { background:#efefef; }
    </style>
</head>
<body>

<h2>History Penghargaan</h2>

<table>
    <thead>
        <tr>
            <th>Siswa</th>
            <th>Nama Penghargaan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($histories as $item)
        <tr>
            <td>{{ $item->siswa->nama }}</td>
            <td>{{ $item->nama_penghargaan }}</td>
            <td>{{ $item->tanggal }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
