<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'foto',
    ];

    // Relasi: Satu siswa bisa punya banyak pelanggaran
    public function pelanggaran()
    {
        return $this->hasMany(\App\Models\Pelanggaran::class, 'siswa_id');
    }
}
