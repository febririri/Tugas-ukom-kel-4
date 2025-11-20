<!DOCTYPE html>
<html>
<head>
    <title>Edit Bentuk Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h4>Edit Bentuk Pelanggaran ({{ $kategori->nama_kategori }})</h4>

<form action="{{ route('bentuk.update', $bentuk->id) }}" method="POST">
    @csrf
    <input type="hidden" name="id_kategori_pelanggaran" value="{{ $kategori->id }}">

    <div class="mb-3">
        <label>Nama Bentuk</label>
        <input type="text" name="nama_bentuk" value="{{ $bentuk->nama_bentuk }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Poin</label>
        <input type="number" name="poin" value="{{ $bentuk->poin }}" class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
    <a href="/bentuk/{{ $kategori->id }}" class="btn btn-secondary">Batal</a>
</form>

</body>
</html>
