<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AdminProdukController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|unique:books',
            'description' => 'required',
            'tendor_id' => 'required',
            'category_id' => 'required',
            'init_price' => 'required',
            'discount_rate' => 'required',
            'quantity' => 'required',
            'depan' => 'required|image|max:1024',
            'belakang' => 'required|image|max:1024',
            'model' => 'required',
        ]);

        // Upload gambar depan
        $depan = $request->file('depan');
        $depanName = time() . '-' . $depan->getClientOriginalName();
        $depan->move('path/to/depan', $depanName);

        // Upload gambar belakang
        $belakang = $request->file('belakang');
        $belakangName = time() . '-' . $belakang->getClientOriginalName();
        $belakang->move('path/to/belakang', $belakangName);

        // Mendapatkan warna dominan
        $warna = $this->getDominantColor($depan);

        // Simpan data buku ke database
        $book = new Book();
        $book->title = $request->input('title');
        $book->slug = $request->input('slug');
        $book->description = $request->input('description');
        $book->tendor_id = $request->input('tendor_id');
        $book->category_id = $request->input('category_id');
        $book->init_price = $request->input('init_price');
        $book->discount_rate = $request->input('discount_rate');
        $book->quantity = $request->input('quantity');
        $book->depan = $depanName;
        $book->belakang = $belakangName;
        $book->warna = $warna;
        $book->tema = 'XL'; // Nilai tetap 'XL' sesuai dengan kode asli
        $book->model = $request->input('model');
        $book->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    private function getDominantColor($image)
    {
        // Proses mendapatkan warna dominan dari gambar
        // Implementasikan logika Anda di sini

        // Contoh implementasi sederhana
        return 'rgb(255,255,255)';
    }
}
