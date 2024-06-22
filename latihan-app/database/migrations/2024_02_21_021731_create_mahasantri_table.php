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
        Schema::create('mahasantri', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->string('no_hp',15);
            $table->string('email',45);
            $table->string('provinsi',50);
            $table->string('kota',50);
            $table->integer('jurusan_id');
            $table->integer('matakuliah_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasantri');
    }
};
