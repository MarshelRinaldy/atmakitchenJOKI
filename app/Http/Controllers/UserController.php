<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profil_admin(){
        $user = Auth::user();
        return view('admin.adminProfil', compact('user'));
    }

    public function profil_mo(){
        $user = Auth::user();
        return view('MO.moProfil', compact('user'));
    }

    public function profil_owner(){
        $user = Auth::user();
        return view('owner.ownerProfil', compact('user'));
    }

    public function change_password(){
        $user = Auth::user();
        return view('changePassword', compact('user'));
    }

   public function update_password(Request $request){
    // Mendapatkan user yang sedang masuk
    $user = User::find(Auth::id());

    // Cek apakah old_password sesuai dengan kata sandi saat ini
    if (Hash::check($request->old_password, $user->password)) {
        // Kata sandi lama cocok, maka perbarui dengan yang baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        if($user->role == 'admin'){
             return redirect()->route('profil_admin')->with('success', 'Kata sandi berhasil diperbarui.');
        }else if($user->role == 'mo'){
            return redirect()->route('profil_mo')->with('success', 'Kata sandi berhasil diperbarui.');
        }else if($user->role == 'owner'){
            return redirect()->route('profil_owner')->with('success', 'Kata sandi berhasil diperbarui.');
        }
    } else {
        // Jika kata sandi lama tidak cocok, kembalikan pesan kesalahan
        return redirect()->back()->with('error', 'Kata sandi lama tidak cocok.');
    }
}

}
