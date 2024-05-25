@extends('NavbarAdmin')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Montserrat", sans-serif;
            background-image: url('image/imgbg.png');
            background-size: 1000px;
            background-repeat: no-repeat;
            background-position: right;
            background-color: #eeeeee !important;
        }

        .image {
            margin-left: 70px;
        }

        .input {
            width: 500px;
            height: 40px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .title-content {
            margin-left: 10%;
            margin-right: 10%
        }

        .flip-card {
            background-color: transparent;
            width: 300px;
            height: 200px;

            perspective: 1000px;

        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;

            backface-visibility: hidden;
            border-radius: 12px;
        }

        .flip-card-front {
            background-color: #bbb;
            color: black;
        }

        .flip-card-back {
            background-color: rgb(255, 255, 255);
            color: white;
            transform: rotateY(180deg);
            height: 250px;
            margin-bottom: 100px;
        }

        .card-title {
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        .flip-card:hover .card-title {
            opacity: 0;
        }

        .card-detail {
            background-color: rgb(255, 255, 255);
            border-radius: 12px;
        }

        .btn-key {
            background-color: #E2BFB3;
            color: black;
            width: 200px;
            border-radius: 20px;
            font-weight: 600;
        }

        .btn-key:hover {
            background-color: #020202;
            color: rgb(255, 255, 255);

        }

        @media only screen and (max-width: 768px) {
            body {
                background-size: cover;
            }

            .image {
                margin-left: 10px;
            }

            .input {
                width: 80%;
                margin: 0 auto;
            }

            .title-content {
                margin-left: 5%;
                margin-right: 5%;
            }

            .flip-card {
                width: 80%;

                margin: 0 auto;
            }

            .flip-card-inner {
                width: 100%;
                height: 200px;

            }

            .flip-card-front,
            .flip-card-back {
                width: 100%;
                height: 200px;

            }

            .flip-card-front img {
                width: 100%;
                height: 100%;
                object-fit: cover;

            }

            .flip-card-back {
                height: auto;

            }

            .card-title {
                margin-top: 10px;

            }

            .card-detail p {
                font-size: 10px;

            }

            .btn-key {
                width: 150px;

            }
        }
    </style>

    <body>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <main>
            <div class="image mt-4">
                <img src="image/atmakitchen.png" alt="" width="500">
            </div>

            <div class="text-center mt-5">
                <h2>Mau masak apa hari ini?</h2>
                <p>Tingkatkan kreativitasmu di dapur! </p>
                <form action="{{ route('search_resep') }}" method="GET">
                    <input class="input" type="text" name="search" placeholder="Search">
                </form>
            </div>

            <div class="title-content" style="margin-left: 20%; margin-right: 20%">
                <div class="row">
                    <div class="col-6">
                        <h2>Resep</h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('create_resep') }}">
                            <img src="icon/iconTambahResep.png" alt="" width="50px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="row" style="margin-left: 16%; margin-right: 16%;">
                    @php
                        $uniqueProducts = [];
                    @endphp
                    @foreach ($reseps as $index => $resep)
                        @if (!in_array($resep->product->nama, $uniqueProducts))
                            @php
                                $uniqueProducts[] = $resep->product->nama;
                            @endphp
                            <div class="col-4 d-flex justify-content-center align-items-center pl-0 pr-0">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <div class="card-detail pb-4">
                                                <img src="{{ asset('./storage/dukpro/' . $resep->product->image) }}"
                                                    alt="Product Image"
                                                    style="width:300px;height:200px; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                                <h5 class="card-title mt-4">{{ $resep->product->nama }}</h5>
                                            </div>
                                        </div>
                                        <div class="flip-card-back">
                                            <h5 style="color: black; margin-top: 10px">{{ $resep->product->nama }}</h5>
                                            <p style="font-size: 12px; color: black; padding: 5px">
                                                {{ $resep->product->deskripsi }}</p>

                                            <a href="{{ route('detailResep', $resep->produk_id) }}" class="btn btn-key">Make
                                                This One</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>


            <footer style="margin-top: 200px;">
            </footer>

        </main>
    </body>
@endsection
