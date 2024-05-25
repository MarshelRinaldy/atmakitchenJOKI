<?php
use App\Models\Dukpro;
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Hampers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/hampers/' . $hampers->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $hampers->nama }}</h3>
                        <hr />
                        <p>{{ 'Rp ' . number_format($hampers->harga, 2, ',', '.') }}</p>
                        <code>
                            <p>{!! $hampers->deskripsi !!}</p>
                        </code>
                        <hr />
                        <p>Stock : {{ $hampers->stok }}</p>


                        <hr>
                        Produk :   @foreach ($hampers->details as $item)
                        <?php $detail = Dukpro::find($item['dukpro_id'])
                        ?>
                        {{ $detail->nama}}.
                    @endforeach

                        <hr>
                      
            
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
