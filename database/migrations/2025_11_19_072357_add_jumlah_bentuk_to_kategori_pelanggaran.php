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
    Schema::table('kategori_pelanggaran', function (Blueprint $table) {
        $table->integer('jumlah_bentuk')->default(0);
    });
}

public function down()
{
    Schema::table('kategori_pelanggaran', function (Blueprint $table) {
        $table->dropColumn('jumlah_bentuk');
    });
}

};
