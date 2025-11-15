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
          Schema::create('bentuk_pelanggaran', function (Blueprint $table) {
    $table->id();
    $table->BigInteger('id_kategori_pelanggaran',false,true)->index('kategori_pelanggaranid');
    $table->string('nama_pelanggaran',);
    $table->integer('poin'); // poin negatif
    $table->foreign('id_kategori_pelanggaran')->references('id')->on('kategori_pelanggaran')->onDelete('cascade');
    $table->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_pelanggaran');
    }
};
