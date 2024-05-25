<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }
    public function store(Request $request)
    {
       $input = $request->all();
       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'username' => $input['username'],
        'address' => $input['address'], 
        'date_of_birth' => $input['date_of_birth'], 
        'phone_number' => $input['phone_number'],
        'gender' => $input['gender'],
      ]);
      return view('customer.registerBerhasil');
    }
}
