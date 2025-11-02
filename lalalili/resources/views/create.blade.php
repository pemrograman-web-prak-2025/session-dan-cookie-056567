<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    {{-- Menggunakan @vite untuk memuat CSS eksternal (menggantikan Bootstrap) --}}
    @vite('resources/css/app.css')
</head>
<body>
{{-- Menggunakan class container-crud untuk tampilan form CRUD --}}
<div class="container-crud">
    <h2 class="text-center mb-4">Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
