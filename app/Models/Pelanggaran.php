<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table = 'pelanggaran';

    protected $fillable = [
        'siswa_id',
        'kelas',
        'bentuk_pelanggaran',
        'keterangan',
        'bukti',
    ];

    // Relasi ke tabel siswa
    public function siswa()
    
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
