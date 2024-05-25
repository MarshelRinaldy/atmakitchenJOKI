<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencatatanPengeluaranLain;
use App\Models\User;

class pencatatanPengeluaranLainController extends Controller
{
    public function create_PencatatanPengeluaranLain()
    {
        return view('MO.addPengeluaranLain');
    }

    public function store_PencatatanPengeluaranLain(Request $request)
    {

        $request->validate([
            'nama_pengeluaran' => 'required',
            'harga_pengeluaran' => 'required',
            'tanggal_pengeluaran' => 'required',
            'kategori_pengeluaran' => 'required',
        ]);

        PencatatanPengeluaranLain::create([
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'harga_pengeluaran' => $request->harga_pengeluaran,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'kategori_pengeluaran' => $request->kategori_pengeluaran,
        ]);
        // Saat berhasil melakukan pencarian
        if ($request->has('search')) {
            session(['search_PencatatanPengeluaranLain' => $request->input('search')]);
        }

        // Saat halaman dimuat
        $pencatatanPengeluaranLain = PencatatanPengeluaranLain::query();
        if (session()->has('search_PencatatanPengeluaranLain')) {
            $pencatatanPengeluaranLain->where('nama_pengeluaran', 'like', '%' . session('search_PencatatanPengeluaranLain') . '%');
        }
        $pencatatanPengeluaranLain = $pencatatanPengeluaranLain->get();

        // Saat pengguna mengklik tombol "Kembali" atau "Hapus Pencarian"
        if ($request->has('clear_search')) {
            session()->forget('search_PencatatanPengeluaranLain');
            return redirect()->route('index_PencatatanPengeluaranLain');
        }

        return view('MO.pencatatanPengeluaranLain', compact('pencatatanPengeluaranLain'));

        // return redirect()->route('index_pencatatanPengeluaranLain')->with('success', 'Berhasil Menambah Catatan');
    }

    public function index(Request $request)
    {
        // Saat berhasil melakukan pencarian
        if ($request->has('search')) {
            session(['search_PencatatanPengeluaranLain' => $request->input('search')]);
        }

        // Saat halaman dimuat
        $pencatatanPengeluaranLain = PencatatanPengeluaranLain::query();
        if (session()->has('search_PencatatanPengeluaranLain')) {
            $pencatatanPengeluaranLain->where('nama_pengeluaran', 'like', '%' . session('search_PencatatanPengeluaranLain') . '%');
        }
        $pencatatanPengeluaranLain = $pencatatanPengeluaranLain->get();

        // Saat pengguna mengklik tombol "Kembali" atau "Hapus Pencarian"
        if ($request->has('clear_search')) {
            session()->forget('search_PencatatanPengeluaranLain');
            return redirect()->route('index_PencatatanPengeluaranLain');
        }

        return view('MO.pencatatanPengeluaranLain', compact('pencatatanPengeluaranLain'));
    }

    public function show($pencatatanPengeluaranLain)
    {
        $pencatatanPengeluaranLain = PencatatanPengeluaranLain::find($pencatatanPengeluaranLain);
        return view('MO.pencatatanPengeluaranLain')->with('pencatatanPengeluaranLain', $pencatatanPengeluaranLain);

        // $bahanBakus = BahanBaku::all();
        // return view('admin.bahanBaku', compact('bahanBakus'));
        // return view('admin.bahanBaku')->with('bahanBakus' , $bahanBakus);
    }

    public function edit_PencatatanPengeluaranLain($id)
    {
        $pencatatanPengeluaranLain = PencatatanPengeluaranLain::findOrFail($id);
        return view('MO.editPencatatanPengeluaranLain', compact('pencatatanPengeluaranLain'));
    }

    public function update_PencatatanPengeluaranLain(Request $request, $id)
    {
        $request->validate([
            'nama_pengeluaran' => 'required',
            'harga_pengeluaran' => 'required',
            'tanggal_pengeluaran' => 'required',
            'kategori_pengeluaran' => 'required',
        ]);

        $pencatatanPengeluaranLain = PencatatanPengeluaranLain::findOrFail($id);
        $pencatatanPengeluaranLain->update([
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'harga_pengeluaran' => $request->harga_pengeluaran,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'kategori_pengeluaran' => $request->kategori_pengeluaran,
        ]);

        return redirect()->route('index_PencatatanPengeluaranLain')->with('success', 'Berhasil Update Bahan Baku');
    }

    public function destroy_PencatatanPengeluaranLain($id)
    {
        $pencatatanPengeluaranLain = PencatatanPengeluaranLain::findOrFail($id);
        $pencatatanPengeluaranLain->delete();
        return redirect()->route('index_PencatatanPengeluaranLain')->with('success', 'Berhasil Delete Bahan Baku');;
    }
}