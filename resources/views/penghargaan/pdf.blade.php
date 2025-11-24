<h2>Detail Penghargaan Siswa</h2>

<p><strong>Nama Siswa:</strong> {{ $penghargaan->siswa->nama }}</p>
<p><strong>Nama Penghargaan:</strong> {{ $penghargaan->nama_penghargaan }}</p>
<p><strong>Tanggal:</strong> {{ $penghargaan->tanggal }}</p>

@if ($penghargaan->bukti_foto)
    <img src="{{ public_path('uploads/penghargaan/'.$penghargaan->bukti_foto) }}" width="300">
@endif
