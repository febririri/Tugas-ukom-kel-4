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
    $table->unsignedBigInteger('id_kategori_pelanggaran');
    $table->string('nama_bentuk');
    $table->integer('poin');
    $table->timestamps();
    $table->foreign('id_kategori_pelanggaran')
          ->references('id')
          ->on('kategori_pelanggaran')
          ->onDelete('cascade');
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
