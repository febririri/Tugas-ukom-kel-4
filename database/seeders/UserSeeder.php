<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        

        // =====================
        // 2. SEEDER AKUN GURU
        // =====================
        $guruUser = User::create([
            'name' => 'Guru Satu',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'guru',
        ]);

        // Hubungkan user_id ke tabel guru
      Guru::create([
    'user_id' => $guruUser->id,
    'nama' => 'Guru Satu',
    'nip' => '12345678',
    'foto' => null,
]);

    }
}
