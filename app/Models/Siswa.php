<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'guru_id',
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'jenis_kelamin'
    ];

    public function penghargaan()
    {
        return $this->hasMany(Penghargaan::class, 'siswa_id');
    }
}
