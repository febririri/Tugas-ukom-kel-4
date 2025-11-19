<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPelanggaran extends Model
{
    protected $table = 'kategori_pelanggaran'; // <-- SESUAIKAN DENGAN NAMA TABEL ASLI

    protected $fillable = ['nama_kategori']; 

    public function bentuk()
    {
        return $this->hasMany(BentukPelanggaran::class, 'kategori_id');
    }
}