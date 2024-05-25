<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dukpro.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Produk">

                                <!-- error message untuk hampers-->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Keterangan Produk</label>
                                <select id="keterangan"
                                    class="form-select @error('keterangan') is-invalid @enderror"
                                    name="keterangan">
                                    <option value="">Pilih Keterangan</option>
                                    <option value="Titipan" {{ old('keterangan') == 'Titipan' ? 'selected' : '' }}>
                                        Titipan</option>
                                    <option value="Produk Sendiri"
                                        {{ old('keterangan') == 'Produk Sendiri' ? 'selected' : '' }}>Produk Sendiri
                                    </option>
                                </select>

                                <!-- error message untuk hampers-->
                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Status Produk</label>
                                <select class="form-select @error('status') is-invalid @enderror"
                                    name="status" id="status">
                                    <option value="">Pilih Status</option>
                                    <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="Preorder" {{ old('status') == 'Preorder' ? 'selected' : '' }}>
                                        Preorder</option>
                                </select>

                                <!-- error message untuk hampers-->
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
                                    name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa') }}"
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
                                <select class="form-select form-select-lg" name="kategori" id="kategori">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Cake">Cake</option>
                                    <option value="Cemilan">Cemilan</option>
                                </select>

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
                                    name="image">

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
                                    placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>

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
                                            name="harga" value="{{ old('harga') }}"
                                            placeholder="Masukkan harga produk">

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
                                            name="stok" value="{{ old('stok') }}"
                                            placeholder="Masukkan stok produk">

                                        <!-- error message untuk hampers-->
                                        @error('stok')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
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
