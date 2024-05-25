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
        Schema::create('promopoint', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('jumlah_point');
            $table->date('tanggal_dimulai');
            $table->date('tanggal_berakhir');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promopoint');
    }
};
