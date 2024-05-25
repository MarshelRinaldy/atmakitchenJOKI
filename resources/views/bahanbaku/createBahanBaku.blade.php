<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('bahanbaku.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Bahan Baku</label>
                                <!-- <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Hampers"> -->
                                <select id="bahan_baku_id"

                                    class="form-select form-select-lg @error('bahan_baku_id') is-invalid @enderror"
                                    name="bahan_baku_id">
                                    <option value="">Pilih Bahan Baku</option>
                                    @foreach ($bb as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama_bahan_baku }}</option>

                                    @endforeach
                                </select>
                                <!-- error message untuk hampers-->
                                @error('bahan_baku_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Satuan Bahan Baku</label>
                                <!-- <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Hampers"> -->
                                <select id="satuan"

                                    class="form-select form-select-lg @error('satuan') is-invalid @enderror"
                                    name="satuan">
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($bb as $b)
                                        <option value="{{ $b->id }}">{{ $b->satuan_bahan_baku }}</option>

                                    @endforeach
                                </select>
                                <!-- error message untuk hampers-->
                                @error('bahan_baku_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jumlah Pembelian</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                    name="jumlah" value="{{ old('jumlah') }}" placeholder="Masukkan jumlah Pembelian">

                                <!-- error message untuk hampers-->
                                @error('jumlah')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga">

                                <!-- error message untuk hampers-->
                                @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Tanggal Pembelian</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_pembelian') is-invalid @enderror"
                                            name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}"
                                            placeholder="Masukkan tanggal pembelian">

                                        <!-- error message untuk price -->
                                        @error('tanggal_pembelian')
                                            <div class="alert alert-danger mt-2">
                                                {{ 'Tanggal Pembelian Tidak Boleh Lebih Dari Tanggal Kadaluarsa' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Tanggal Kadaluarsa</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                            name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}"
                                            placeholder="Masukkan tanggal kadaluarsa">

                                        <!-- error message untuk stock -->
                                        @error('tanggal_kadaluarsa')
                                            <div class="alert alert-danger mt-2">
                                                {{ 'Tanggal Kadaluarsa Tidak Boleh Kurang Dari Tanggal Pembelian' }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <!-- <script>
        CKEDITOR.replace('deskripsi');
    </script> -->
</body>

</html>
