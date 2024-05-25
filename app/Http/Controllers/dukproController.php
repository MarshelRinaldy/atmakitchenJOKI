<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Dukpro; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\Request;

//import Http Request
use Illuminate\Http\RedirectResponse;


//import Facades Storage
use Illuminate\Support\Facades\Storage;

class dukproController extends Controller
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
        $dukpro = Dukpro::latest()->paginate(10);

        //render view with products
        return view('dukpro.indexDukpro', compact('dukpro'));
    }

    /**
     * create
     *
     * @return View
     */

     public function create(): View
     {
         return view('dukpro.createDukpro');
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
            'harga'             => 'required|numeric',
            'stok'              => 'required|numeric',
            'status'            => $request->keterangan === 'Titipan' ? '' : 'required',
            'keterangan'        => 'required',
            'tanggal_kadaluarsa'=> 'required',
            'deskripsi'         => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'kategori'          => 'required'

        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/dukpro', $image->hashName());

        //create product
        $status = $request->keterangan === 'Titipan' ? 'Available' : $request->status;
        Dukpro::create([
            'nama'       => $request->nama,
            'harga'      => $request->harga,
            'stok'       => $request->stok,
            'status'     => $status,
            'keterangan' => $request->keterangan,
            'tanggal_kadaluarsa'=> $request->tanggal_kadaluarsa,
            'deskripsi'  => $request->deskripsi,
            'image'             => $image->hashName(),
            'kategori'   => $request->kategori
            
        ]);

        //redirect to index
        return redirect()->route('dukpro.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $dukpro = Dukpro::findOrFail($id);

        //render view with product
        return view('dukpro.showDukpro', compact('dukpro'));
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
        $dukpro = Dukpro::findOrFail($id);

        //render view with product
        return view('dukpro.editDukpro', compact('dukpro'));
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
            'harga'             => 'required|numeric',
            'stok'              => 'required|numeric',
            'status'            => $request->keterangan === 'Titipan' ? '' : 'required',
            'keterangan'        => 'required',
            'tanggal_kadaluarsa'=> 'required',
            'deskripsi'         => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'kategori'          => 'required'
        ]);

        //get product by ID
        $dukpro = Dukpro::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/dukpro', $image->hashName());

            //delete old image
            Storage::delete('public/dukpro/' .$dukpro->image);
            $status = $request->keterangan === 'Titipan' ? 'Available' : $request->status;
            //update product with new image
            $dukpro->update([
                'nama'       => $request->nama,
                'harga'      => $request->harga,
                'stok'       => $request->stok,
                'status'     => $status,
                'keterangan' => $request->keterangan,
                'tanggal_kadaluarsa'=> $request->tanggal_kadaluarsa,
                'deskripsi'  => $request->deskripsi,
                'image'             => $image->hashName(),
                'kategori'   => $request->kategori
            ]);

        } else {

            //update product without image
            $dukpro->update([
                'nama'       => $request->nama,
                'harga'      => $request->harga,
                'stok'       => $request->stok,
                'status'     => $request->status,
                'keterangan' => $request->keterangan,
                'tanggal_kadaluarsa'=> $request->tanggal_kadaluarsa,
                'deskripsi'  => $request->deskripsi,
                'kategori'   => $request->kategori
            ]);
        }

        //redirect to index
        return redirect()->route('dukpro.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $dukpro = Dukpro::findOrFail($id);

        //delete image
        Storage::delete('public/dukpro/'. $dukpro->image);

        //delete product
        $dukpro->delete();

        //redirect to index
        return redirect()->route('dukpro.index')->with(['success' => 'Data Berhasil Dihapus!']);
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
         $dukpro = Dukpro::where('nama', 'like', "%$search%")->paginate(10);
     
         // Render view dengan hasil pencarian
         return view('dukpro.indexDukpro', compact('dukpro'));
     }   


}
