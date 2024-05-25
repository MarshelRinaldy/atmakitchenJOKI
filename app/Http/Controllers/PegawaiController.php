<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function showPegawai(Request $request)
    {
        $search = $request->input('search');

        $query = User::where('role', '!=', 'customer')->with('pegawai');

        if($request->has('search') && !empty($search)){
            $users = $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('username', 'like', "%$search%")
                        ->orWhere('role', 'like', "%$search%");
                })->paginate(5);
        } else {
            $users = $query->paginate(5);
        }

        return view('MO.dataKaryawan', compact('users'));
    }

  
    public function tambahPegawai(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'nip' => 'required',
            'gaji' => 'required',
        ]);
      
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'role' => $request->role, 
        ]);

        $pegawai = Pegawai::create([
            'user_id' => $user->id,
            'nip' => $request->nip, 
            'gaji' => $request->gaji,
        ]);
     
        return redirect()->route('dataKaryawan')->with('success', 'Data pegawai berhasil ditambahkan');
    }

   public function update_pegawai(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'role' => $request->role,
        ]);
        
        $user->pegawai->update([
            'nip' => $request->nip,
            'gaji' => $request->gaji,
        ]);

        return redirect()->route('dataKaryawan')->with('success', 'Data pegawai berhasil diupdate');
    }

    public function edit_pegawai($id)
        {
          $user = User::find($id);
          return view('MO.updateKaryawan', compact('user'));
        }

        public function delete_pegawai($id)
        {
                $pegawai = Pegawai::where('user_id', $id)->first();

                if (!$pegawai) {
                    return redirect()->route('dataKaryawan')->with('error', 'Pegawai tidak ditemukan');
                }
                
                $pegawai->delete();
                $user = User::findOrFail($id);
                $user->delete();

                return redirect()->route('dataKaryawan')->with('success', 'Data pegawai berhasil dihapus');
        }

        public function search_pegawai(Request $request)
        {
            $keyword = $request->input('keyword');

            $users = User::where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('username', 'like', "%$keyword%")
                    ->orWhere('role', 'like', "%$keyword%");
            })->where('role', '!=', 'customer')
            ->with('pegawai')
            ->get();
         
            return view('MO.dataKaryawan', compact('users'));
        }

        public function index_gaji_bonus_karyawan(){
            $query = User::where('role', '!=', 'customer')->with('pegawai');
            $users = $query->paginate(5);
            return view('owner.gajiKaryawan', compact('users'));
        }
        

        public function edit_gajiPegawai($id)
        {
          $user = User::find($id);
          return view('owner.updateGajiKaryawan', compact('user'));
        }

        public function update_gajiPegawai(Request $request, $id)
        {
            $pegawai = Pegawai::findOrFail($id);
            $pegawai->update([
                'nama' => $request->name,
                'gaji' => $request->gaji,
                'bonus' => $request->bonus,
            ]);

            $query = User::where('role', '!=', 'customer')->with('pegawai');
            $users = $query->paginate(5);
            
            return redirect()->route('index_gaji_bonus_karyawan')->with('success', 'Berhasil Mengubah Gaji atau Bonus Karyawan');

        }
        
        // public function showGajiPegawai(Request $request)
        // {
        //     $search = $request->input('search');

        //     $query = User::where('role', '!=', 'customer')->with('pegawai');

        //     if($request->has('search') && !empty($search)){
        //         $users = $query->where(function ($query) use ($search) {
        //                 $query->where('name', 'like', "%$search%")
        //                     ->orWhere('email', 'like', "%$search%")
        //                     ->orWhere('username', 'like', "%$search%")
        //                     ->orWhere('role', 'like', "%$search%");
        //             })->paginate(5);
        //     } else {
        //         $users = $query->paginate(5);
        //     }

        //     return view('owner.gajiKaryawan', compact('users'));
        // }
}
