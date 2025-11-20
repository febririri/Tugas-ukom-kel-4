<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    protected $table = 'penghargaan';

    protected $fillable = [
        'siswa_id',
        'jenis_penghargaan',
        'poin',
        'keterangan',
        'foto'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}


