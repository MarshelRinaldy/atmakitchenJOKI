@extends('NavbarAdmin')
@section('content')

    <body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Data Produk</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ route('dukpro.create') }}" class="btn btn-md btn-success">ADD PRODUK</a>
                                <form action="{{ route('dukpro.search') }}" method="GET" class="d-flex">
                                    <input type="text" name="search" class="form-control me-2" placeholder="Search...">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Keterangan Produk</th>
                                        <th scope="col">Tanggal Kadaluarsa</th>
                                        <th scope="col">Kategori Produk</th>
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dukpro as $p)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset('./storage/dukpro/' . $p->image) }}" class="rounded"
                                                    style="width: 150px">
                                            </td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ 'Rp ' . number_format($p->harga, 2, ',', '.') }}</td>
                                            <td>{{ $p->stok }}</td>
                                            <td>{{ $p->status }}</td>
                                            <td>{{ $p->keterangan }}</td>
                                            <td>{{ $p->tanggal_kadaluarsa }}</td>
                                            <td>{{ $p->kategori }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('dukpro.destroy', $p->id) }}" method="POST">
                                                    <a href="{{ route('dukpro.show', $p->id) }}"
                                                        class="btn btn-sm btn-dark">SHOW</a>
                                                    <a href="{{ route('dukpro.edit', $p->id) }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Produk belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $dukpro->links() }}
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
