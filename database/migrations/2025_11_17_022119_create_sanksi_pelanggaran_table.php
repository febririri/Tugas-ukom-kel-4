<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('sanksi_pelanggaran', function (Blueprint $table) {
        $table->id();
        $table->string('kriteria_pelanggaran');
        $table->integer('poin_dari');
        $table->integer('poin_sampai');
        $table->string('sanksi');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanksi_pelanggaran');
    }
};
