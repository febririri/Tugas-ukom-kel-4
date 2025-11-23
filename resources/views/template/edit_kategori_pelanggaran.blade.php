
@extends('template.template')
@section('title', 'Edit Kategori Pelanggaran')
@section('content')
<div class="container">
    <h3>Edit Kategori</h3>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
      

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kategori.pelanggaran') }}" class="btn btn-secondary mb-3">
    ← Kembali
</a>
    </form>
</div>
@endsection