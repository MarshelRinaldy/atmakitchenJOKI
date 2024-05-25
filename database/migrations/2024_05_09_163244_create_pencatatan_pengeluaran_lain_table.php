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
        Schema::create('pencatatan_pengeluaran_lain', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengeluaran');
            $table->date('tanggal_pengeluaran');
            $table->integer('harga_pengeluaran');
            $table->string('kategori_pengeluaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatan_pengeluaran_lain');
    }
};