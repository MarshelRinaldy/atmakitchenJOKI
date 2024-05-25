<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Produk;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dukpro;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ResepController extends Controller
{
    public function create_resep()
    {
         $produks = Dukpro::all();
         $bahanbakus = BahanBaku::all();
       
         return view('admin.tambahResep', compact('produks', 'bahanbakus'));
    }

    public function tambahResep(Request $request)
    {
        $produkId = $request->product_id;
        $bahanBakuIds = $request->bahan_baku_id;
        $jumlahs = $request->jumlah;

        // dd($produkId, $bahanBakuIds, $jumlahs);

        if (count($bahanBakuIds) !== count($jumlahs)) {
        return redirect()->back()->withErrors(['jumlah' => 'Jumlah bahan baku tidak sesuai dengan jumlah bahan yang dipilih.']);
    }
        
        foreach ($bahanBakuIds as $key => $bahanBakuId) {
           
            Resep::create([
                'produk_id' => $produkId,
                'bahan_baku_id' => $bahanBakuId,
                'jumlah' => $jumlahs[$key],
            ]);
        }
        
        return redirect()->route('index_resep')->with('success', 'Berhasil Menambah Resep');
    }

     public function index_resep(){
        $reseps = Resep::all(); //buatkan where 
        $produks = Dukpro::all();
        $bahanbakus = BahanBaku::all();
        // dd($reseps, $produks, $bahanbakus);
        return view('admin.resep', compact('reseps', 'produks', 'bahanbakus'));
    }

    public function index_detailResep($produk){
        $reseps = Resep::all(); 
        $bahanbakus = BahanBaku::all();
        return view('admin.detailResep', compact('reseps', 'produk', 'bahanbakus'));
    }

    public function updateResep($produk){
       
        $reseps = Resep::all(); 
        $allproduks = Dukpro::all(); 
        $bahanbakus = BahanBaku::all();
        return view('admin.updateResep', compact('reseps', 'allproduks' , 'produk', 'bahanbakus'));
     }

    public function update_resep(Request $request, $produk)
    {

        // Hapus semua entri resep yang memiliki produk_id sesuai dengan yang dikirim dari view
        Resep::where('produk_id', $produk)->delete();

        // Proses untuk membuat kembali entri resep berdasarkan data dari $request
        $produkId = $request->product_id;
        $bahanBakuIds = $request->bahan_baku_id;
        $jumlahs = $request->jumlah;

        if (count($bahanBakuIds) !== count($jumlahs)) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah bahan baku tidak sesuai dengan jumlah bahan yang dipilih.']);
        }
            
        foreach ($bahanBakuIds as $key => $bahanBakuId) {
            Resep::create([
                'produk_id' => $produkId,
                'bahan_baku_id' => $bahanBakuId,
                'jumlah' => $jumlahs[$key],
            ]);
        }

        // Redirect atau kembalikan respon sesuai kebutuhan aplikasi Anda
        return redirect()->route('index_resep')->with('success', 'Resep berhasil diperbarui.');
    }

    public function delete_resep($produk){

        Resep::where('produk_id', $produk)->delete();
        return redirect()->route('index_resep')->with('success', 'Resep berhasil dihapus.');

    }

    public function search_resep(Request $request)
{
    // Validasi input
    $request->validate([
        'search' => 'required',
    ]);
    
    $search = $request->input('search');
    // Lakukan pencarian berdasarkan nama produk di model Resep
    $reseps = Resep::whereHas('product', function($query) use ($search) {
        $query->where('nama', 'like', '%' . $search . '%');
    })->get();

    $bahanbakus = BahanBaku::all();
    // Kirim data produk ke view
    return view('admin.resep', compact('reseps', 'bahanbakus'));
    // Ganti 'nama_view_anda' dengan nama view Anda
}


// ini adalah fungsi udah benar juga samaaaa
//     public function update_resep(Request $request)
// {
//     // Ambil semua resep untuk produk yang dipilih
//     $resep = Resep::where('produk_id', $request->product_id)->get();

//     // Loop melalui setiap item resep dan perbarui jumlahnya sesuai data yang diterima dari form
//     foreach ($resep as $index => $item) {
//         $item->jumlah = $request->jumlah[$index]; // Update jumlah bahan baku
//         $item->save(); // Simpan perubahan
//     }

//     // Ambil produk terkait berdasarkan ID
//     $produk = $request->product_id;

//     // Ambil ulang resep setelah diperbarui
//     $reseps = Resep::where('produk_id', $request->product_id)->get();

//     // Ambil semua bahan baku
//     $bahanbakus = BahanBaku::all();

//     // Redirect atau kembalikan respon sesuai kebutuhan aplikasi Anda
//     return view('admin.detailResep', compact('reseps', 'produk', 'bahanbakus'));
// }


    // // ini fix digunain udah bisa cuma lom bisa nambah bahan baku
    //   public function update_resep(Request $request)
    // {
    //     $resep = Resep::where('produk_id', $request->product_id)->get();

    //     // Loop melalui setiap item resep dan perbarui jumlahnya sesuai data yang diterima dari form
    //     foreach ($resep as $index => $item) {
    //         $item->jumlah = $request->jumlah[$index]; // Update jumlah bahan baku
    //         $item->save(); // Simpan perubahan
    //     }

        
    //     $produk = $request->product_id;
    //     $reseps = Resep::all(); 
    //     $bahanbakus = BahanBaku::all();
    //     // Redirect atau kembalikan respon sesuai kebutuhan aplikasi Anda
    //     return view('admin.detailResep', compact('reseps', 'produk' , 'bahanbakus')); 
    // }

    // public function store_resep(Request $request)
    //     {
    //         $produkId = $request->product_id;
    //         $bahanBakuIds = $request->bahan_baku_id;
    //         $jumlahs = $request->jumlah;

    //         // dd($produkId, $bahanBakuIds, $jumlahs);

    //         if (count($bahanBakuIds) !== count($jumlahs)) {
    //         return redirect()->back()->withErrors(['jumlah' => 'Jumlah bahan baku tidak sesuai dengan jumlah bahan yang dipilih.']);
    //     }
        
    //     foreach ($bahanBakuIds as $key => $bahanBakuId) {
           
    //         $resep = Resep::all();

    //         $resep->update([
    //        'produk_id' => $produkId,
    //             'bahan_baku_id' => $bahanBakuId,
    //             'jumlah' => $jumlahs[$key],
    //         ]);
    //     }
        
    //     $reseps = Resep::all(); 
    //     $bahanbakus = BahanBaku::all();
    //     return view('admin.detailResep', compact('reseps', 'produk', 'bahanbakus'));;
    // }

    // public function store_resep(Request $request)
    // {
    //     $request->validate([
    //         'nama_resep' => 'required',
    //         'image' => 'required',
    //         'bahan_baku' => 'required',
    //         'deskripsi' => 'required',
    //         'steps' => 'required',
    //     ]);

    //     $file = $request->file('image');
    //     $path = time() . '_' . $request->nama_resep . '.' . $file->getClientOriginalExtension();

    //     Storage::disk('local')->put('public/' . $path, file_get_contents($file));

    //     Resep::create([
    //         'nama_resep' => $request->nama_resep,
    //         'image' => $path,
    //         'bahan_baku' => $request->bahan_baku,
    //         'deskripsi' => $request->deskripsi,
    //         'steps' => $request->steps,
    //     ]);

    //     $reseps = Resep::all();

    //     return view('admin.dataResep', compact('reseps'));
    // }

   

    // public function show_dataResep(){
    //     $reseps = Resep::all();
    //     return view('admin.dataResep', compact('reseps'));
    // }

    // public function edit_resep(Resep $resep)
    //     {
    //       return view('admin.updateResep', compact('resep'));
    //     }

    // public function update_resep(Resep $resep, Request $request){
    //     $request->validate([
    //         'nama_resep' => 'required',
    //         'image' => 'required',
    //         'bahan_baku' => 'required',
    //         'deskripsi' => 'required',
    //         'steps' => 'required',
    //     ]);

    //     $file = $request->file('image');
    //     $path = time() . '_' . $request->nama_resep . '.' . $file->getClientOriginalExtension();

    //     Storage::disk('local')->put('public/' . $path, file_get_contents($file));

    //     $resep->update([
    //         'nama_resep' => $request->nama_resep,
    //         'image' => $path,
    //         'bahan_baku' => $request->bahan_baku,
    //         'deskripsi' => $request->deskripsi,
    //         'steps' => $request->steps,
    //     ]);

    //     $reseps = Resep::all();
    //     return view('admin.dataResep', compact('reseps'));
    // }

}
