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
        //
        Schema::create('bahanbaku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bahan_baku_id');
            // $table->string('nama');
            $table->integer('jumlah');
            $table->integer('harga')->default(0);
            $table->date('tanggal_pembelian')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->integer('satuan');
            $table->foreign('bahan_baku_id')->references('id')->on('bahan_baku')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('bahanbaku');
    }
};