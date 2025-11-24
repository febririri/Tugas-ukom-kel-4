@extends('template.app')

@section('content')
<div class="card p-4">
    <h3 class="mb-3">Data Siswa</h3>

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswa as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kelas ? $item->kelas->nama_kelas : '-' }}</td>
                <td>{{ $item->jenis_kelamin }}</td>

                <td>
                    <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('siswa.destroy', $item->id) }}"
                          method="POST" style="display:inline-block"
                          onsubmit="return confirm('Yakin hapus?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
