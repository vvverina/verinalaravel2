<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
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
        // dd($validator->validated());
        Produk::create($validator->validated());

        return redirect()->route('produk.create')->with('success', 'Produk created successfully!');
    }
}