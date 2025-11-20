<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bentuk Pelanggaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: Arial, sans-serif;
    }
    .card-kategori {
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }
    .btn-edit { background: #ffc107; color: white; }
    .btn-hapus { background: #dc3545; color: white; }
</style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">{{ $kategori }}</h3>

        <a href="{{ url('/tambah_bentuk/'.$kategori) }}" class="btn btn-primary">
            + Tambah Bentuk Pelanggaran
        </a>
    </div>

    <div class="card card-kategori p-3">

        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Bentuk Pelanggaran</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($bentuk as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row['nama_bentuk'] }}</td>
                    <td>{{ $row['poin'] }}</td>

                    <td>
                        <a href="{{ url('/edit_bentuk/'.$kategori.'/'.$i) }}" class="btn btn-edit btn-sm">Edit</a>

                        <a href="{{ url('/hapus_bentuk/'.$kategori.'/'.$i) }}"
                           class="btn btn-hapus btn-sm"
                           onclick="return confirm('Yakin Hapus?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada bentuk pelanggaran.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

</body>
</html>
