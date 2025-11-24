@extends('template.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Penghargaan</h3>

    <form action="{{ route('penghargaan.update', $penghargaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Siswa</label>
            <select name="siswa_id" class="form-control" required>
                @foreach ($siswa as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $penghargaan->siswa_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Penghargaan</label>
            <input type="text" name="nama_penghargaan" class="form-control" value="{{ $penghargaan->nama_penghargaan }}" required>
        </div>

        <div class="mb-3">
            <label>Bukti Foto (opsional)</label>
            <input type="file" name="bukti_foto" class="form-control">
            @if($penghargaan->bukti_foto)
                <img src="{{ asset($penghargaan->bukti_foto) }}" width="120" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $penghargaan->tanggal }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('penghargaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
