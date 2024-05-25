@extends('NavbarAdmin')
@section('content')

    <body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Data Hampers</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ route('hampers.create') }}" class="btn btn-md btn-success">Tambah Hampers</a>
                                <form action="{{ route('hampers.search') }}" method="GET" class="d-flex">
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
                                        <th scope="col">Berat</th>
                                        <th scope="col">Ukuran</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($hampers as $h)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset('./storage/hampers/' . $h->image) }}" class=""
                                                    style="width: 150px">
                                            </td>

                                            <td>{{ $h->nama }}</td>
                                            <td>{{ 'Rp ' . number_format($h->harga, 2, ',', '.') }}</td>
                                            <td>{{ $h->stok }}</td>
                                            <td>{{ $h->berat }}</td>
                                            
                                            <td>{{ $h->ukuran }}</td>
                                            <td>{{ strip_tags($h->deskripsi) }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('hampers.destroy', $h->id) }}" method="POST">
                                                    <a href="{{ route('hampers.show', $h->id) }}"
                                                        class="btn btn-sm btn-dark">SHOW</a>
                                                    <a href="{{ route('hampers.edit', $h->id) }}"
                                                        class="btn btn-sm btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data hampers belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $hampers->links() }}
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
