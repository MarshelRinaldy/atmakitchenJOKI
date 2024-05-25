<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Hampers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('hampers.update', $hampers->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Hampers</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ $hampers->nama }}" placeholder="Masukkan Nama Hampers">

                                <!-- error message untuk hampers-->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Isi Hampers</label>
                            </div>
                            <div class="form-group mb-3" id="ingredient-container">
                                <!-- Di sini akan ditambahkan elemen form dinamis -->
                            </div>
                            <div class="form-group mb-3">
                                <button type="button" class="btn btn-outline-secondary add-ingredient">
                                    <i class="fas fa-plus"></i>Tambah Produk
                                </button>
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi Hampers</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Deskripsi Hampers">{{ old('deskripsi') }}</textarea>

                                <!-- error message untuk description -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi Hampers</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5"
                                    placeholder="Masukkan Deskripsi Hampers">{{ $hampers->deskripsi }}</textarea>

                                <!-- error message untuk description -->
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
                                            name="harga" value="{{ $hampers->harga }}"
                                            placeholder="Masukkan Harga Hampers">

                                        <!-- error message untuk price -->
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
                                            name="stok" value="{{ $hampers->stok }}"
                                            placeholder="Masukkan Stok Hampers">

                                        <!-- error message untuk stock -->
                                        @error('stok')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Ukuran Hampers</label>
                                        <input type="text" class="form-control @error('ukuran') is-invalid @enderror"
                                            name="ukuran" value="{{ $hampers->ukuran }}"
                                            placeholder="Masukkan Ukuran Hampers">

                                        <!-- error message untuk price -->
                                        @error('ukuran')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Berat</label>
                                        <input type="text" class="form-control @error('berat') is-invalid @enderror"
                                            name="berat" value="{{ $hampers->berat }}"
                                            placeholder="Masukkan Berat Hampers">

                                        <!-- error message untuk stock -->
                                        @error('berat')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Gambar Hampers</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" value="{{ $hampers->image }}">

                                <!-- error message untuk image -->
                                @error('image')
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.querySelector('.add-ingredient');
        const container = document.querySelector('#ingredient-container');
        let ingredientCount = 0;

        addButton.addEventListener('click', function() {
            ingredientCount++;
            addNewInput();
        });

        function addNewInput() {
            const newInput = document.createElement('div');
            newInput.innerHTML = `
                <div class="input-group mb-2">
                <select id="produk_id"
                    class="form-select" name="produk_id">
                    <option value="">Isi Hampers ${ingredientCount}</option>
                    @foreach ($produk as $p )
                    <option value="{{$p->id}}">{{$p->nama}}</option>
                    @endforeach
                </select>
                    <button type="button" class="btn btn-outline-danger delete-ingredient">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>`;
            container.appendChild(newInput);
        }

        container.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-ingredient')) {
                ingredientCount--;
                event.target.closest('.input-group').remove();
                updatePlaceholder();
            }
        });

        function updatePlaceholder() {
            const inputs = container.querySelectorAll('input[type="text"]');
            inputs.forEach((input, index) => {
                input.placeholder = `Isi Hampers ${index + 1}`;
            });
        }
    });
    </script>
</body>

</html>
