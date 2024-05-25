<?php

namespace App\Http\Controllers;



//import model product
use App\Models\Hampers; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;

use App\Models\Dukpro; 

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class hampersController extends Controller
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
        $hampers = Hampers::with('dataProduk')->paginate(10);

        //render view with products
        return view('hampers.indexHampers', compact('hampers'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create(): View
    {
        $produk = Dukpro::all();
        return view('hampers.createHampers',compact('produk'));
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
            'produk_id' => 'required',
            'nama'  => 'required',
            'harga'  => 'required|numeric',
            'stok'  => 'required|numeric',
            // 'isi'  => 'required',
            'ukuran'  => 'required',
            'berat'  => 'required',
            'deskripsi'  => 'required',
            'image'  => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
         $image = $request->file('image');
            $image->storeAs('public/hampers', $image->hashName());

        //create product
        Hampers::create([
            'produk_id' => $request->produk_id,
            'nama'      => $request->nama,
            'harga'     => $request->harga,
            'stok'      => $request->stok,
            // 'isi'       => $request->isi,
            'ukuran'    => $request->ukuran,
            'berat'     => $request->berat,
            'deskripsi' => $request->deskripsi,
            'image'     => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('hampers.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $hampers = Hampers::findOrFail($id);

        //render view with product
        return view('hampers.showHampers', compact('hampers'));
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
        $hampers = Hampers::findOrFail($id);
        $produk = Dukpro::all();

        //render view with product
        return view('hampers.editHampers', compact('hampers','produk'));
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
            'produk_id' => 'required',
            'nama'  => 'required',
            'harga'  => 'required|numeric',
            'stok'  => 'required|numeric',
            // 'isi'  => 'required',
            'ukuran'  => 'required',
            'berat'  => 'required',
            'deskripsi'  => 'required',
            'image'  => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //get product by ID
        $hampers = Hampers::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/hampers', $image->hashName());

            //delete old image
            Storage::delete('public/hampers/'.$hampers->image);

            //update product with new image
            $hampers->update([
                'produk_id' => $request->produk_id,
                'nama'      => $request->nama,
                'harga'     => $request->harga,
                'stok'      => $request->stok,
                // 'isi'       => $request->isi,
                'ukuran'    => $request->ukuran,
                'berat'     => $request->berat,
                'deskripsi' => $request->deskripsi,
                'image'     => $image->hashName(),
            ]);

        } else {

            //update product without image
            $hampers->update([
                'produk_id' => $request->produk_id,
                'nama'      => $request->nama,
                'harga'     => $request->harga,
                'stok'      => $request->stok,
                // 'isi'       => $request->isi,
                'ukuran'    => $request->ukuran,
                'berat'     => $request->berat,
                'deskripsi' => $request->deskripsi
            ]);
        }

        //redirect to index
        return redirect()->route('hampers.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $hampers = Hampers::findOrFail($id);

        //delete image
        Storage::delete('public/hampers/'. $hampers->image);

        //delete product
        $hampers->delete();

        //redirect to index
        return redirect()->route('hampers.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
        $hampers = Hampers::where('nama', 'like', "%$search%")->paginate(10);
    
        // Render view dengan hasil pencarian
        return view('hampers.indexHampers', compact('hampers'));
    }   





}