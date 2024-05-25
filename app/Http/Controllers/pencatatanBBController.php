<?php

namespace App\Http\Controllers;

//import model product
use App\Models\catatBB;
use App\Models\BahanBaku;
//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;


//import Facades Storage
use Illuminate\Support\Facades\Storage;

class pencatatanBBController extends Controller
{
    
    /**
     * index
     *
     * @return void
     */
    
     public function index() : View
     {
         //get all products
         $bahanbaku = catatBB::with('databahanBaku')->paginate(10);
 
         //render view with products
         return view('bahanbaku.indexBahanBaku', compact('bahanbaku'));
     }
 
     /**
      * create
      *
      * @return View
      */
 
     public function create(): View
     {
        $bb = BahanBaku::all();
         return view('bahanbaku.createBahanBaku',compact('bb'));
     }
 
     /**
      * store
      *
      * @param  mixed $request
      * @return RedirectResponse
      */
     public function store(Request $request): RedirectResponse
     {
         //validate form
         $request->validate([
            'bahan_baku_id'     => 'required',
            'jumlah'            => 'required',
            'harga'             => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
            'tanggal_kadaluarsa'=> 'required|date|after:tanggal_pembelian',
            'satuan' => 'required',

         ]);
 
         //create product
         catatBB::create([
             'bahan_baku_id'     => $request->bahan_baku_id,
             'jumlah'            => $request->jumlah,
             'harga'             => $request->harga,
             'tanggal_pembelian' => $request->tanggal_pembelian,
             'tanggal_kadaluarsa'=> $request->tanggal_kadaluarsa,
             'satuan'            => $request->satuan,
             
         ]);
 
         //redirect to index
         return redirect()->route('bahanbaku.index')->with(['success' => 'Data Berhasil Disimpan!']);
     }
 
      /**
      * show
      *
      * @param  mixed $id
      * @return View
      */
     public function show(string $id): View
     {
         //get product by ID
         $bahanbaku = catatBB::findOrFail($id);
 
         //render view with product
         return view('bahanbaku.showBahanBaku', compact('bahanbaku'));
     }
 
     /**
      * edit
      *
      * @param  mixed $id
      * @return View
      */
     public function edit(string $id): View
     {
         //get product by ID
        $bahanbaku = catatBB::findOrFail($id);

        $bb = BahanBaku::all();
 
         //render view with product
         return view('bahanbaku.editBahanBaku', compact('bb','bahanbaku'));
     }
 
         /**
      * update
      *
      * @param  mixed $request
      * @param  mixed $id
      * @return RedirectResponse
      */
     public function update(Request $request, $id): RedirectResponse
     {
         //validate form
         $request->validate([
            'bahan_baku_id'     => 'required',
            'jumlah'            => 'required',
            'harga'             => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
            'tanggal_kadaluarsa'=> 'required|date|after:tanggal_pembelian',
            'satuan'            => 'required',
         ]);
 
         //get product by ID
         $bahanbaku = catatBB::findOrFail($id);

             $bahanbaku->update([
                'bahan_baku_id'     => $request->bahan_baku_id,
                'jumlah'            => $request->jumlah,
                'harga'             => $request->harga,
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'tanggal_kadaluarsa'=> $request->tanggal_kadaluarsa,
                'satuan'            => $request->satuan,
             ]);
         
 
         //redirect to index
         return redirect()->route('bahanbaku.index')->with(['success' => 'Data Berhasil Diubah!']);
     }
 
     /**
      * destroy
      *
      * @param  mixed $id
      * @return RedirectResponse
      */
     public function destroy($id): RedirectResponse
     {
         //get product by ID
         $bahanbaku = catatBB::findOrFail($id);
 
         //delete product
         $bahanbaku->delete();
 
         //redirect to index
         return redirect()->route('bahanbaku.index')->with(['success' => 'Data Berhasil Dihapus!']);
     }
 
         /**
      * update
      *
      * @param  mixed $request
      * @return RedirectResponse
      */
 
     public function search(Request $request): View
     {
         $search = $request->input('search');
 
         // Melakukan pencarian berdasarkan nama hampers
        //  $bahanbaku= catatBB::where('databahanBaku', 'like', "%$search%")->paginate(10);

         $bahanbaku = catatBB::whereHas('databahanBaku', function($query) use ($search) {
            $query->where('nama_bahan_baku', 'like', '%' . $search . '%');
        })->paginate(10);
     
         // Render view dengan hasil pencarian
         return view('bahanbaku.indexBahanBaku', compact('bahanbaku'));
     }  
     
 
}