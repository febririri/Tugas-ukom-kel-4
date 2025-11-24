@extends('template.app')

@section('content')
<h3>History Penghargaan : {{ $siswa->nama }}</h3>

<table class="table">
    <tr>
        <th>Nama Penghargaan</th>
        <th>Guru</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    @foreach($siswa->penghargaan as $p)
    <tr>
        <td>{{ $p->nama_penghargaan }}</td>
        <td>{{ $p->guru->nama }}</td>
        <td>{{ $p->tanggal }}</td>
        <td>
            <a href="{{ route('penghargaan.history.pdf', $p->id) }}" class="btn btn-sm btn-danger">
                Download PDF
            </a>
        </td>
    </tr>
    @endforeach
</table>

@endsection
