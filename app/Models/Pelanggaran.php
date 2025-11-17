<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
     protected $table = 'pelanggaran'; 

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'jurusan',
        'jenis_pelanggaran',
        'bentuk_pelanggaran',
        'poin',
        'keterangan',
        'bukti',
    ];
}
