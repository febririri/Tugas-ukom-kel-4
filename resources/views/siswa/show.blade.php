@extends('template.app')

@section('content')
<div class="container mt-4">

    <h3>Detail Siswa</h3>

    <div class="card p-3">
        <div class="row">
            <div class="col-md-3">
                @if ($siswa->foto)
                    <img src="{{ asset('foto_siswa/'.$siswa->foto) }}" width="100%">
                @else
                    <p>Tidak ada foto</p>
                @endif
            </div>

            <div class="col-md-9">
                <p><b>NIS:</b> {{ $siswa->nis }}</p>
                <p><b>Nama:</b> {{ $siswa->nama }}</p>
                <p><b>Kelas:</b> {{ $siswa->kelas->nama_kelas ?? '-' }}</p>

                <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>

</div>
@endsection
