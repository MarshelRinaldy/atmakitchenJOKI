@extends('NavbarAdmin')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Montserrat", sans-serif;
            /* background-image: url('image/imgbg.png'); */
            background-size: 1000px;
            background-repeat: no-repeat;
            background-position: right;
            background-color: #F7DED0 !important;
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

        .title2 {
            text-align: left;
            align-items: center;
            padding-left: 5%;
            width: 30%;
            position: relative;
        }

        .content-paragraph {
            text-align: center;
            max-width: 650px;
            margin: 0 auto;
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-left: 10%;
            position: relative;
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

        .dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 10px;
            border: none;
            background: none;
            cursor: pointer;
        }

        .dropdown button:hover {
            background-color: #f9f9f9;
        }

        .body-input {
            text-align: left;
            margin-left: 24.5%;
            font-weight: 500;
        }

        input {
            padding-left: 8px;
            border: 1px solid #A7A3A3;
        }

        .btn-key {
            background-color: #E2BFB3;
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

        .label input[type="date"] {
            padding: 5px;
        }
    </style>

    <body>
        <main>
            <div class="row" style="margin-top: 80px">
                <div class="col-5 title2">
                    <h1 style="font-weight: 800">Bahan Baku</h1>
                    <p style="font-size: 25px; font-weight: 200;">Hi MO, Welcome in Tambah Data Bahan Baku!</p>
                </div>
                <div class="col-7">
                    <div class="profile">
                        <img src="image/pictureProfile.png" alt="" width="80px">
                        <p style="padding-top: 10px; padding-right: 10px;">MO</p>
                        <div class="dropdown" id="dropdownMenu">
                            <button onclick="toggleDropdown()">Profile</button>
                            <button onclick="logout()">Logout</button>
                        </div>
                        <img id="arrowIcon" src="image/iconArrowBottom.png" alt="" width="20px"
                            style=" margin-left: 5px; cursor: pointer" onclick="toggleDropdown()">
                    </div>
                </div>
            </div>

            <div class="container mt-4 mb-5">
                <div class="row">
                    <div class="title mt-5 mb-5">
                        <h5 style="font-size: 40px; font-weight: 600;">Bahan Baku</h5>
                    </div>

                    <form action="{{ route('store_BahanBaku') }}" method="POST">
                        @csrf

                        <div class="body-input">
                            <div class="col-6">
                                <div class="label">
                                    <p class="mb-0">Nama Bahan Baku</p>
                                    <input name="nama_bahan_baku" type="text" class="input">
                                </div>

                                <div class="label mt-3">
                                    <p class="mb-0">Jumlah Bahan Baku</p>
                                    <input name="stok_bahan_baku" type="text" class="input">
                                </div>

                                <div class="label mt-3">
                                    <p class="mb-0">Satuan</p>
                                    <input name="satuan_bahan_baku" type="text" class="input">
                                </div>

                                <div class="label mt-3">
                                    <p class="mb-0">Harga Bahan Baku</p>
                                    <input name="harga_bahan_baku" type="text" class="input">
                                </div>
                            </div>
                        </div>

                        <div style="text-align: center;" class="mb-5 mt-5">
                            <button type="submit" class="btn btn-key">Tambah</button>
                        </div>

                    </form>
                </div>
            </div>
        </main>

        <script>
            function toggleDropdown() {
                var dropdown = document.getElementById('dropdownMenu');
                dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';

                var arrowIcon = document.getElementById('arrowIcon');
                arrowIcon.classList.toggle('rotate');
            }
        </script>
    </body>

    <footer class="text-center text-white " style="background-color: #333; margin-top: 100px">
        <div class="container-footer p-4">

            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>
            </section>
        </div>
    </footer>
@endsection
