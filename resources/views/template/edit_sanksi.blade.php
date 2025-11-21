@extends('template.template')

@section('content')

<div class="container mt-4">
    <h3>Edit Sanksi Pelanggaran</h3>

    <form action="{{ route('sanksi.update', $sanksi->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kriteria Pelanggaran</label>
            <input type="text" name="kriteria_pelanggaran"
                   class="form-control"
                   value="{{ $sanksi->kriteria_pelanggaran }}" required>
        </div>

        <div class="mb-3">
            <label>Poin Dari</label>
            <input type="number" name="poin_dari"
                   class="form-control"
                   value="{{ $sanksi->poin_dari }}" required>
        </div>

        <div class="mb-3">
            <label>Poin Sampai</label>
            <input type="number" name="poin_sampai"
                   class="form-control"
                   value="{{ $sanksi->poin_sampai }}" required>
        </div>

        <div class="mb-3">
            <label>Sanksi</label>
            <textarea name="sanksi" class="form-control" rows="4" required>{{ $sanksi->sanksi }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('sanksi.pelanggaran') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
