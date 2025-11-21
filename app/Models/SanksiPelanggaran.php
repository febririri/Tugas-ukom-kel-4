<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanksiPelanggaran extends Model
{
    protected $table = 'sanksi_pelanggaran';

    protected $fillable = [
        'kriteria_pelanggaran',
        'poin_dari',
        'poin_sampai',
        'sanksi'
    ];
}
