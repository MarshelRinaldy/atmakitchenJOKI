@extends('NavbarOwner')
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
            background-color: #858484;
            border-radius: 10px;
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

        .icon-table {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            margin-top: 10px;
        }
    </style>

    <body>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <main>
            <div class="row" style="margin-left: 80px; margin-top: 80px">
                <div class="col-6 title">
                    <h1 style="font-weight: 800">Gaji dan Bonus</h1>
                    <p style="font-size: 25px; font-weight: 200;">Hi Owner, Welcome in Dashboard!</p>
                </div>

                <div class="col-6">
                    <div class="profile">
                        <img src="image/pictureProfile.png" alt="" width="80px">
                        <p style="padding-top: 10px">MO</p>
                        <div class="dropdown" id="dropdownMenu" style="border-radius: 10px;;">
                            <button onclick="toggleDropdown()">Profile</button>
                            <button onclick="logout()">Logout</button>
                        </div>
                        <img id="arrowIcon" src="image/iconArrowBottom.png" alt="" width="20px"
                            style=" margin-left: 5px; cursor: pointer" onclick="toggleDropdown()">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-left: 80px; margin-top: 40px;">
                <div class="col-6">

                </div>

                <div class="col-6">
                    <div style="justify-content: flex-end; display: flex; margin-right: 10%;">
                        <a href="" style="margin-right: 10px; color: #000000; font-weight: 500;">Search</a>
                        <form action="{{ route('dataKaryawan') }}" method="GET">
                            <input style="border-radius: 22px; padding-left: 10px;" type="search" name="search">
                        </form>
                    </div>
                </div>
            </div>

            <table>
                <tr style="background-color: #E2BFB3; height: 80px;">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>JABATAN</th>
                    <th>GAJI</th>
                    <th>BONUS</th>
                    <th>ACTION</th>
                </tr>

                @foreach ($users as $karyawan)
                    <tr>
                        <td>1</td>

                        <td>{{ $karyawan->name }}</td>
                        <td>
                            @if ($karyawan->pegawai)
                                {{ $karyawan->pegawai->nip }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $karyawan->role }}</td>
                        <td>
                            @if ($karyawan->pegawai)
                                {{ $karyawan->pegawai->gaji }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($karyawan->pegawai && $karyawan->pegawai->bonus)
                                {{ $karyawan->pegawai->bonus }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('edit_gajiPegawai', ['pegawai' => $karyawan->id]) }}" method="get">
                                <button type="submit" class="btn-search">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
