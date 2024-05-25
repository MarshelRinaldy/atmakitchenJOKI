<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\User;

class BahanBakuController extends Controller
{
    public function create_BahanBaku()
    {
        return view('admin.addBahanBaku');
    }

    public function store_BahanBaku(Request $request)
    {

        $request->validate([
            'nama_bahan_baku' => 'required',
            'stok_bahan_baku' => 'required',
            'satuan_bahan_baku' => 'required',
            'harga_bahan_baku' => 'required',
        ]);

        BahanBaku::create([
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'stok_bahan_baku' => $request->stok_bahan_baku,
            'satuan_bahan_baku' => $request->satuan_bahan_baku,
            'harga_bahan_baku' => $request->harga_bahan_baku,
        ]);

        return redirect()->route('index_bahanBaku')->with('success', 'Berhasil Menambah Bahan Baku');
    }

    // public function index()
    // {
    //     $bahanBakus = BahanBaku::all();

    //     return view('admin.bahanBaku', compact('bahanBakus'));
    // }

    // public function index(Request $request)
    // {
    //     $search = $request->query('search');

    //     if ($search) {
    //         $bahanBakus = BahanBaku::where('nama_bahan_baku', 'LIKE', '%' . $search . '%')->get();
    //     } else {
    //         $bahanBakus = BahanBaku::all();
    //     }

    //     return view('admin.bahanBaku', compact('bahanBakus'));
    // }

    public function index(Request $request)
    {
        // Saat berhasil melakukan pencarian
        if ($request->has('search')) {
            session(['search_bahan_baku' => $request->input('search')]);
        }

        // Saat halaman dimuat
        $bahanBakus = BahanBaku::query();
        if (session()->has('search_bahan_baku')) {
            $bahanBakus->where('nama_bahan_baku', 'like', '%' . session('search_bahan_baku') . '%');
        }
        $bahanBakus = $bahanBakus->get();

        // Saat pengguna mengklik tombol "Kembali" atau "Hapus Pencarian"
        if ($request->has('clear_search')) {
            session()->forget('search_bahan_baku');
            return redirect()->route('index_bahanBaku');
        }

        return view('admin.bahanBaku', compact('bahanBakus'));
    }

    public function show($BahanBaku)
    {
        $bahanBakus = BahanBaku::find($BahanBaku);
        return view('admin.bahanBaku')->with('bahanBakus', $BahanBaku);

        // $bahanBakus = BahanBaku::all();
        // return view('admin.bahanBaku', compact('bahanBakus'));
        // return view('admin.bahanBaku')->with('bahanBakus' , $bahanBakus);
    }

    public function edit_BahanBaku($id)
    {
        $bahanbaku = BahanBaku::findOrFail($id);
        return view('admin.editBahanBaku', compact('bahanbaku'));
    }

    public function update_BahanBaku(Request $request, $id)
    {
        $request->validate([
            'nama_bahan_baku' => 'required',
            'stok_bahan_baku' => 'required',
            'satuan_bahan_baku' => 'required',
            'harga_bahan_baku' => 'required',
        ]);

        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->update([
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'stok_bahan_baku' => $request->stok_bahan_baku,
            'satuan_bahan_baku' => $request->satuan_bahan_baku,
            'harga_bahan_baku' => $request->harga_bahan_baku,
        ]);

        return redirect()->route('index_bahanBaku')->with('success', 'Berhasil Update Bahan Baku');
    }


    // public function update_BahanBaku(Request $request, BahanBaku $bahanBakus)
    // {
    //     $request->validate([
    //         'nama_bahan_baku' => 'required',
    //         'stok_bahan_baku' => 'required',
    //         'satuan_bahan_baku' => 'required',
    //         'harga_bahan_baku' => 'required',
    //     ]);
    //     $bahanBakus = BahanBaku::where('nama_bahan_baku', $request)->first();
    //     $bahanBakus->update([
    //         'nama_bahan_baku' => $request->nama_bahan_baku,
    //         'stok_bahan_baku' => $request->stok_bahan_baku,
    //         'satuan_bahan_baku' => $request->satuan_bahan_baku,
    //         'harga_bahan_baku' => $request->harga_bahan_baku,
    //     ]);
    //     return redirect()->route('index_bahanBaku');
    // }

    public function destroy_BahanBaku($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->delete();
        return redirect()->route('index_bahanBaku')->with('success', 'Berhasil Delete Bahan Baku');;
    }
}