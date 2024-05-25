<?php

namespace App\Http\Controllers;

use App\Models\Dukpro;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $data['produk'] = Dukpro::where('status','Available')->get();
        
        return view('dashboard',$data);
    }


     public function home(){
        
        $data['produk'] = Dukpro::where('status','Available')->get();

        return view('dashboardCustomer',$data);
    }
}
