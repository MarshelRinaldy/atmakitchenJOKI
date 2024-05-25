@extends('layout')
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
                <div class="row">
                    <div class="title mt-5 mb-5">
                        <h5 style="font-size: 40px; font-weight: 600;">Your Profile</h5>
                        <p class="content-paragraph" style="font-weight: 200;">"Begin your journey as a cherished member of
                            the
                            Atma Kitchen Cake family
                            by
                            signing up now. Gain
                            access to exclusive perks, special offers, and mouthwatering delights. Join us today and let the
                            sweetness begin!"</p>
                    </div>
                    <form action="{{ route('register') }}" method="post">
                        @method('post')
                        @csrf
                        <div class="col-6">
                            <div class="label">
                                <p class="mb-0">Nama</p>
                                <input type="text" name="name" id="name" class="input">
                            </div>

                            <div class="label mt-3">
                                <p class="mb-0">Email</p>
                                <input type="email" name="email" id="email" class="input">
                            </div>

                            <div class="label mt-3">
                                <p class="mb-0">Password</p>
                                <input type="password" name="password" id="password" class="input">
                            </div>

                            <div class="label mt-3">
                                <p class="mb-0">Username</p>
                                <input type="text" name="username" id="username" class="input">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="label ">
                                <p class="mb-0">Address</p>
                                <input type="text" name="address" id="address" class="input">
                            </div>
                            <div class="label mt-3">
                                <p class="mb-0">Date of Birth</p>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="input">
                            </div>
                            <div class="label mt-3">
                                <p class="mb-0">Phone Number</p>
                                <input type="text" name="phone_number" id="phone_number" class="input">
                            </div>
                            <div class="label mt-3">
                                <p class="mb-0">Gender</p>
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input" type="radio" name="gender" id="gender"
                                        value="male">
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender"
                                        value="female">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;" class="mb-5 mt-5">
                            <button type="submit" class="btn btn-key">Sign Up</button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </body>
@endsection
