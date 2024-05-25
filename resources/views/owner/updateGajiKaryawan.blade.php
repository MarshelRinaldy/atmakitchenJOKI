@extends('NavbarMO')
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
            align-items: center;
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
            margin-left: 18%;
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
    </style>

    <body>
        <main>
            <div class="image mt-4">
                <img src="image/atmakitchen.png" alt="" width="500">
            </div>

            <div class="container mt-4 mb-5">
                <form action="{{ route('update_gajiPegawai', $user->pegawai->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <div class="row">
                        <div class="title mt-5 mb-5">
                            <h5 style="font-size: 40px; font-weight: 600;">Update Karyawan</h5>
                        </div>
                        <div class="col-6">
                            <div class="label">
                                <p class="mb-0">Nama</p>
                                <input type="text" class="input" name="name" id="name"
                                    value="{{ $user->name }}">
                            </div>

                            <div class="label mt-3">
                                <p class="mb-0">Bonus</p>
                                <input type="text" class="input" name="bonus" id="bonus"
                                    value="{{ $user->pegawai->bonus }}">
                            </div>
                        </div>

                        <div class="col-6 text-center">
                            <div class="label">
                                <p class="mb-0 ">Gaji</p>
                                <input type="text" class="input" name="gaji" id="gaji"
                                    value="{{ $user->pegawai->gaji }}">
                            </div>

                        </div>
                        <div style="text-align: center;" class="mb-5 mt-5">
                            <button type="submit" class="btn btn-key">Update Pegawai</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </body>
@endsection
