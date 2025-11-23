<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Pelanggaran Siswa</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <style>
    body { background-color: #f3f7ff; font-family: "Poppins", sans-serif; }
    .custom-wrapper { max-width: 1100px; margin: auto; }
    .card { border-radius: 18px; border: none; padding: 35px; background: #fff; box-shadow: 0px 6px 25px rgba(0,0,0,0.06); }
    .card-header-custom { background: #3b82f6; color:#fff; border-radius:18px 18px 0 0; padding:22px; text-align:center; font-size:1.6rem; font-weight:600; }
    .form-control, .form-select { border-radius: 12px; padding: 14px; background: #f8fbff; border: 1px solid #dbe7ff; }
    .btn-primary { background:#3b82f6; padding:14px; border-radius:12px; border:none; font-weight:600; }
    .table { margin-top: 2rem; }
  </style>
</head>
<body>

<div class="container py-5 custom-wrapper">

  <div class="card-header-custom">
    Input Pelanggaran Siswa
  </div>

  <div class="card mt-0">

    {{-- Notifikasi sukses --}}
    @if(session('pesan_sukses'))
    <div class="alert alert-success">
        {{ session('pesan_sukses') }}
    </div>
    @endif

    {{-- Form input pelanggaran --}}
    <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Siswa (cari NIS / Nama)</label>
        <select name="siswa_id" class="form-select select2" required>
          <option value="">Cari siswa...</option>
          @foreach($siswa as $row)
            <option value="{{ $row->id }}">{{ $row->nis }} - {{ $row->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Kelas</label>
        <select name="kelas" class="form-select" required>
          <option value="">Pilih kelas</option>
          <option value="XII TKJ A">XII TKJ A</option>
          <option value="XII TKJ B">XII TKJ B</option>
          <option value="XI TKJ A">XI TKJ A</option>
          <option value="XI TKJ B">XI TKJ B</option>
          <option value="X TKJ A">X TKJ A</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Bentuk Pelanggaran</label>
        <select name="bentuk_pelanggaran" class="form-select" required>
          <option value="">Pilih bentuk pelanggaran</option>
          <option value="Terlambat - 10">Terlambat (10 poin)</option>
          <option value="Tidak memakai atribut - 5">Tidak memakai atribut (5 poin)</option>
          <option value="Berkata kasar - 15">Berkata kasar (15 poin)</option>
          <option value="Meninggalkan kelas tanpa izin - 20">Meninggalkan kelas tanpa izin (20 poin)</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3" placeholder="Tuliskan keterangan tambahan..."></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Upload Bukti Pelanggaran</label>
        <input type="file" name="bukti" class="form-control" accept="image/*,video/*,.pdf">
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-2">Simpan Pelanggaran</button>
    </form>

    <div class="text-center mt-3">
      <a href="{{ route('dashboard.guru') }}">← Kembali ke Dashboard</a>
    </div>
  </div>
</div>

<!-- JQuery + Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
      $('.select2').select2({
          placeholder: "Cari siswa...",
          allowClear: true
      });
  });
</script>

</body>
</html>
