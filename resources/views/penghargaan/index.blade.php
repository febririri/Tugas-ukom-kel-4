@extends('template.app')

@section('content')
<div class="container mt-4">

    {{-- Header + Button --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Daftar Penghargaan</h3>

        <a href="{{ route('penghargaan.create') }}" class="btn btn-success">
            + Tambah Penghargaan
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Card --}}
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Siswa</th>
                        <th>Nama Penghargaan</th>
                        <th>Tanggal</th>
                        <th width="230px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($penghargaans as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($penghargaans->currentPage()-1)*$penghargaans->perPage() }}</td>
                        <td>{{ $item->siswa->nama ?? '-' }}</td>
                        <td>{{ $item->nama_penghargaan }}</td>
                        <td>{{ $item->tanggal }}</td>

                        <td>

                            {{-- History --}}
                            <a href="{{ route('penghargaan.history', $item->siswa_id) }}"
                               class="btn btn-sm btn-info">
                                History
                            </a>


                            {{-- Edit --}}
                            <a href="{{ route('penghargaan.edit', $item->id) }}"
                               class="btn btn-sm btn-primary">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('penghargaan.delete', $item->id) }}" 
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $penghargaans->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
