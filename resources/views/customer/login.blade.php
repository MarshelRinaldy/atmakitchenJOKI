<!-- <!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    </style>
<body>
<div class="card">
        <div class="card-header">Login Form</div>
        <div class="card-body">
        
            <form action= "{{ route('check') }}" method="post">
             {!! csrf_field() !!}

            <label>Email</label>
            <input type="email" name="email" id="email" class ="form-control"> </br>


            <label>Password</label>
            <input type="password" name="password" id="password" class ="form-control"> </br>

 
            <input type="submit" value="Login" class="btn btn-success">


            </form>
        </div>
    </div>

</body>
</html> -->

@extends('layoutLogin')
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
            align-items: center;
            justify-content: center;
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

        .center-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* Menjadikan form berada di tengah layar vertikal */
        }

        .login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>

    <body>
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="center-form">
            <main>
                <div class="image mt-4">
                    <img src="image/atmakitchen.png" alt="" width="500">
                </div>

                <div class="container mt-4 mb-5">
                    <div class="row justify-content-center">
                        <div class="title mt-5 mb-5">
                            <h5 style="font-size: 40px; font-weight: 600;">Login</h5>
                        </div>
                        <form action="{{ route('check') }}" method="post" class="login-form">
                            {!! csrf_field() !!}
                            <div class="col-6">
                                <div class="label">
                                    <p class="mb-0">Email</p>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="label mt-3">
                                    <p class="mb-0">Password</p>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>

                            <div style="text-align: center" class="mb-5 mt-5">
                                <button class="btn btn-key">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>

    </body>

    <!-- <footer class="text-center text-white " style="background-color: #333; margin-top: 100px">
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
                        </footer> -->
@endsection
