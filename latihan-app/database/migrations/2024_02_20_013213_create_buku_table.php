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
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn',100);
            $table->string('judul',100);
            $table->string('tahun_cetak',45);
            $table->integer('stok');
            $table->integer('idpenerbit');
            $table->integer('idpengarang');
            $table->string('cover',45);
            $table->integer('kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
