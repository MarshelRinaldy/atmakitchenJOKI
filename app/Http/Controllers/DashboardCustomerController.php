<?php

namespace App\Http\Controllers;

use App\Models\Dukpro;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardCustomerController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $today = Carbon::today();
        
        if ($date) {
            $selectedDate = Carbon::parse($date);
            $data['produk'] = Dukpro::where('status', 'Available')
                ->where('tanggal_kadaluarsa', '>=', $today)
                ->where('tanggal_kadaluarsa', '<=', $selectedDate)
                ->get();
        } else {
            $data['produk'] = Dukpro::where('status', 'Available')
                ->where('tanggal_kadaluarsa', '>=', $today)
                ->get();
        }

        return view('dashboardCustomer', $data);
    }
    public function filter(Request $request)
    {
        $date = $request->input('date');
        $data['produk'] = Dukpro::where('status','Available')
            ->where('tanggal_kadaluarsa', '>=', $date)
            ->get();
        return response()->json($data);
    }

}
