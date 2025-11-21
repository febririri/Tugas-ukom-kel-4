<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h4 class="fw-bold mb-3">Edit Siswa</h4>

    <div class="card p-4">

<form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="mb-3">
        <label class="form-label">Nama Siswa</label>
        <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">NIS</label>
        <input type="number" name="nis" value="{{ $siswa->nis }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kelas</label>
        <select name="kelas" class="form-control" required>
            @foreach($kelas as $k)
                <option value="{{ $k->nama_kelas }}" {{ $siswa->kelas == $k->nama_kelas ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto Siswa</label><br>
        @if($siswa->foto)
            <img src="{{ asset('foto_siswa/' . $siswa->foto) }}" width="90" class="mb-2">
        @endif
        <input type="file" name="foto" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>

</form>

    </div>
</div>

</body>
</html>
