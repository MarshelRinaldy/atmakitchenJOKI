<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Dotenv\Util\Str;
use App\Models\Dukpro;
use App\Models\Produk;
use App\Models\BahanBaku;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Owner',
        //     'email' => 'owner@example.com',
        //     'username' => 'owner1',
        //     'role' => 'owner',
        //     'password' => 'owner123',
        //     'address' => 'JL. alibudin',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '08416623321',

        // ]);

        // User::factory()->create([
        //     'name' => 'Manajer Operasional',
        //     'email' => 'mo@example.com',
        //     'username' => 'mo1',
        //     'password' => 'mo123',
        //     'address' => 'JL. sukarto',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '0841241241',
        //     'gender' => 'male',
        //     'role' => 'mo',
        // ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'username' => 'User1',
        //     'password' => 'admin123',
        //     'address' => 'JL. budiantooo todong',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '08433223',
        //     'gender' => 'male',
        //     'role' => 'admin',
        // ]);


        //PAKE DARI SINI

        // User::factory()->create([
        //     'name' => 'customer',
        //     'email' => 'customer1@gmail.com',
        //     'username' => 'customer',
        //     'role' => 'customer',
        //     'password' => bcrypt('customer123'),
        //     'address' => 'JL. alibudin',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '08551515523',
        //     'gender' => 'male',
        // ]);


        // User::factory()->create([
        //     'name' => 'admin1',
        //     'email' => 'admin1@gmail.com',
        //     'username' => 'admin1',
        //     'role' => 'customer',
        //     'password' => bcrypt('customer123'),
        //     'address' => 'JL. hasanuddin',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '08551515523',

        //     'gender' => 'female',
        // ]);

        // User::factory()->create([
        //     'name' => 'Manajer Operasional',
        //     'email' => 'mo1@gmail.com',
        //     'username' => 'mo1',
        //     'role' => 'mo',
        //     'password' => bcrypt('mo123'),
        //     'address' => 'JL. sukarto',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '0841241241',
        //     'gender' => 'male',
        // ]);


        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'deaye913@gmail.com',
        //     'username' => 'admin1',
        //     'role' => 'admin',
        //     'password' => bcrypt('deaye913'),
        //     'address' => 'JL. budiantooo todong',
        //     'date_of_birth' => '2024-04-29',
        //     'phone_number' => '08433223',
        //     'gender' => 'male',
        // ]);

        // $bahanBakuData = [
        //     [
        //         'nama_bahan_baku' => 'Bahan Baku 7',
        //         'stok_bahan_baku' => 25, // Perbaiki 'stok_bahan_aku' menjadi 'stok_bahan_baku'
        //         'satuan_bahan_baku' => 'Gr',
        //         'harga_bahan_baku' => 36,
        //     ],
        //     [
        //         'nama_bahan_baku' => 'Bahan Baku 2',
        //         'stok_bahan_baku' => 555, // Perbaiki 'stok_bahan_aku' menjadi 'stok_bahan_baku'
        //         'satuan_bahan_baku' => 'Butir',
        //         'harga_bahan_baku' => 222,

        //     ],
        //     [
        //         'nama_bahan_baku' => 'Bahan Baku 3',
        //         'stok_bahan_baku' => 3233, // Perbaiki 'stok_bahan_aku' menjadi 'stok_bahan_baku'
        //         'satuan_bahan_baku' => 'Kg',
        //         'harga_bahan_baku' => 55,

        //     ],
        // ];

        // // Loop melalui array bahan baku dan masukkan ke database
        // foreach ($bahanBakuData as $data) {
        //     BahanBaku::create($data);
        // }

        // PAKE DARI SINI

        User::factory()->create([
    'name' => 'customer',
    'email' => 'customer1@gmail.com',
    'username' => 'customer',
    'role' => 'customer',
    'password' => bcrypt('customer123'),
    'address' => 'JL. alibudin',
    'date_of_birth' => '2024-04-29',
    'phone_number' => '08551515523',
    'gender' => 'male',
]);

User::factory()->create([
    'name' => 'customer2',
    'email' => 'customer2@gmail.com',
    'username' => 'customer2',
    'role' => 'customer',
    'password' => bcrypt('customer123'),
    'address' => 'JL. hasanuddin',
    'date_of_birth' => '2024-04-29',
    'phone_number' => '08551515523',
    'gender' => 'male',
]);

User::factory()->create([
    'name' => 'Manajer Operasional',
    'email' => 'mo1@gmail.com',
    'username' => 'mo1',
    'role' => 'mo',
    'password' => bcrypt('mo123'),
    'address' => 'JL. sukarto',
    'date_of_birth' => '2024-04-29',
    'phone_number' => '0841241241',
    'gender' => 'male',
]);

User::factory()->create([
    'name' => 'Admin 1',
    'email' => 'admin1@gmail.com',
    'username' => 'admin1',
    'role' => 'admin',
    'password' => bcrypt('admin123'),
    'address' => 'JL. sukarto',
    'date_of_birth' => '2024-04-29',
    'phone_number' => '0841241241',
    'gender' => 'male',
]);

$produks = [
    [
        'nama' => 'Produk 1',
        'harga' => 20000,
        'stok' => 50,
        'status' => 'aktif',
        'keterangan' => 'Deskripsi produk 1',
        'tanggal_kadaluarsa' => '2024-12-31',
        'deskripsi' => 'Deskripsi produk 1',
        'image' => 'gambar_produk_1.jpg',
        'kategori' => 'Kategori 1',
    ],
    [
        'nama' => 'Produk 2',
        'harga' => 25000,
        'stok' => 30,
        'status' => 'aktif',
        'keterangan' => 'Deskripsi produk 2',
        'tanggal_kadaluarsa' => '2024-12-31',
        'deskripsi' => 'Deskripsi produk 2',
        'image' => 'gambar_produk_2.jpg',
        'kategori' => 'Kategori 2',
    ],
    [
        'nama' => 'Produk 3',
        'harga' => 25000,
        'stok' => 30,
        'status' => 'aktif',
        'keterangan' => 'Deskripsi produk 3',
        'tanggal_kadaluarsa' => '2024-12-31',
        'deskripsi' => 'Deskripsi produk 3',
        'image' => 'gambar_produk_3.jpg',
        'kategori' => 'Kategori 3',
    ],
];

// Loop melalui array produk dan masukkan ke database
foreach ($produks as $produk) {
    Dukpro::create($produk);
}

DB::table('transaksis')->insert([
    [
        'user_id' => 1,
        'metode_pembayaran' => 'transfer',
        'tanggal_transaksi' => now(),
        'jumlah_transaksi' => 100000,
        'bukti_pembayaran' => 'bukti1.png',
        'status_pembayaran' => 'belum bayar',
        'status_pengantaran' => 'delivery',
        'jenis_delivery' => 'express',
        'jarak_delivery' => 10.5,
        'alamat_pengantaran' => 'Jl. Sudirman No. 10',
        'biaya_ongkir' => 15000,
        'total_harga' => 115000,
        'status_transaksi' => 'menunggu pembayaran',
        'image_bukti_pembayaran' => null,
        'no_transaksi' => 'AK9214312KA',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'user_id' => 2,
        'metode_pembayaran' => 'cash',
        'tanggal_transaksi' => now(),
        'jumlah_transaksi' => 200000,
        'bukti_pembayaran' => 'bukti2.png',
        'status_pembayaran' => 'belum bayar',
        'status_pengantaran' => 'pick up sendiri',
        'jenis_delivery' => null,
        'jarak_delivery' => 0,
        'alamat_pengantaran' => null,
        'biaya_ongkir' => 0, // Set to 0 instead of null
        'total_harga' => 200000,
        'status_transaksi' => 'menunggu pembayaran',
        'image_bukti_pembayaran' => null,
        'no_transaksi' => 'AK921442141KA',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);


$detailTransaksis = [
    [
        'transaksi_id' => 1,
        'produk_id' => 3,
        'jumlah_produk' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'transaksi_id' => 1,
        'produk_id' => 2,
        'jumlah_produk' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'transaksi_id' => 1,
        'produk_id' => 3,
        'jumlah_produk' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'transaksi_id' => 2,
        'produk_id' => 1,
        'jumlah_produk' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'transaksi_id' => 2,
        'produk_id' => 2,
        'jumlah_produk' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],
];

foreach ($detailTransaksis as $detailTransaksi) {
    DetailTransaksi::create($detailTransaksi);
}
    }
};
