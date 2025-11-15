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
        Schema::create('penghargaan', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('id_siswa',false,true)->index('siswaid');
              $table->BigInteger('guru_id',false,true)->index('guruid');  
                  $table->string('nama_penghargaan');
        $table->text('deskripsi')->nullable();
        $table->string('bukti_foto')->nullable(); 
        $table->date('tanggal');
            $table->timestamps();

             $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
        $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghargaan');
    }
};
