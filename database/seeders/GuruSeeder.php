<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $dataGuru = [
            ['nama' => 'Guru Satu',  'email' => 'guru1@gmail.com', 'nip' => '111'],
            ['nama' => 'Guru Dua',   'email' => 'guru2@gmail.com', 'nip' => '222'],
            ['nama' => 'Guru Tiga',  'email' => 'guru3@gmail.com', 'nip' => '333'],
        ];

        foreach($dataGuru as $guru){
            $user = User::create([
                'name' => $guru['nama'],
                'email' => $guru['email'],
                'password' => Hash::make('123456'),
                'role' => 'guru',
            ]);

            Guru::create([
                'user_id' => $user->id,
                'nama' => $guru['nama'],
                'nip' => $guru['nip'],
                'foto' => null
            ]);
        }
    }
}
