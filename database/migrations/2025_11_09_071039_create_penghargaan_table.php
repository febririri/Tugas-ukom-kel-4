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
            $table->BigInteger('siswa_id',false,true)->index('siswaid');  
                  $table->string('nama_penghargaan');
        $table->text('deskripsi')->nullable();
        $table->string('bukti_foto')->nullable(); 
        $table->date('tanggal');
            $table->timestamps();

             $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
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
