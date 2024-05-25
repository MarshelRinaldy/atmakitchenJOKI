@extends('NavbarAdmin')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Montserrat", sans-serif;
            background-image: url('image/back.png');
            background-size: 1000px;
            background-repeat: no-repeat;
            background-position: right;
            background-color: #eeeeee !important;
        }

        .container {
            background-color: white;
            border-radius: 10px;
        }

        .image {
            margin-left: 70px;
        }

        .title {
            text-align: center;

        }

        .content-paragraph {
            text-align: center;
            max-width: 650px;
            margin: 0 auto;
        }

        .input {
            width: 420px;
            height: 40px;
            border-radius: 10px;
        }

        .label {
            text-align: left;

            font-weight: 500;
        }

        .form-check-input[type="radio"] {
            width: 1em;
            height: 1em;
            background-color: rgb(255, 255, 255);
            border-radius: 50%;
            border: 2px solid black;
            cursor: pointer;
        }

        .form-check-input[type="radio"]:checked {
            background-color: black;
            border-color: black;
        }

        input {
            padding-left: 8px;
            border: 1px solid #A7A3A3;
        }

        .btn-key {
            background-color: #FF9D2E;
            color: black;
            width: 400px;
            border-radius: 20px;
            font-weight: 600;
        }

        .btn-key:hover {
            background-color: #020202;
            color: rgb(255, 255, 255);
            width: 400px;
            border-radius: 20px;
            font-weight: 600;
        }

        input[type="file"]::file-selector-button {
            border-radius: 4px;
            padding: 0 16px;
            height: 40px;
            cursor: pointer;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.16);
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.05);
            margin-right: 16px;
            transition: background-color 200ms;
        }
    </style>


    <body>
        <main>
            <!-- Gambar dan container Anda -->
            <div class="container mt-4 mb-3">
                <div class="row">
                    <div class="title mt-5 mb-3">
                        <h5 style="font-size: 40px; font-weight: 600;">Update Resep</h5>
                        <p style="font-size: 20px; font-weight: 300">Tingkatkan kreativitasmu di dapur! </p>
                    </div>
                    <div class="col-12">
                        <form id="resepForm" method="POST" action="{{ route('update_resep', $produk) }}">
                            @method('post')
                            @csrf
                            <div class="label">
                                <p class="mb-2">Product</p>

                                <select class="form-select input" name="product_id">
                                    <option value="{{ $produk }}">
                                        @foreach ($reseps as $resep)
                                            @if ($resep->produk_id == $produk)
                                                {{ $resep->product->nama }}
                                            @break
                                        @endif
                                    @endforeach
                                </option>
                            </select>

                            <p class="mb-2 mt-3">Bahan Baku</p>
                            <div class="ingredient-input">
                                @foreach ($reseps as $resep)
                                    @if ($resep->produk_id == $produk)
                                        <div class="input-group mb-3">
                                            <select class="form-select input" name="bahan_baku_id[]">
                                                @foreach ($bahanbakus as $bahanbaku)
                                                    @if ($bahanbaku->id == $resep->bahan_baku_id)
                                                        <option value="{{ $bahanbaku->id }}" selected>
                                                            {{ $bahanbaku->nama_bahan_baku }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $bahanbaku->id }}">
                                                            {{ $bahanbaku->nama_bahan_baku }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="number" class="form-control" name="jumlah[]"
                                                value="{{ $resep->jumlah }}">
                                            <button class="btn btn-outline-secondary remove-ingredient" type="button">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- tambah lebih banyak -->
                            </div>

                            <button type="button" class="btn btn-outline-secondary add-ingredient">
                                <i class="fas fa-plus"></i> Tambah Bahan Baku
                            </button>
                        </div>
                        <div style="text-align: center;" class="mb-5 mt-5">
                            <button type="submit" onclick="submitForm()" class="btn btn-key">Update Resep</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addIngredientBtn = document.querySelector('.add-ingredient');
            const ingredientInput = document.querySelector('.ingredient-input');

            addIngredientBtn.addEventListener('click', function() {
                const newIngredientInput = document.createElement('div');
                newIngredientInput.classList.add('input-group', 'mb-3');
                newIngredientInput.innerHTML = `
                    <select class="form-select input" name="bahan_baku_id[]">
                        <option selected disabled>Pilih Bahan Baku</option>
                        @foreach ($bahanbakus as $bahanbaku)
                            <option value="{{ $bahanbaku->id }}">{{ $bahanbaku->nama_bahan_baku }}</option>
                        @endforeach
                    </select>
                    <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah">
                    <button class="btn btn-outline-secondary remove-ingredient" type="button">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                `;
                ingredientInput.appendChild(newIngredientInput);
            });

            // Fungsi untuk menghapus inputan bahan baku
            ingredientInput.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-ingredient')) {
                    event.target.closest('.input-group').remove();
                }
            });
        });

        function submitForm() {
            var form = document.getElementById('resepForm');
            form.submit();
        }
    </script>

</body>
@endsection
