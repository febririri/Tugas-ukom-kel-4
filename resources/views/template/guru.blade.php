<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-4">Data Guru</h2>

        <!-- Tombol Tambah -->
        <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">+ Tambah Guru</a>
 <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>
        <!-- Tabel Guru -->
     <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th>Password Asli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gurus as $g)
            <tr>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->nip }}</td>
                <td>{{ $g->user->email ?? '-' }}</td>

                {{-- password asli dari plain_password --}}
                <td>{{ $g->plain_password ?? '-' }}</td>

                <td>
                    <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</body>
</html>
