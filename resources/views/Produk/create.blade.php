<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Produk</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        body {
            background-color: #ffffff;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #ebe4c3;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(87, 43, 43, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Insert Produk</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk:</label>
                <input type="text" id="nama" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" value="{{ old('nama_produk') }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" class="form-control" placeholder="Masukkan harga" value="{{ old('harga') }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="number" id="stock" name="stok" class="form-control" placeholder="Masukkan stok" value="{{ old('stok') }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>