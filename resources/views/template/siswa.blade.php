<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .card-box {
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
        }
    </style>

</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Siswa</h4>
<a href="{{ route('siswa.create', $kelas->id) }}" class="btn btn-primary">
    + Tambah Siswa
</a>
    </div>

    <div class="card card-box p-4">
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

          <tbody>
    @forelse($siswa as $i => $row)
    <tr>
        <td>{{ $i + 1 }}</td>

        <td>
            @if($row->foto)
                <img src="{{ asset('foto_siswa/' . $row->foto) }}" width="60" class="rounded">
            @else
                <span class="text-muted">-</span>
            @endif
        </td>

        <td>{{ $row->nama }}</td>
        <td>{{ $row->nis }}</td>
        <td>{{ $row->kelas }}</td>

     <td>
    <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <a href="{{ route('siswa.hapus', $row->id) }}"
       onclick="return confirm('Yakin ingin menghapus?')"
       class="btn btn-danger btn-sm">
       Hapus
    </a>
    <a href="{{ route('siswa.show', $row->id) }}" class="btn btn-info btn-sm">
    Detail
</a>

</td>

    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center text-muted">
            Belum ada data siswa.
        </td>
    </tr>
    @endforelse
</tbody>

        </table>
    </div>
</div>


</body>
</html>
