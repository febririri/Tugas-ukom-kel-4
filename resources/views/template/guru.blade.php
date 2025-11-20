<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>

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
        <h4 class="fw-bold">Data Guru</h4>

        <a href="{{ url('/tambah_guru') }}" class="btn btn-primary px-4 py-2">
            + Tambah Guru
        </a>
    </div>

    <div class="card card-box p-4">
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                 
                    <th>Nama Guru</th>
                    <th>NIP</th>
                  
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($guru ?? [] as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>

                    

                    <td>{{ $row['nama'] }}</td>
                    <td>{{ $row['nip'] }}</td>
                 

                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada data guru.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>


</body>
</html>
