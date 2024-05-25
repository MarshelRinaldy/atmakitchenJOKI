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
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <main>
            <div class="row" style="margin-left: 80px; margin-top: 80px">
                <div class="col-6 title">
                    <h1 style="font-weight: 800">Data Bahan Baku</h1>
                    <p style="font-size: 25px; font-weight: 200;">Hi Admin, Welcome in Data Bahan Baku!</p>
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

            <div class="row" style="margin-left: 80px; margin-top: 40px; margin-bottom: 30px">
                <div class="col-8 container-all">
                    <div class="container-total center-content">
                        <h5>Tersedia</h5>
                        <h1 style="color:#50CD4E">{{ $bahanBakus->sum('stok_bahan_baku') }}</h1>
                    </div>

                    <div class="container-total center-content">
                        <h5>Terpakai</h5>
                        <h1 style="color: #FF0000">
                            {{ $bahanBakus->sum(function ($bahanbaku) {
                                return $bahanbaku->stok_terpakai;
                            }) }}
                        </h1>
                    </div>
                </div>
                <div class="col-4" style="padding-top: 90px">
                    {{-- <button class="btn btn-success"
                        style=" margin-right: 10px; color: #000000; font-weight: 500; border-radius: 10px; padding: 5px 10px; margin-bottom: 25px;">ADD</button> --}}
                    <form action="{{ route('index_bahanBaku') }}" method="GET" style="margin-right: 10px;">
                        <div style="display: flex; margin-right: 10%;">
                            <input name="search"
                                style="border-radius: 22px; padding-left: 10px; width: 100%; margin-right: 5%"
                                type="text" placeholder="Cari Bahan Baku">
                            <button type="submit" class="btn-search">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <table>
                <tr style="background-color: #FFBE98; height: 80px;">
                    <th>ID</th>
                    <th>BAHAN BAKU</th>
                    <th>STOK</th>
                    <th>SATUAN</th>
                    <th>HARGA</th>
                    <th>EDIT / DELETE</th>
                </tr>
                @foreach ($bahanBakus as $index => $bahanbaku)
                    {{-- @if (request()->has('search') && $bahanbaku->nama_bahan_baku == request('search')) --}}
                    @if (strpos($bahanbaku->nama_bahan_baku, request('search')) !== false)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $bahanbaku->nama_bahan_baku }}</td>
                            <td>{{ $bahanbaku->stok_bahan_baku }}</td>
                            <td>{{ $bahanbaku->satuan_bahan_baku }}</td>
                            <td>{{ $bahanbaku->harga_bahan_baku }}</td>
                            <td>
                                <form action="{{ route('edit_BahanBaku', $bahanbaku->id) }}" method="GET"
                                    style="display: inline-block;">
                                    <button type="submit" class="btn btn-info"
                                        style="padding: 5px 10px; font-size: 10px;">EDIT</button>
                                </form>

                                <form action="{{ route('destroy_BahanBaku', $bahanbaku->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        style="padding: 5px 10px; font-size: 10px;">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        {{-- @elseif (!request()->has('search'))
                        <tr>
                            <td>1</td>
                            <td>{{ $bahanbaku->nama_bahan_baku }}</td>
                            <td>{{ $bahanbaku->stok_bahan_baku }}</td>
                            <td>{{ $bahanbaku->satuan_bahan_baku }}</td>
                            <td>{{ $bahanbaku->harga_bahan_baku }}</td>
                            <td>
                                <form action="{{ route('edit_BahanBaku', $bahanbaku->id) }}" method="GET"
                                    style="display: inline-block;">
                                    <button type="submit" class="btn btn-info"
                                        style="padding: 5px 10px; font-size: 10px;">EDIT</button>
                                </form>

                                <form action="{{ route('destroy_BahanBaku', $bahanbaku->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        style="padding: 5px 10px; font-size: 10px;">DELETE</button>
                                </form>
                            </td>
                        </tr> --}}
                    @endif
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
