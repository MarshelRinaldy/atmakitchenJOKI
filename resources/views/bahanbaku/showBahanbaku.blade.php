<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center"> <!-- Menggunakan justify-content-center untuk memusatkan row -->
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded mx-auto">
                    <!-- Menambahkan kelas mx-auto untuk memusatkan card -->
                    <div class="card-body">

                        <h3>{{ $bahanbaku->databahanBaku->nama_bahan_baku}}</h3>

                        <hr />
                        <p>{{ 'Rp ' . number_format($bahanbaku->harga, 2, ',', '.') }}</p>
                        <hr />
                        <p>Tanggal Kadaluarsa : {{ $bahanbaku->tanggal_kadaluarsa }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
