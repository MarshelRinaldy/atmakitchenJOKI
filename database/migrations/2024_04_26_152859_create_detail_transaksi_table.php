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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id'); 
            $table->integer('jumlah_produk');
            $table->timestamps();

            // Definisi foreign key untuk transaksi
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');

            // Definisi foreign key untuk produk
            $table->foreign('produk_id')->references('id')->on('dukpro')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
