<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
          $table->id();
            $table->BigInteger('guru_id',false,true)->index('guruid'); 
            $table->string('nis', 50)->nullable(false);
            $table->string('nama', 150)->nullable(false);
            $table->string('kelas', 50)->nullable(false);
            $table->string('jurusan', 50)->nullable(false);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->timestamps();

             $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
