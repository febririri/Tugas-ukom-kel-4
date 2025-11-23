<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pelanggaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #e9f0ff; font-family: 'Poppins', sans-serif; }
        .card { margin: 50px auto; max-width: 600px; border-radius: 15px; background: #f4f8ff; }
        h2 { color: #2056b3; font-weight: 700; margin-bottom: 30px;}
    </style>
</head>
<body>
<div class="card shadow">
    <div class="card-body">
        <h2>Edit Data Pelanggaran</h2>
        <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="siswa_id" class="form-label">Nama Siswa</label>
                <select name="siswa_id" class="form-select" required>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ $pelanggaran->siswa_id == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $pelanggaran->kelas) }}" required>
            </div>
            <div class="mb-3">
                <label for="bentuk_pelanggaran" class="form-label">Bentuk Pelanggaran</label>
                <input type="text" name="bentuk_pelanggaran" class="form-control" value="{{ old('bentuk_pelanggaran', $pelanggaran->bentuk_pelanggaran) }}" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan', $pelanggaran->keterangan) }}">
            </div>
            <div class="mb-3">
                <label for="bukti" class="form-label">Bukti (Upload Baru Jika Mau Ganti)</label>
                <input type="file" name="bukti" class="form-control">
                @if ($pelanggaran->bukti)
                    <div class="mt-1">Bukti lama:
                        <a href="{{ asset('storage/' . $pelanggaran->bukti) }}" target="_blank" class="btn btn-info btn-sm">Lihat Bukti</a>
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('history.pelanggaran') }}" class="btn btn-outline-secondary ms-2">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
