<?php


use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\dukproController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\hampersController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\PromoPointController;
use App\Http\Controllers\PemasukanPerusahaanController;
use App\Http\Controllers\pencatatanBBController;
use App\Http\Controllers\pencatatanPengeluaranLainController;
use App\Http\Controllers\TransaksiController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole;

use App\Models\Customer;
use App\Models\BahanBaku;




//untuk verifikasi email -------------------------------------------------------------------------

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Perbarui email_verified_at pengguna saat email diverifikasi
    $request->user()->forceFill([
        'email_verified_at' => now(),
    ])->save();

    return redirect('/login');

})->middleware(['auth', 'signed'])->name('verification.verify');

// Route::get('/', function () {
//     return 'ini adalahprofile. penanda bahwa user sudah login dan terverifikasi';
// })->middleware(['auth', 'verified']);
// ;

//------------------------------------------------------------------------------------------------

Route::get('/pengeluaranLain/create', [pencatatanPengeluaranLainController::class, 'create_PencatatanPengeluaranLain'])->name('create_PencatatanPengeluaranLain');
Route::get('/pengeluaranLain/tampilanPengeluaranLain', [pencatatanPengeluaranLainController::class, 'index'])->name('index_PencatatanPengeluaranLain');
Route::post('/pengeluaranLain/store_PencatatanPengeluaranLain', [pencatatanPengeluaranLainController::class, 'store_PencatatanPengeluaranLain'])->name('store_PencatatanPengeluaranLain');
Route::get('/pengeluaranLain/edit_PencatatanPengeluaranLain/{PencatatanPengeluaranLain}', [pencatatanPengeluaranLainController::class, 'edit_PencatatanPengeluaranLain'])->name('edit_PencatatanPengeluaranLain');
Route::patch('/pengeluaranLain/update_PencatatanPengeluaranLain/{PencatatanPengeluaranLain}', [pencatatanPengeluaranLainController::class, 'update_PencatatanPengeluaranLain'])->name('update_PencatatanPengeluaranLain');
Route::delete('/pengeluaranLain/delete_PencatatanPengeluaranLain/{PencatatanPengeluaranLain}', [pencatatanPengeluaranLainController::class, 'destroy_PencatatanPengeluaranLain'])->name('destroy_PencatatanPengeluaranLain');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::get('/dashboard-customer', function () {
//     return view('dashboardCustomer');
// })->name('home')->middleware('auth', CheckRole::class . ':customer');

Route::get('/dashboard-customer/for-customer', [DashboardCustomerController::class, 'index'])->name('home');

Route::get('customer/dashboard/filter', [DashboardCustomerController::class, 'filter'])->name('customer.dashboard.filter');
Route::get('/dashboard-customer', [DashboardCustomerController::class, 'index'])->name('dashboard');

 // routes/web.php
// Cart routes
Route::post('/cart/applyPoints', [CartController::class, 'applyPoints'])->name('cart.applyPromoPoint');
Route::post('/cart/applyPromo', [CartController::class, 'applyPromo'])->name('cart.applyPromo');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');


Route::get('/dashboardCustomer', [DashboardCustomerController::class, 'index'])->name('dashboardCustomer.index');


Route::get('/register/view', function () {
    return view('customer.register');
})->name('register_view');

// ini route yang dipake untuk register ASLINYA
Route::post('/register', [CustomerController::class, 'register'])->name('register');


Route::get('/login', function () {
    return view('customer.login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::post('/check', [LoginController::class, 'check'])->name('check');

Route::get('/tambahPenitip', function () {
    return view('MO.tambahPenitip');
});

Route::get('/editPenitip', function () {
    return view('MO.editPenitip');
});

// Route::get('/BahanBaku/edit_bahanBaku', 'BahanBakuController@edit_BahanBaku')->name('edit_bahanBaku');

Route::get('/BahanBaku/tampilanDataBahanBaku', [BahanBakuController::class, 'index'])->name('index_bahanBaku');

Route::get('/addBahanBaku', function () {
    return view('admin.addBahanBaku');
});


//UNTUK CUSTUMOR
Route::get('/customer/profile', [CustomerController::class, 'profil_customer'])->name('profil_customer')->middleware('auth', CheckRole::class . ':customer');
Route::patch('/customer/update_profile', [CustomerController::class, 'update_profil'])->name('update_profil')->middleware('auth', CheckRole::class . ':customer');
Route::get('customer/history_pesanan', [CustomerController::class, 'history_pesanan'])->name('history_pesanan')->middleware('auth', CheckRole::class . ':customer');
Route::get('customer/history_pesanan/detail', [CustomerController::class, 'searchHistory'])->name('searchHistory')->middleware('auth', CheckRole::class . ':customer');

// Auth::routes(['verify' => true]);

//Route UNTUK CHANGE PASSWORD UNTUK ADMIN, MO, OWNER
Route::get('/changePassword', [UserController::class, 'change_password'])->name('change_password');
Route::patch('/changePassword', [UserController::class, 'update_password'])->name('update_password');


//INI NANTINYA UNTUK ADMIN
Route::get('/pengiriman', [TransaksiController::class, 'show_pengiriman'])->name('show_pengiriman');
Route::get('/updatePengiriman/{id}', [TransaksiController::class, 'update_pengiriman'])->name('update_pengiriman');
Route::patch('/input_pengiriman/{id}/{total_harga}', [TransaksiController::class, 'input_pengiriman'])->name('input_pengiriman');

//INI UNTUK ADMIN(KONFIRMASI PESANAN)
Route::get('/show_konfirmasi_pesanan', [TransaksiController::class, 'show_konfirmasi_pesanan'])->name('show_konfirmasi_pesanan');
Route::get('/detailKonfirmasiPesanan/{id}', [TransaksiController::class, 'detail_konfirmasi_pesanan'])->name('detail_konfirmasi_pesanan');
Route::get('/show_pesanan_diproses', [TransaksiController::class, 'show_pesanan_diproses'])->name('show_pesanan_diproses');
Route::patch('/pesanan_siap_dikirim_dipickup/{id}', [TransaksiController::class, 'pesanan_siap_dikirim_dipickup'])->name('pesanan_siap_dikirim_dipickup');

//INI UNTUK ADMIN UNTUK KONFIRMASI PESANAN DAN MENGINPUTKAN JUMLAH INCOME PERUSAHAAN
Route::post('/store_pemasukan_perusahaan', [PemasukanPerusahaanController::class, 'store_pemasukan_perusahaan'])->name('store_pemasukan_perusahaan');

//INI UNTUK CUSTOMER PAYMENT
Route::get('/show_payment_pesanan_list', [CustomerController::class, 'show_payment_pesanan_list'])->name('show_payment_pesanan_list');
Route::get('/payment_pesanan/{id}', [CustomerController::class, 'payment_pesanan'])->name('payment_pesanan');
Route::patch('/store/bukti_pembayaran/{id}', [CustomerController::class, 'store_bukti_pembayaran'])->name('store_bukti_pembayaran');
Route::patch('/pesanan_selesai/{id}', [CustomerController::class, 'pesanan_selesai'])->name('pesanan_selesai');

// INI UNTUK ADMIN SAJA
Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {

    //UNTUK PROFIL ADMIN
    Route::get('/admin/profile', [UserController::class, 'profil_admin'])->name('profil_admin');
    //BAHAN BAKU
    Route::get('/bahanBaku', function () {
        return view('admin.bahanBaku');
    });
    Route::get('/tambahBahanBaku', function () {
        return view('admin.tambahBahanBaku');
    });
    // Route::get('/BahanBaku/create', [BahanBakuController::class, 'create_BahanBaku'])->name('create_BahanBaku');
    // Route::post('/BahanBaku/store_bahanBaku', [BahanBakuController::class, 'store_BahanBaku'])->name('store_BahanBaku');
    // Route::get('/BahanBaku/edit_bahanBaku/{BahanBaku}', [BahanBakuController::class, 'edit_BahanBaku'])->name('edit_BahanBaku');
    // Route::patch('/BahanBaku/update_BahanBaku/{BahanBaku}', [BahanBakuController::class, 'update_BahanBaku'])->name('update_BahanBaku');

    Route::get('/BahanBaku/edit_bahanBaku', 'BahanBakuController@edit_BahanBaku')->name('edit_bahanBaku');

    Route::get('/BahanBaku/tampilanDataBahanBaku', [BahanBakuController::class, 'index'])->name('index_bahanBaku');
    Route::get('/BahanBaku/create', [BahanBakuController::class, 'create_BahanBaku'])->name('create_BahanBaku');
    Route::post('/BahanBaku/store_bahanBaku', [BahanBakuController::class, 'store_BahanBaku'])->name('store_BahanBaku');
    // Route::get('/BahanBaku/tampilanDataBahanBaku', function () {
    //     return view('admin.bahanBaku');
    // });
    // Route::get('/BahanBaku/store_bahanBaku', [BahanBakuController::class, 'store_BahanBaku'])->name('store_BahanBaku');
    Route::get('/BahanBaku/edit_bahanBaku/{BahanBaku}', [BahanBakuController::class, 'edit_BahanBaku'])->name('edit_BahanBaku');
    Route::patch('/BahanBaku/update_BahanBaku/{BahanBaku}', [BahanBakuController::class, 'update_BahanBaku'])->name('update_BahanBaku');
    Route::delete('/BahanBaku/delete_bahanBaku/{BahanBaku}', [BahanBakuController::class, 'destroy_BahanBaku'])->name('destroy_BahanBaku');
    // Route::get('/BahanBaku/tampilanDataBahanBaku', [BahanBakuController::class, 'store_BahanBaku'])->name('tampilanDataBahanBaku');



    //hampers controller
    Route::controller(hampersController::class)->group(function () {
        Route::get('/hampers', 'index')->name('hampers.index');
        Route::get('/hampers/create', 'create')->name('hampers.create');
        Route::post('/hampers', 'store')->name('hampers.store');

        Route::get('/hampers/{hampers}/edit', 'edit')->name('hampers.edit');
        Route::get('/hampers/{hampers}/show', 'show')->name('hampers.show');
        Route::put('/hampers/{hampers}/', 'update')->name('hampers.update');

        Route::delete('/hampers/{hampers}/', 'destroy')->name('hampers.destroy');

        Route::get('/hampers/search', 'search')->name('hampers.search');
    });

    Route::controller(dukproController::class)->group(function () {
        Route::get('/dukpro', 'index')->name('dukpro.index');
        Route::get('/dukpro/create', 'create')->name('dukpro.create');
        Route::post('/dukpro', 'store')->name('dukpro.store');

        Route::get('/dukpro/{dukpro}/edit', 'edit')->name('dukpro.edit');
        Route::get('/dukpro/{dukpro}/show', 'show')->name('dukpro.show');
        Route::put('/dukpro/{dukpro}/', 'update')->name('dukpro.update');

        Route::delete('/dukpro/{dukpro}/', 'destroy')->name('dukpro.destroy');
        Route::get('/dukpro/search', 'search')->name('dukpro.search');

    });

    Route::controller(PromoPointController::class)->group(function(){
        Route::get('/promopoint','index')->name('promopoint.index');
        Route::get('/promopoint/create','create')->name('promopoint.create');
        Route::post('/promopoint','store')->name('promopoint.store');
        
        Route::get('/promopoint/{promopoint}/edit','edit')->name('promopoint.edit');
        Route::get('/promopoint/{promopoint}/show','show')->name('promopoint.show');
        Route::put('/promopoint/{promopoint}/','update')->name('promopoint.update');
        
        Route::delete('/promopoint/{promopoint}/','destroy')->name('promopoint.destroy');
        Route::get('/promopoint/search', 'search')->name('promopoint.search');

    });


    //RESEP
    Route::get('/resep/create', [ResepController::class, 'create_resep'])->name('create_resep');
    Route::post('/resep/create', [ResepController::class, 'tambahResep'])->name('tambahResep');
    Route::get('/resep/update/{produk}', [ResepController::class, 'updateResep'])->name('updateResep');
    Route::get('/resep', [ResepController::class, 'index_resep'])->name('index_resep');
    Route::get('/detailResep/{produk}', [ResepController::class, 'index_detailResep'])->name('detailResep');
    Route::get('/resep/search', [ResepController::class, 'search_resep'])->name('search_resep');
    Route::post('/resep/update/{produk}', [ResepController::class, 'update_resep'])->name('update_resep');
    Route::post('/resep/delete/{produk}', [ResepController::class, 'delete_resep'])->name('delete_resep');
});



//INI UNTUK MO
Route::middleware(['auth', CheckRole::class . ':mo'])->group(function () {

    //UNTUK PROFIL MO
    Route::get('/mo/profile', [UserController::class, 'profil_mo'])->name('profil_mo');

    Route::controller(pencatatanBBController::class)->group(function () {
        Route::get('/bahanbaku', 'index')->name('bahanbaku.index');
        Route::get('/bahanbaku/create', 'create')->name('bahanbaku.create');
        Route::post('/bahanbaku', 'store')->name('bahanbaku.store');
        Route::get('/bahanbaku/{bahanbaku}/edit', 'edit')->name('bahanbaku.edit');
        Route::get('/bahanbaku/{bahanbaku}/show', 'show')->name('bahanbaku.show');
        Route::put('/bahanbaku/{bahanbaku}/', 'update')->name('bahanbaku.update');
        Route::delete('/bahanbaku/{bahanbaku}/', 'destroy')->name('bahanbaku.destroy');
        Route::get('/bahanbaku/search', 'search')->name('bahanbaku.search');
    });

    //MO SEMUA
    Route::get('/tambahKaryawan', function () {
        return view('MO.tambahKaryawan');
    })->name('tambahKaryawan');
    Route::post('/tambah-pegawai', [PegawaiController::class, 'tambahPegawai'])->name('pegawai.tambah');
    Route::get('/dataKaryawan', [PegawaiController::class, 'showPegawai'])->name('dataKaryawan');
    Route::get('/pegawai/{karyawan}/edit', [PegawaiController::class, 'edit_pegawai'])->name('edit_pegawai');
    Route::patch('/pegawai/{pegawai}/update', [PegawaiController::class, 'update_pegawai'])->name('update_pegawai');
    Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'delete_pegawai'])->name('delete_pegawai');

    //PENITIP BELUM ADA YANTOK

    //PENCATATAN PENGELUARAN BAHAN BAKU BELUM YANTOK
});

Route::middleware(['auth', CheckRole::class . ':owner'])->group(function () {

    //UNTUK PROFIL OWNER
    Route::get('/owner/profile', [UserController::class, 'profil_owner'])->name('profil_owner');

    // INI ADALAH UNTUK OWNER
    Route::get('/owner/bonus', [PegawaiController::class, 'index_gaji_bonus_karyawan'])->name('index_gaji_bonus_karyawan')->middleware('auth', CheckRole::class . ':owner');
    Route::get('/showGajiPegawai', [PegawaiController::class, 'showGajiPegawai'])
        ->name('showGajiPegawai')
        ->middleware('auth', CheckRole::class . ':owner');
    Route::get('/pegawai/{pegawai}/edit_gajiPegawai', [PegawaiController::class, 'edit_gajiPegawai'])->name('edit_gajiPegawai');
    Route::patch('/pegawai/{pegawai}/update_gajiPegawai', [PegawaiController::class, 'update_gajiPegawai'])->name('update_gajiPegawai');

});