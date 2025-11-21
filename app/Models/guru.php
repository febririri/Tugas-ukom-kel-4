<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['user_id', 'nama', 'nip', 'foto'];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
