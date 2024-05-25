<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>

    

</style>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Admin - CRUDS Data Produk</h3>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col d-flex">
                <div class="jarak">
                    <a href="{{ route('produk.create') }}" class="btn btn-dark">Create</a>
                </div>
                    <form action="{{ route('produk.search') }}" method="GET" class="input-group" style="width: 300px;">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-outline-dark">Search</button>
                    </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Produk</h3>
                    </div>
                    <!-- <div class="card-body"> -->
                        <table class="table">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Stok Produk</th>
                                <th>Kategori Produk</th>
                                <th>Keterangan Produk</th>
                                <th>Status Produk</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>Deskripsi Produk</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                            @if($produk->isNotEmpty())
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->harga_produk }}</td>
                                <td>{{ $p->stok_produk }}</td>
                                <td>{{ $p->kategori_produk }}</td>
                                <td>{{ $p->keterangan_produk }}</td>
                                <td>{{ $p->status_produk }}</td>
                                <td>{{ $p->tanggal_kadaluarsa }}</td>
                                <td>{{ $p->deskripsi_produk }}</td>
                                <td>
                                    @if($p->image != "")
                                        <img width="50" src = "{{asset('uploads/produk'.$p->image)}}" alt="gambar">
                                    @endif
                                </td>
                                <td>
                                    <div class = "d-flex">
                                    <a href="{{ route('produk.edit', $p->id)}}" class="btn btn-dark me-2">Edit</a>
                                    <a href="#" onclick="deleteProduk({{$p->id}});" class="btn btn-danger">Delete</a>
                                    <form id="delete-produk-from-{{$p->id}}" action="{{ route('produk.destroy',$p->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script>
    function deleteProduk(id){
        if(confirm("Yakin Untuk Delete?")){
            document.getElementById("delete-produk-from-"+id).submit();
        }
    }
</script>