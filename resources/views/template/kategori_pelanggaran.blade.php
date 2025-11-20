<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kategori Pelanggaran</title>

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
</style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Kategori Pelanggaran</h3>

        <a href="{{ url('/tambah_kategori') }}" class="btn btn-primary">
            + Tambah Jenis Pelanggaran
        </a>
    </div>

    <div class="card card-kategori p-3">

        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kategori Pelanggaran</th>
                    <th>Bentuk Pelanggaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @php
                    // Ambil semua bentuk pelanggaran
                    $path = public_path('bentuk_pelanggaran.json');
                    $bentuk_all = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
                @endphp

                @foreach($kategori as $i => $row)

                    @php
                        // Hitung jumlah bentuk berdasarkan kategori
                        $jumlah_bentuk = collect($bentuk_all)
                                            ->where('kategori', $row['nama_kategori'])
                                            ->count();
                    @endphp

                    <tr>
                        <td>{{ $i + 1 }}</td>

                        <td>{{ $row['nama_kategori'] }}</td>

                        <td>{{ $jumlah_bentuk }}</td>

                        <td>
                            <!-- Tombol ke bentuk pelanggaran -->
                            <a href="{{ url('/bentuk_pelanggaran/' . $row['nama_kategori']) }}"
                               class="btn btn-primary btn-sm">
                                Bentuk ({{ $jumlah_bentuk }})
                            </a>

                            <a href="{{ url('/edit_kategori/' . $i) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="{{ url('/hapus_kategori/' . $i) }}"
                               onclick="return confirm('Yakin hapus?')"
                               class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
