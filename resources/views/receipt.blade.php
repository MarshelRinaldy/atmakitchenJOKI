<?php 
use App\Models\Dukpro;
use App\Models\PromoPoint;  // Ensure you have imported the Promo model
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Receipt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Transaction Receipt</h4>
            </div>
            <div class="card-body">
                <h5>Order ID: {{ $order->id_transaksi }}</h5>
                <p>Total Price: Rp. {{ $order->total_price }}</p>
                <hr>
                <h6>Order Items</h6>
                <ul class="list-group">
                    @foreach ($order->orderItems as $item)
                        <?php $prod = Dukpro::find($item->dukpro_id); ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-8">{{ $prod->nama }} ({{ $item->quantity }} x Rp. {{ $item->price }})</div>
                                <div class="col-4 text-right">Rp. {{ $item->quantity * $item->price }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <hr>
                <h6>Applied Promos</h6>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-8">Diskon</div>
                            <div class="col-4 text-right">- Rp. {{ session('total_discount') }}</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ url('/') }}" class="btn btn-primary">Back to Shop</a>
            </div>
        </div>
    </div>
</body>

</html>
