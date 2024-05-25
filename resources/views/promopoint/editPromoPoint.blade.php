<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Promo Point</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('promopoint.update', $promopoint->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Promo Point</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $promopoint->nama }}" placeholder="Masukkan Nama Promo Point">

                                <!-- error message untuk hampers-->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jumlah Point</label>
                                <input type="number" class="form-control @error('jumlah_point') is-invalid @enderror"
                                    name="jumlah_point" value="{{ $promopoint->jumlah_point }}" placeholder="Masukkan jumlah point Promo Point">

                                <!-- error message untuk hampers-->
                                @error('jumlah_point')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Dimulai</label>
                                <input type="date"
                                    class="form-control @error('tanggal_dimulai') is-invalid @enderror"
                                    name="tanggal_dimulai" value="{{ $promopoint->tanggal_dimulai }}"
                                    placeholder="Masukkan Tanggal Dimulainya Promo">

                                <!-- error message untuk hampers-->
                                @error('tanggal_dimulai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Berakhir</label>
                                <input type="date"
                                    class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                                    name="tanggal_berakhir" value="{{ $promopoint->tanggal_berakhir }}"
                                    placeholder="Masukkan Tanggal berakhirnya Promo">

                                <!-- error message untuk hampers-->
                                @error('tanggal_berakhir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi Point</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Deskripsi">{{ $promopoint->deskripsi }}</textarea>

                                <!-- error message untuk hampers-->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

</body>

</html>
