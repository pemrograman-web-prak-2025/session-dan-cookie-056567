<!DOCTYPE html>
<html>
<head>
    <title>Stok Barang Toko</title>
    {{-- Menggunakan @vite untuk memuat CSS eksternal--}}
    @vite('resources/css/app.css')
</head>
<body>

{{-- Menggunakan class container-crud untuk tampilan tabel CRUD --}}
<div class="container-crud">
    
    {{-- Menampilkan pesan sukses/error --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Menggantikan d-flex justify-content-between align-items-center mb-4 --}}
    <div class="d-flex">
        <h2>Stok Barang Toko</h2>
        {{-- Menggunakan class custom btn-outline-danger --}}
        <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger"
           onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </div>

    {{-- Menggunakan class custom btn-success mb-3 --}}
    <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">+ Tambah Produk</a>

    {{-- Menggunakan class custom table-bordered dan table-primary --}}
    <table class="table-bordered bg-white">
        <thead class="table-primary">
            <tr class="text-center">
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produk as $p)
            <tr class="align-middle text-center">
                <td>{{ $p->id }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->stok }}</td>
                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>
                    {{-- Menggunakan class custom btn-warning dan btn-danger --}}
                    <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('produk.delete', $p->id) }}" class="btn btn-danger" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
