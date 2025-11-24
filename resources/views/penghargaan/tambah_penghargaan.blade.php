@extends('template.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Penghargaan</h3>

    <form action="{{ route('penghargaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

      <div class="mb-3">
    <label class="form-label">Siswa</label>
    <select name="siswa_id" class="form-control" required>
        <option value="">-- Pilih Siswa --</option>
        @foreach($siswa as $s)
            <option value="{{ $s->id }}">{{ $s->nama }} ({{ $s->nis }})</option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label>Nama Penghargaan</label>
            <input type="text" name="nama_penghargaan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Bukti Foto (opsional)</label>
            <input type="file" name="bukti_foto" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('penghargaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
