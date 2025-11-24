<div class="card shadow-sm border-0 p-4 rounded-3">

    <div class="mb-3">
        <label class="form-label fw-semibold">NIS</label>
        <input type="text" 
               name="nis" 
               value="{{ old('nis', $siswa->nis ?? '') }}" 
               class="form-control form-control-lg" 
               placeholder="Masukkan NIS..."
               required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Nama Siswa</label>
        <input type="text" 
               name="nama" 
               value="{{ old('nama', $siswa->nama ?? '') }}" 
               class="form-control form-control-lg"
               placeholder="Nama lengkap siswa..."
               required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Kelas</label>
        <select name="kelas_id" class="form-select form-select-lg" required>
            <option value="">-- Pilih Kelas --</option>

            @foreach ($kelas as $k)
                <option value="{{ $k->id }}"
                    {{ (old('kelas_id', $siswa->kelas_id ?? '') == $k->id) ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Foto Siswa</label>
        <input type="file" name="foto" class="form-control form-control-lg">

        @if(isset($siswa) && $siswa->foto)
            <div class="mt-3">
                <img src="{{ asset('foto_siswa/'.$siswa->foto) }}" 
                     class="rounded shadow-sm" 
                     width="120">
            </div>
        @endif
    </div>

    <div class="mt-4">
        <button class="btn btn-primary btn-lg px-4">
            <i class="bi bi-check-circle"></i> Simpan
        </button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-lg ms-2 px-4">
            Batal
        </a>
    </div>

</div>
