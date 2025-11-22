<form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nama_pelanggaran" value="{{ old('nama_pelanggaran', $pelanggaran->nama_pelanggaran) }}">
    <input type="number" name="poin" value="{{ old('poin', $pelanggaran->poin) }}">
    <button type="submit">Update</button>
</form>
