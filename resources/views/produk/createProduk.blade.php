<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel Crud</h3>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('produk.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Create Produk</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('produk.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label h4">Nama Produk</label>
                            <input value="{{ old('nama_produk') }}" type="text" class=" @error('nama_produk') is-invalid @enderror form-control form-control-lg" placeholder="Nama Produk" name="nama_produk">
                            @error('nama_produk')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Harga Produk</label>
                            <input value="{{ old('harga_produk') }}" type="text" class=" @error('harga_produk') is-invalid @enderror form-control form-control-lg" placeholder="Harga Produk" name="harga_produk">
                            @error('harga_produk')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Stok Produk</label>
                            <input value="{{ old('stok_produk') }}" type="text" class=" @error('stok_produk') is-invalid @enderror form-control form-control-lg" placeholder="Stok Produk" name="stok_produk">
                            @error('stok_produk')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Keterangan Produk</label>
                            <select id="keterangan_produk" class="form-select form-select-lg @error('keterangan_produk') is-invalid @enderror" name="keterangan_produk">
                                <option value="">Pilih Keterangan</option>
                                <option value="Titipan" {{ old('keterangan_produk') == 'Titipan' ? 'selected' : '' }}>Titipan</option>
                                <option value="Produk Sendiri" {{ old('keterangan_produk') == 'Produk Sendiri' ? 'selected' : '' }}>Produk Sendiri</option>
                            </select>
                            @error('keterangan_produk')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Status Produk</label>
                            <select class="form-select form-select-lg @error('status_produk') is-invalid @enderror" name="status_produk" id="status_produk">
                                <option value="">Pilih Status</option>
                                <option value="Available" {{ old('status_produk') == 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="Preorder" {{ old('status_produk') == 'Preorder' ? 'selected' : '' }}>Preorder</option>
                            </select>
                            @error('status_produk')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Tanggal Kadaluarsa</label>
                            <input type="date" class="form-control form-control-lg" placeholder="Tanggal" name="tanggal_kadaluarsa">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Deskripsi Produk</label>
                            <textarea class=" @error('deskripsi_produk') is-invalid @enderror form-control form-control-lg" name="deskripsi_produk" cols="30" rows="5" placeholder="Deskripsi Produk">{{ old('deskripsi_produk') }}</textarea>
                            @error('deskripsi_produk')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Foto Produk</label>
                            <input type="file" class="form-control form-control-lg" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label h4">Kategori Produk</label>
                            <input value="{{ old('kategori_produk') }}" type="text" class=" @error('kategori_produk') is-invalid @enderror form-control form-control-lg" name="kategori_produk" placeholder="Kategori Produk">
                            @error('kategori_produk')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('keterangan_produk').addEventListener('change', function () {
        var statusField = document.getElementById('status_produk');
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