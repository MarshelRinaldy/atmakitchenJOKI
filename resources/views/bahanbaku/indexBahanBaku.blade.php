@extends('NavbarMO')
@section('content')

    <body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Data Bahan Baku</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ route('bahanbaku.create') }}" class="btn btn-md btn-success">Tambah Bahan
                                    Baku</a>
                                <form action="{{ route('bahanbaku.search') }}" method="GET" class="d-flex">
                                    <input type="text" name="search" class="form-control me-2" placeholder="Search...">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Jumlah Pembelian</th>
                                        <th scope="col">Tanggal Pembelian</th>
                                        <th scope="col">Tanggal Kadaluarsa</th>
                                        <!-- <th scope="col">Total Stok</th> -->
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bahanbaku as $bb)
                                        <tr>
                                            <td>{{ $bb->databahanBaku->nama_bahan_baku }}</td>
                                            <td>{{ $bb->databahanBaku->satuan_bahan_baku }}</td>
                                            <td>{{ 'Rp ' . number_format($bb->harga, 2, ',', '.') }}</td>
                                            <td>{{ $bb->jumlah }}</td>
                                            <td>{{ $bb->tanggal_pembelian }}</td>
                                            <td>{{ $bb->tanggal_kadaluarsa }}</td>
                                            <!-- <td>{{ $bb->stok }}</td> -->
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('bahanbaku.destroy', $bb->id) }}" method="POST">
                                                    <a href="{{ route('bahanbaku.show', $bb->id) }}"
                                                        class="btn btn-sm btn-dark">SHOW</a>
                                                    <a href="{{ route('bahanbaku.edit', $bb->id) }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Bahan Baku belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $bahanbaku->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            //message with sweetalert
            @if (session('success'))
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>

    </body>

    </html>
@endsection
