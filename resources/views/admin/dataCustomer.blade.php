@extends('NavbarAdmin')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #EEEEEE;
        }

        table {
            width: 90%;
            margin: 11px auto;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        tr:nth-child(even) {
            background-color: #FEECE2;
        }

        tr:nth-child(odd) {
            background-color: #F7DED0;
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-right: 10%;
            position: relative;
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

        .btn-search {
            background-color: #FFBE98;
            padding: 5px 15px;
            border-radius: 10px;
        }

        .btn-search:hover {
            background-color: #000000;
            padding: 5px 15px;
            border-radius: 10px;
            color: white;
        }

        .container-total {
            height: 80px;
            width: 100%;
            background-color: white;
            border-radius: 10px;
            padding: 10px 10px;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);

        }

        .container-total h1 {
            font-weight: 600;
            font-size: 50px
        }

        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            margin-right: 20px;
        }

        .container-all {
            display: flex;
        }

        .icon-table {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            margin-top: 10px;
        }
    </style>

    <body>
        <main>
            <div class="row" style="margin-left: 80px; margin-top: 80px">
                <div class="col-6 title">
                    <h1 style="font-weight: 800">Data Customer</h1>
                    <p style="font-size: 25px; font-weight: 200;">Hi Admin, Welcome in Data Customer!</p>
                </div>
                <div class="col-6">
                    <div class="profile">
                        <img src="image/pictureProfile.png" alt="" width="80px">
                        <p style="padding-top: 10px">Admin</p>
                        <div class="dropdown" id="dropdownMenu">
                            <button onclick="toggleDropdown()">Profile</button>
                            <button onclick="logout()">Logout</button>
                        </div>
                        <img id="arrowIcon" src="image/iconArrowBottom.png" alt="" width="20px"
                            style=" margin-left: 5px; cursor: pointer" onclick="toggleDropdown()">
                    </div>
                </div>
            </div>

            <td class="text-center">
                <div style="display: flex; justify-content: left; margin-left: 52.5px; padding-top:50px">
                    <a href=""
                        style="margin-right: 10px; color: #000000; font-weight: 500; background-color:#28B463 ; border-radius: 10px; padding: 5px 10px;">Added</a>
                    <a href=""
                        style="btn btn-info btn-sm; margin-right: 10px; color: #000000; font-weight: 500; background-color:#F7DC6F ; border-radius: 10px; padding: 5px 10px">Update</a>
                    <a href=""
                        style="btn btn-info btn-sm; margin-right: 10px; color: #000000; font-weight: 500; background-color:#E74C3C ; border-radius: 10px; padding: 5px 10px">Delete</a>
                </div>
            </td>

            <div class="row" style="margin-left: 40px; margin-top: 40px; margin-bottom: 30px">
                {{-- <div class="col-8 container-all">
                    <div class="container-total center-content">
                        <h5>Bahan Baku Masuk</h5>
                        <h1 style="color:#50CD4E">254</h1>
                    </div>

                    <div class="container-total center-content">
                        <h5>Total Confirm</h5>
                        <h1 style="color: #1137FF">54</h1>
                    </div>

                    <div class="container-total center-content">
                        <h5>Bahan Baku Terpakai</h5>
                        <h1 style="color: #FF0000">54</h1>
                    </div>
                </div> --}}
                <div class="col-4" style="">
                    <div style=" display: flex;">
                        <a href=""
                            style=" margin-right: 10px; color: #000000; font-weight: 500; background-color:#999999; border-radius: 10px; padding: 5px 10px;">Search</a>
                        <input style="border-radius: 22px; padding-left: 10px; width: 100%; margin-right: 10%"
                            type="text">
                    </div>
                </div>
            </div>

            <table>
                <tr style="background-color: #FFBE98; height: 80px;">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                </tr>

                @for ($i = 0; $i < 20; $i++)
                    <tr>
                        <td>1</td>
                        <td>Sunjaya</td>
                        <td>Sunajay Gege</td>
                        <td>Sunjaya@gmail.com</td>
                        <td>088812341234</td>
                        <td>12-12-2024</td>
                        <td>L</td>
                    </tr>
                @endfor
            </table>

            <div class="icon-table">
                <a href="" style="margin-right: 80%"><img src="image/icon_left_double.png" width="23px"
                        alt=""></a>
                <a href=""><img src="image/icon_right_double.png" width="23px" alt=""></a>
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
@endsection
