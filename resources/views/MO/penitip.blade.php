@extends('NavbarCustomer')
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

            padding-left: 50px;
            display: inline-block;
            /* width: 100px; */
            margin-right: 10px;
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
            /* margin-left: 24.5%; */
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

        .box {
            border: 1px solid #ccc;
            padding: 10px;
            width: fit-content;
        }
    </style>

    <body>
        <main>
            <div class="container mt-4 mb-5">
                <div class="row">
                    <div class="title mt-5 mb-5">
                        <h5 style="font-size: 40px; font-weight: 600;">M Ifran</h5>
                        <h1 style="font-size: 20px; font-weight: 250;">0888-8888-8888</h1>
                        <img src="image/pictureProfile.png" alt="" width="250px">
                    </div>

                    <div class="body-input">
                        <div class="col-6">
                            {{-- <div class="label">
                                <p class="mb-0">Nama</p>
                                <input type="text" class="input">
                            </div>

                            <div class="label mt-3">
                                <p class="mb-0">Alamat</p>
                                <input type="text" class="input">
                            </div>

                            <div class="label mt-3">
                                <p class="mb-0">Number</p>
                                <input type="text" class="input" placeholder="+62">
                            </div> --}}
                            <div class="label">
                                <label for="username">Username :</label>
                                <span>Deaye</span>
                            </div>

                            <div class="label mt-3">
                                <label for="alamat">Email : *****@gmail.com</label>
                            </div>

                            <div class="label mt-3">
                                <label for="alamat">Password : P********0</label>
                            </div>

                            <div class="label mt-3">
                                <label for="alamat">Alamat : Jl Pemancar Timur, Blok B21</label>
                            </div>

                            <div class="label mt-3">
                                <label for="number">Bio</label>
                                <div class="box">
                                    <p>awd awd awd awd awd awd awd awd awd awd awd awd </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;" class="mb-5 mt-5">
                        <form method="POST" action="\save-data">
                            <button type="submit" class="btn btn-key">Save</button>
                        </form>
                    </div>

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

            function logout() {
                alert('Logout clicked');
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
