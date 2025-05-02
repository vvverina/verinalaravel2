<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .table-container {
            margin-top: 10px;
        }
        body {
            background-color: #ebe4c3;
        }
        .pagination-container {
            display: flex;
            justify-content: center; /* Pusatkan horizontal */
            align-items: center;      /* Pusatkan vertikal (jika perlu) */
            margin-top: 20px;
        }

        .pagination {
            margin-bottom: 0; /* Hilangkan margin default dari ul.pagination */
        }

        .pagination .page-item .page-link {
            padding: 0.25rem 0.5rem; /* Sesuaikan ukuran padding */
            font-size: 0.875rem;      /* Sesuaikan ukuran font */
        }
        .form-container {
            max-width: 900px;
            margin: 20px auto;
            background: #ebe4c3;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(87, 43, 43, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">CRUD Data Produk</a>
            </div>
    </nav>

    <div class="container mt-5">
        <div class="table-container">
            <h2 class="text-center mb-4">Daftar Produk</h2>
                <a href="{{ route('produk.create') }}" class="btn btn-success mb-1" style="margin-left: 5.2cm">Tambah Produk</a>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped table-bordered form-container">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination-container">
        {{ $produks->links() }}  </div>
    </div> {{-- pagination --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-zYWOEjHGjmtuprtIZ4SW+m3zh5qyTguzbykwPU7RY6uwJv8PouKxSv9M5by6BrPP" crossorigin="anonymous"></script>
</body>
</html>