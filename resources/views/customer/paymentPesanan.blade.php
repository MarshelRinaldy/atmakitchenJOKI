@extends('layout')

@section('content')
    <style>
        .address {
            display: block;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }

        .transaction-date {
            font-size: 0.8rem;
            padding-left: 75%;
        }

        .custom-button {
            float: right;
            background-color: green;
            /* Set button background color to green */
            border-color: green;
            /* Set button border color to green */
        }

        .custom-button:hover {
            background-color: darkgreen;
            /* Optional: Darker green on hover */
            border-color: darkgreen;
            /* Optional: Darker green border on hover */
        }

        .total-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        .total-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding-top: 20px;
        }

        .file-input-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .file-input-container input[type="file"] {
            border: none;
            background-color: transparent;
        }
    </style>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div>
                    <a class="navbar-brand" href="#">Atma Kitchen</a>
                    <span class="address">Jl Kudungga, No 57, Yogyakarta</span>
                </div>
                <div class="transaction-date ml-auto">
                    {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-M-Y') }}
                </div>
            </nav>

            <div class="card mb-3">
                <div class="card-header">
                    User Information
                </div>
                <div class="card-body">
                    <p>Name: {{ $transaksi->user->name }}</p>
                    <p>Phone: {{ $transaksi->user->phone_number }}</p>
                    <p>Address: {{ $transaksi->user->address }}</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    Order Details
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No Transaksi</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->detailTransaksis as $detail)
                                <tr>
                                    <td>{{ $transaksi->no_transaksi }}</td>
                                    <td>{{ $detail->produk->nama }}</td>
                                    <td>Rp{{ number_format($detail->produk->harga, 2, ',', '.') }}</td>
                                    <td>{{ $detail->jumlah_produk }}</td>
                                    <td>Rp{{ number_format($detail->jumlah_produk * $detail->produk->harga, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <p>Subtotal:
                        Rp{{ number_format($transaksi->detailTransaksis->sum(function ($detail) {return $detail->jumlah_produk * $detail->produk->harga;}),2,',','.') }}
                    </p>
                    <hr>
                    <form action="{{ route('store_bukti_pembayaran', $transaksi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="total-container">
                            <div class="file-input-container">
                                <input type="file" name="image">
                            </div>
                            <div class="total-header">
                                <h1 style="font-weight: bold; font-size: larger;">Total:
                                    Rp{{ number_format($transaksi->total_harga, 2, ',', '.') }}</h1>
                                <button type="submit" class="btn btn-primary btn-lg custom-button">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
