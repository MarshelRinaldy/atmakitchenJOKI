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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add this line to create the foreign key column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
            $table->string('metode_pembayaran');
            $table->date('tanggal_transaksi');
            $table->integer('jumlah_transaksi');
            $table->string('bukti_pembayaran');
            $table->string('status_pengantaran'); // delivery atau pick up sendiri
            $table->string('jenis_delivery')->nullable(); //ini kalau mengambil pilihan delivery
            $table->float('jarak_delivery')->default(0); //nanti diisi oleh admin kalau memang pake pengantaran delivery
            $table->string('alamat_pengantaran')->nullable(); //ini kalau yag dipilih pengantarannya delivery maka input ini
            $table->integer('biaya_ongkir')->default(0); // ini nanti diinput admin juga
            $table->integer('total_harga'); //ini nanti muncul setelah di konfirmasi oleh admin karena total nya berubah ketika udah diinput biaya ongkirnya
            $table->string('status_transaksi'); // ini akan ada "menunggu konfirmasi ongkir"(karna ongkir diinput admin jadi total harga akan berubah dulu karna + 
            //biaya ongkir jika menggunakan DELIVERY) / kalau ambil ditempat bisa langsung-> "menunggu pembayaran" (ini tinggal kirim butki pembayaran) / menunggu konfirmasi(di acc oleh admin) -> kalau delivery (sedang dikirim) / kalau ambil sendiry (siap di pickup) -> delivery(ntar kalau dari ojolnya bilang sudah dikasih atau diantar status berubah menjadi "sudah dipickup")
            //lalu kalau untuk ambil sendiri, kalau sudah diambil status berubah menjadi "selesai", lalu untuk customernya statusnya sudah dikirim/ sudah di pick up, lalu customer diminta untuk mengkonfirmasi melalui button jika benar sudah selesai
            $table->string('status_pembayaran')->default('belum bayar'); // dan 'sudah bayar'
            $table->string('image_bukti_pembayaran')->nullable();
            $table->string('no_transaksi')->unique(); // ini harus unique 
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
