<?php

namespace App\Http\Controllers;

//import model product
use App\Models\PromoPoint; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;


//import Facades Storage
use Illuminate\Support\Facades\Storage;

class PromoPointController extends Controller
{
    //
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $promopoint = PromoPoint::latest()->paginate(10);

        //render view with products
        return view('promopoint.indexPromoPoint', compact('promopoint'));
    }

    /**
     * create
     *
     * @return View
     */

     public function create(): View
     {
         return view('promopoint.createPromoPoint');
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
            'nama'              => 'required',
            'jumlah_point'      => 'required|numeric',
            'tanggal_dimulai'   => 'required',
            'tanggal_berakhir'  => 'required',
            'deskripsi'          => 'required',
        ]);

        PromoPoint::create([
            'nama'              => $request->nama,
            'jumlah_point'      => $request->jumlah_point,
            'tanggal_dimulai'   => $request->tanggal_dimulai,
            'tanggal_berakhir'  => $request->tanggal_berakhir,
            'deskripsi'         => $request->deskripsi,

        ]);

        //redirect to index
        return redirect()->route('promopoint.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $promopoint = PromoPoint::findOrFail($id);

        //render view with product
        return view('promopoint.showPromoPoint', compact('promopoint'));
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
        $promopoint = PromoPoint::findOrFail($id);

        //render view with product
        return view('promopoint.editPromoPoint', compact('promopoint'));
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
            'nama'              => 'required',
            'jumlah_point'      => 'required|numeric',
            'tanggal_dimulai'   => 'required',
            'tanggal_berakhir'  => 'required',
            'deskripsi'         => 'required',
         ]);
 
         //get product by ID
         $promopoint= PromoPoint::findOrFail($id);

            $promopoint->update([
                'nama'              => $request->nama,
                'jumlah_point'      => $request->jumlah_point,
                'tanggal_dimulai'   => $request->tanggal_dimulai,
                'tanggal_berakhir'  => $request->tanggal_berakhir,
                'deskripsi'         => $request->deskripsi,
             ]);

        //redirect to index
        return redirect()->route('promopoint.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $promopoint = PromoPoint::findOrFail($id);

        //delete product
        $promopoint->delete();

        //redirect to index
        return redirect()->route('promopoint.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
         $promopoint = PromoPoint::where('nama', 'like', "%$search%")->paginate(10);
     
         // Render view dengan hasil pencarian
         return view('promopoint.indexPromoPoint', compact('promopoint'));
     }   


}
