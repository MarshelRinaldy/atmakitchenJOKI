@extends('NavbarAdmin')

@section('content')
    <!-- Include Bootstrap CSS and JS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="container">
        <h2>Daftar Pesanan yang Sudah Telat Pembayaran</h2>

        @foreach ($transaksis as $transaksi)
            <div class="order-card">
                <div class="store-info">
                    <span class="store-name">No Pesanan : {{ $transaksi->no_transaksi }}</span>
                    {{-- Link ke detail toko --}}
                </div>

                @foreach ($transaksi->detailTransaksis as $detail)
                    <div class="order-details">
                        <img src="../image/{{ $detail->produk->image }}" alt="image" class="product-image">
                        <div class="product-info">
                            <p class="product-name">{{ $detail->produk->nama }}</p>
                            {{-- Jumlah produk dalam transaksi --}}
                            <p class="order-quantity">x{{ $detail->jumlah_produk }}</p>
                            {{-- Status transaksi --}}
                            <span class="status">Telat Pembayaran</span>
                        </div>
                        <div class="order-pricing">
                            {{-- Harga produk --}}
                            <p class="discounted-price">Rp{{ $detail->produk->harga }}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach

                <div class="order-actions">
                    {{-- Total harga transaksi --}}
                    <p class="total-price">Biaya Ongkir: Rp{{ $transaksi->biaya_ongkir }}</p>
                    <p class="total-price">Total Harga: Rp{{ $transaksi->total_harga + $transaksi->biaya_ongkir }}</p>
                    {{-- Tombol aksi --}}
                    <button type="button" class="btn btn-primary ready-to-ship-btn" data-id="{{ $transaksi->id }}">Batalkan
                        Pesanan</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin membatalkan pesanan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirmYes">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form for PATCH request -->
    <form id="readyToShipForm" method="POST" style="display: none;">
        @csrf
        @method('PATCH')
    </form>

    <style>
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .order-card {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        .store-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .store-name {
            font-weight: bold;
            font-size: 16px;
        }

        .order-details {
            display: flex;
            margin-top: 20px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
        }

        .order-quantity {
            font-size: 14px;
            color: #555;
        }

        .order-status {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-left: 20px;
        }

        .status {
            font-size: 14px;
            color: green;
        }

        .order-pricing {
            text-align: right;
        }

        .discounted-price {
            font-weight: bold;
            color: #d9534f;
        }

        .total-price {
            font-size: 16px;
            font-weight: bold;
        }

        .order-actions {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-end;
            margin-top: 20px;
        }

        .order-actions p {
            margin-right: 10px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedOrderId;

            document.querySelectorAll('.ready-to-ship-btn').forEach(button => {
                button.addEventListener('click', function() {
                    selectedOrderId = this.getAttribute('data-id');
                    $('#confirmModal').modal('show');
                });
            });

            document.getElementById('confirmYes').addEventListener('click', function() {
                if (selectedOrderId) {
                    const form = document.getElementById('readyToShipForm');
                    form.action = `/pesanan_siap_dikirim_dipickup/${selectedOrderId}`;
                    form.submit();
                }
            });

            // Make sure the modal can be closed properly
            $('#confirmModal').on('hidden.bs.modal', function() {
                selectedOrderId = null;
            });
        });
    </script>
@endsection
