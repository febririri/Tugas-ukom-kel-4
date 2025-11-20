<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Penghargaan Siswa - Sistem Poin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f8ff;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .container { max-width: 700px; margin-top: 60px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .card-header {
            background-color: #3a7bd5; color: white; border-top-left-radius: 15px;
            border-top-right-radius: 15px; text-align: center; font-weight: 600;
        }
        label { font-weight: 500; color: #1c3b77; }
        .form-control { border-radius: 10px; border: 1px solid #d0defd; }
        .btn-primary { background-color: #3a7bd5; border-radius: 10px; }
        .back-btn { display: block; margin-top: 25px; text-align: center; color: #3a7bd5; font-weight: 500; }
    </style>
</head>

<body>
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header py-3">
                <h4 class="mb-0">Input Penghargaan Siswa</h4>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_penghargaan">Jenis Penghargaan</label>
                        <input type="text" id="jenis_penghargaan" name="jenis_penghargaan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="poin">Poin</label>
                        <input type="number" id="poin" name="poin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto">Foto (Opsional)</label>
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2">Simpan Penghargaan</button>
                </form>

            </div>
        </div>

        <a href="/dashboard" class="back-btn">← Kembali ke Dashboard</a>

    </div>

</body>
</html>
