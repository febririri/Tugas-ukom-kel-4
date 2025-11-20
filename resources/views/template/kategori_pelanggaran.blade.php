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
</style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Kategori Pelanggaran</h3>

        <!-- Tombol buka modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
            + Tambah Jenis Pelanggaran
        </button>
        
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-3">
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
@foreach($kategori as $i => $row)
<tr>
    <td>{{ $i + 1 }}</td>
    <td>{{ $row->nama_kategori }}</td>
<td>
    {{ $row->bentuk_count }} 
</td>
    
    
    <td>
         <div class="d-flex gap-2">
        <a href="{{ route('bentuk.index', $row->id) }}" class="btn btn-sm btn-primary">
            Lihat Bentuk
        </a>

      <form action="{{ route('kategori.edit', $row->id) }}" method="GET">
    <button class="btn btn-warning btn-sm">Edit</button>
</form>

      <a href="{{ route('kategori.hapus', $row->id) }}" 
   class="btn btn-danger"
   onclick="return confirm('Yakin ingin menghapus?')">
   Hapus
</a>
 </div>
    </td>
</tr>
@endforeach
</tbody>

        </table>
    </div>
</div>


<!-- MODAL TAMBAH KATEGORI -->
<div class="modal fade" id="modalTambahKategori">
    <div class="modal-dialog">
        
        <div class="modal-content">

            <form action="{{ route('kategori.simpan') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jenis Pelanggaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>

                    
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>

            </form>

        </div>
    </div>
 
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
