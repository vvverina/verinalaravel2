<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index(): View{
        // $produks=Produk::all();

        // Mengambil data produk dengan pagination
        $produks = Produk::paginate(5); // Menampilkan 5 item per halaman
        return view(view: 'produk.index', data: compact(var_name: 'produks'));
    }
    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
            ]);

        if ($validator->fails()) {
            return redirect()->route('produk.create')
                ->withErrors($validator)
                ->withInput();
        }

    Produk::create($validator->validated());

    // Redirect ke halaman index setelah sukses
    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
}

    // Fungsi edit
    public function edit(Produk $produk)
        {
            return view('produk.edit', compact('produk'));
        }

    // Fungsi update
    public function update(Request $request, Produk $produk)
        {
            $request->validate([
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0'
            ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate.');
        }

    public function destroy(Produk $produk)
        {
            $produk->delete();
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        }
}