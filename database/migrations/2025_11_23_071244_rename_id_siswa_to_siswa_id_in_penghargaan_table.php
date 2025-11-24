<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penghargaan', function (Blueprint $table) {
            $table->renameColumn('id_siswa', 'siswa_id');
        });
    }

    public function down(): void
    {
        Schema::table('penghargaan', function (Blueprint $table) {
            $table->renameColumn('siswa_id', 'id_siswa');
        });
    }
};
