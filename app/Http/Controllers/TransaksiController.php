<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TransaksiController extends Controller
{

    public function show_pengiriman(){
        $transaksis = Transaksi::with('user')
        ->where('status_transaksi', 'menunggu konfirmasi ongkir')
        ->get();

        // dd($transaksis);

    // Pass the transactions data to the view
    return view('admin.inputJarakPengiriman', compact('transaksis'));
    }

    public function update_pengiriman($id)
    {
        // Retrieve the transaction with the given ID and eager load the user data
        $transaksi = Transaksi::with('user')->findOrFail($id);

        // Pass the transaction data to the view
        return view('admin.updatePengiriman', compact('transaksi'));
    }

    public function input_pengiriman(Request $request, $id, $total_harga)
    {
        // Retrieve the transaction
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Calculate the delivery cost based on the distance
        $jarak = $request->input('jarak'); // Ensure you are getting the 'jarak' input
        $biaya_ongkir = 0;

        if ($jarak <= 5) {
            $biaya_ongkir = 10000;
        } elseif ($jarak <= 10) {
            $biaya_ongkir = 15000;
        } elseif ($jarak <= 15) {
            $biaya_ongkir = 20000;
        } else {
            $biaya_ongkir = 25000;
        }

        // Update the transaction attributes
        $transaksi->jarak_delivery = $jarak;
        $transaksi->biaya_ongkir = $biaya_ongkir;
        $transaksi->total_harga = $total_harga + $biaya_ongkir;
        $transaksi->status_transaksi = "menunggu pembayaran";

        $transaksi->save(); // Don't forget to save the updated transaction

        // Pass the transactions data to the view
        return redirect()->route('show_pengiriman');
    }

    public function show_konfirmasi_pesanan(){
        $transaksis = Transaksi::with('user')
        ->where('status_transaksi', 'menunggu konfirmasi')
        ->get();

        return view('admin.konfirmasiPesanan', compact('transaksis'));
    }

    public function detail_konfirmasi_pesanan($id)
    {
        $transaksi = Transaksi::with('user')->findOrFail($id);
        return view('admin.detailKonfirmasiPesanan', compact('transaksi'));
    }

    public function show_pesanan_diproses(){
         $transaksis = Transaksi::where('status_transaksi', 'sedang dikemas')->get();
    return view('admin.showPesananDiproses', compact('transaksis'));
    }

    public function show_pesanan_telat_bayar(){
    // Get the current time
    $now = Carbon::now();
    
    // Get the transactions that have status 'menunggu pembayaran' and are older than 24 hours
    $transaksis = Transaksi::where('status_transaksi', 'menunggu pembayaran')
                            ->where('created_at', '<', $now->subDay())
                            ->get();

        return view('admin.showPesananDiproses', compact('transaksis'));
    }

    public function pesanan_siap_dikirim_dipickup($id)
    {
        // Mengambil objek Transaksi berdasarkan $id
        $transaksi = Transaksi::findOrFail($id);

        // Ubah status transaksi menjadi 'selesai'
        $transaksi->status_transaksi = 'sudah dikonfirmasi';
        $transaksi->save();

        // Redirect ke halaman home atau halaman lain yang sesuai
        return redirect()->route('show_pesanan_diproses');
    }

  

    
    
}
