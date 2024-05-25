<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function profil_customer(){
        $user = Auth::user();
        return view('customer.profilCustomer', compact('user'));
    } 

    public function update_profil(Request $request)
    {
        // Mengambil data pengguna yang sedang masuk
        $user = User::find(Auth::id());

        // Memperbarui data pengguna
        $user->update([
            'name' => $request->name,   
            // 'email' => $request->email,
            'username' => $request->username,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'role' => 'customer',
        ]);

        return redirect()->route('home')->with('success', 'Profil berhasil diperbarui.');
    }

    public function history_pesanan(){

         $transaksis = Transaksi::where('user_id', auth()->user()->id)->with('detailTransaksis.produk')->get();
   
        return view('customer.historyPesanan', compact('transaksis'));
    }

      public function searchHistory(Request $request)
    {
        $search = $request->input('search'); // Mengambil nilai dari input pencarian

        // Lakukan pencarian berdasarkan nama produk atau informasi lain yang kamu inginkan
        $transaksis = Transaksi::where('user_id', auth()->user()->id)
            ->with(['detailTransaksis.produk' => function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            }])
            ->get();

        return view('customer.historyPesanan', compact('transaksis'));
    }

//     public function searchHistory(Request $request)
// {
//     $search = $request->input('search');
//     // Query untuk mencari transaksi berdasarkan nama produk
//     $transaksis = Transaksi::whereHas('detailTransaksis', function ($query) use ($search) {
//         $query->whereHas('produk', function ($query) use ($search) {
//             $query->where('nama', 'like', '%' . $search . '%');
//         });
//     })->get();

//     return view('customer.historyPesanan', compact('transaksis', 'search'));
// }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'username' => 'required',
            'address' => 'nullable',
            'date_of_birth' => 'nullable',
            'phone_number' => 'nullable',
            'gender' => 'nullable',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->username = $request->username;
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }

    public function show_payment_pesanan_list()
{
    // Mendapatkan user yang sedang login
    $user = Auth::user();

    // Mengambil transaksi sesuai dengan user yang sedang login
    $transaksis = Transaksi::where('user_id', $user->id)
        ->with('detailTransaksis.produk') // Mengambil detail transaksi dan produk terkait
        ->get();

    // Mengirim data ke view
    return view('customer.daftarPesananUntukPembayaran', compact('transaksis'));
}

    public function payment_pesanan($id)
    {

      // Mengambil transaksi berdasarkan ID yang diberikan
        $transaksi = Transaksi::with('detailTransaksis.produk', 'user')->findOrFail($id);

        // Mengirim data transaksi ke view
        return view('customer.paymentPesanan', compact('transaksi'));
    }


   public function store_bukti_pembayaran(Request $request, $id)
    {
        // Validate the incoming request to ensure the 'image' field is present and is a file.
        // $request->validate([
        //     'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Retrieve the transaksi model by its ID.

        
        $transaksi = Transaksi::findOrFail($id);

        // Handle the file upload.
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = time() . '_' . $transaksi->no_transaksi . '.' . $file->getClientOriginalExtension();
            
            // Store the file in the public storage.
            Storage::disk('public')->put($path, file_get_contents($file));

          
            // Update the transaksi record with the new image path and change status_transaksi.
            $transaksi->update([
                'image_bukti_pembayaran' => $path,
                'status_transaksi' => 'menunggu konfirmasi'
            ]);
        }
       
        // Redirect back or to a specific route with a success message.
        return redirect()->route('home')->with('success', 'Bukti pembayaran berhasil diunggah dan status transaksi diperbarui.');
    }


    public function pesanan_selesai($id)
    {
        // Mengambil objek Transaksi berdasarkan $id
        $transaksi = Transaksi::findOrFail($id);

        // Ubah status transaksi menjadi 'selesai'
        $transaksi->status_transaksi = 'selesai';
        $transaksi->save();

        // Redirect ke halaman home atau halaman lain yang sesuai
        return redirect()->route('home');
    }

}
