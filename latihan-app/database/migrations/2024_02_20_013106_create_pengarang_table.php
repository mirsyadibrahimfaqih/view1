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
        Schema::create('pengarang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',50);
            $table->string('email',45);
            $table->string('hp',15);
            $table->string('foto',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengarang');
    }
};
