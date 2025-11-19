<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BentukPelanggaran extends Model
{
public function kategori()
{
    return $this->belongsTo(KategoriPelanggaran::class, 'kategori_id');
}

}
