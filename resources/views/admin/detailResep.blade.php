@extends('NavbarAdmin')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Montserrat", sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #eeeeee !important;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .image {
            margin-top: 50px;
            text-align: center;
        }

        .image img {
            width: 100%;
            max-width: 500px;
            display: block;
            margin: 0 auto 20px;
            /* Membuat gambar menjadi block dan memberikan margin bawah */
        }

        .content {
            margin-top: 30px;
            text-align: left;
            /* Mengatur konten menjadi rata kiri */
        }

        .content h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .ingredients {
            text-align: left;
            margin-bottom: 40px;
        }

        .ingredients h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .ingredients ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .ingredients li {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .btn-container {
            text-align: center;
        }

        .btn-container .btn {
            margin-right: 10px;
            display: inline-block;
            /* Menjadikan tombol berada dalam satu baris */
        }

        @media only screen and (max-width: 768px) {
            .image img {
                max-width: 100%;
            }
        }
    </style>

    <body>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="image" style="text-align: center;">
                <img src="../image/atmakitchen.png" alt="Atma Kitchen" style="max-width: 500px;">
            </div>

            <div class="image" style="text-align: center;">
                @foreach ($reseps as $resep)
                    @if ($resep->produk_id == $produk)
                        <img src="{{ asset('./storage/dukpro/' . $resep->product->image) }}" alt="" width="250px">
                    @break
                @endif
            @endforeach
        </div>

        <div class="content">
            @foreach ($reseps as $resep)
                @if ($resep->produk_id == $produk)
                    <h1>{{ $resep->product->nama }}</h1>
                    <p>{{ $resep->product->deskripsi }}</p>
                @break
            @endif
        @endforeach
    </div>

    <div class="ingredients">
        <h1>Ingredients</h1>
        <ul>
            @foreach ($reseps as $resep)
                @if ($resep->produk_id == $produk)
                    <li>{{ $bahanbakus->where('id', $resep->bahan_baku_id)->first()->nama_bahan_baku }} sebanyak
                        {{ $resep->jumlah }} {{ $resep->bahanBaku->satuan_bahan_baku }}</li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="btn-container" style="text-align: center; margin-bottom: 60px;">
        <a href="{{ route('updateResep', $produk) }}" class="btn btn-primary" style="display: inline-block;">Update
            Resep</a>
        <form action="{{ route('delete_resep', $produk) }}" method="post" style="display: inline-block;">
            @method('post')
            @csrf
            <button type="submit" class="btn btn-danger">Delete Resep</button>
        </form>
    </div>

</div>

</body>
@endsection
