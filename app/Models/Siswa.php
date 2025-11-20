<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> 1e1585cf035d13a65edc29089dadf6aec9b8db11
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'foto',
       
    ];
=======
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
>>>>>>> 1e1585cf035d13a65edc29089dadf6aec9b8db11
}
