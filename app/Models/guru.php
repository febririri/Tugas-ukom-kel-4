<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
  protected $fillable = ['user_id','nama','nip','foto','role','plain_password'];


    // relasi ke user
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
