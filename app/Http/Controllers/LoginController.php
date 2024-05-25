<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Hash;
use App\Models\User;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

public function check(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Auth::attempt($credentials)) {
       
        if ($user->role === 'customer' && $user->email_verified_at === null) {
            return redirect()->route('login')->with('error', 'Email belum diverifikasi');
        }

        session(['role' => $user->role]);

        switch ($user->role) {
            case 'customer':
                return redirect()->route('home');
            case 'mo':
                return redirect()->route('dataKaryawan');
            case 'admin':
                return redirect()->route('create_resep');
            case 'owner':
                return redirect()->route('index_gaji_bonus_karyawan');
            default:
                return redirect()->route('login')->with('error', 'Peran pengguna tidak valid');
        }
    }

    return redirect()->route('login')->with('error', 'Username atau Password Salah');
}


}