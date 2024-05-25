<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
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
                        <form action="{{ route('dukpro.update', $dukpro->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $dukpro->nama }}" placeholder="Masukkan Nama product">

                                <!-- error message untuk hampers-->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Keterangan Produk</label>
                                <select id="keterangan" class="form-select form-select-lg" name="keterangan">
                                    <option value="">Pilih Keterangan</option>
                                    <option value="Titipan">Titipan</option>
                                    <option value="Produk Sendiri">Produk Sendiri</option>
                                </select>
                                <!-- error message untuk keterangan_produk -->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Status Produk</label>
                                <select class="form-select form-select-lg" name="status" id="status">
                                    <option value="">Pilih Status</option>
                                    <option value="Available">Available</option>
                                    <option value="Preorder">Preorder</option>
                                </select>
                                <!-- error message untuk status_produk -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Kadaluarsa</label>
                                <input type="date"
                                    class="form-control @error('tanggal_kadaluarsa') is-invalid @enderror"
                                    name="tanggal_kadaluarsa" value="{{ $dukpro->tanggal_kadaluarsa }}"
                                    placeholder="Masukkan Tanggal Kadaluarsa">

                                <!-- error message untuk hampers-->
                                @error('tanggal_kadaluarsa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kategori Produk</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    name="kategori" value="{{ $dukpro->kategori }}"
                                    placeholder="Masukkan Kategori product">

                                <!-- error message untuk hampers-->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Foto Produk</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" value="{{ $dukpro->image }}">

                                <!-- error message untuk hampers-->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi Produk</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Deskripsi">{{ $dukpro->deskripsi }}</textarea>

                                <!-- error message untuk hampers-->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                            name="harga" value="{{ $dukpro->harga }}"
                                            placeholder="Masukkan harga product">

                                        <!-- error message untuk hampers-->
                                        @error('harga')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Stok</label>
                                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                            name="stok" value="{{ $dukpro->stok }}"
                                            placeholder="Masukkan stok product">

                                        <!-- error message untuk hampers-->
                                        @error('stok')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
    <script>
        document.getElementById('keterangan').addEventListener('change', function() {
            var statusField = document.getElementById('status');
            if (this.value === 'Titipan') {
                statusField.value = 'Available';
                statusField.setAttribute('disabled', 'disabled');
            } else {
                statusField.removeAttribute('disabled');
            }
        });
    </script>

</body>

</html>
