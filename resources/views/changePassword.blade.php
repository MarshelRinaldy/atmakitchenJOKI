@extends('layout')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: "Montserrat", sans-serif;
            /* background-image: url('image/imgbg.png'); */
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
            background-color: #000000;
            color: rgb(255, 255, 255);
            width: 400px;
            border-radius: 20px;
            font-weight: 600;
        }

        .btn-key:hover {
            background-color: #eeeeee;
            color: rgb(0, 0, 0);
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
            <div class="container mt-4 mb-5">
                <div class="row">
                    <div class="title mt-5 mb-5">
                        <h5 style="font-size: 40px; font-weight: 600;">Change Password</h5>
                    </div>
                    <form action="{{ route('update_password') }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="body-input">
                            <div class="col-6">
                                <div class="label">
                                    <p class="mb-0">Old Password</p>
                                    <input name="old_password" type="password" class="input">
                                </div>
                                <div class="label mt-3">
                                    <p class="mb-0">New Password</p>
                                    <input name="new_password" type="password" class="input">
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;" class="mb-5 mt-5">
                            <button type="submit" class="btn btn-key">Change Password</button>
                        </div>
                    </form>

                    {{-- @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif --}}

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
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
@endsection
