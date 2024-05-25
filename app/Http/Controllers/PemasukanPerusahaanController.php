<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\PemasukanPerusahaan;
use App\Http\Controllers\Controller;

class PemasukanPerusahaanController extends Controller
{
    public function store_pemasukan_perusahaan(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'transaksi_id' => 'required|exists:transaksis,id',
        //     'jumlah_income' => 'required|numeric',
        //     'deskripsi' => 'nullable|string',
        // ]);

        // Create a new PemasukanPerusahaan record
        PemasukanPerusahaan::create([
            'transaksi_id' => $request->input('transaksi_id'),
            'tanggal_income' => now(),
            'jumlah_income' => $request->input('jumlah_income'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        $transaksi = Transaksi::find($request->input('transaksi_id'));
        $transaksi->update(['status_transaksi' => 'menunggu konfirmasi mo', 'status_pembayaran' => 'sudah bayar']);

        // Redirect or return a response
        return redirect()->route('show_konfirmasi_pesanan')->with('success', 'Pemasukan perusahaan berhasil ditambahkan.');
    }
}
