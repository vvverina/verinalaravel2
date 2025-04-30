<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Produk</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>
    <h1>Buat Produk</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama Produk :</label>
            <input type="text" id="nama" name="nama_produk" value="{{ old('nama_produk') }}" required>
        </div>

        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga') }}" step="0.01" required>
        </div>

        <div>
            <label for="stok">Stok:</label>
            <input type="number" id="stock" name="stok" value="{{ old('stok') }}" required>
        </div>

        <button type="submit">Buat</button>
    </form>
</body>

</html>