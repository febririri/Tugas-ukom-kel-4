<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('history', function (Blueprint $table) {
        $table->id();
        $table->string('nama_siswa');
        $table->string('kelas');
        $table->string('jurusan');
        $table->string('jenis_pelanggaran');
        $table->string('bentuk_pelanggaran');
        $table->integer('poin');
        $table->text('keterangan')->nullable();
        $table->string('bukti')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
