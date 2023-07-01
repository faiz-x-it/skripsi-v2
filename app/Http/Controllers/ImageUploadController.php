<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Photo;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index()
{
    $products = Product::all(); // Mendapatkan semua produk dari database

    return view('photo.upload', compact('products')); // Menampilkan view 'photo.upload' dan mengirimkan data produk ke view
}


    public function save(Request $request)
    { 
        if ($request->ajax()) {
            session(['preview_images' => $request->previews]);
            return view('components._preview-images', [
                'preview_images' => session('preview_images')
            ])->render();
        }

        return view('photo.upload');
    }

    public function delete(Request $request)
    {
        $preview_images = session('preview_images');
        unset($preview_images[$request->previews_to_delete]);
        session(['preview_images' => $preview_images]);

        return view('components._preview-images', [
            'preview_images' => session('preview_images')
        ])->render();
    }
    // public function store(Request $request)
    // {
    //     $final_images = $request->images;
    //     $product_id = $request->product_id;
        
    //     // Cek nilai product_id
    //     dd($product_id);
    
    //     // ...
    // }
    
    public function store(Request $request)
{
    $final_images = $request->images;
    $product_id = $request->product_id;

    $files = array_intersect_key($final_images, session('preview_images'));

    foreach ($files as $file) {
        $originalName = $file->getClientOriginalName();
        $name = $originalName . '_' . time(); // Menambahkan timestamp ke nama file
        $path = $file->storeAs('public/images', $name); // Menyimpan file dengan nama yang diubah

        $photo = new Photo;
        $photo->name = $originalName;
        $photo->path = Storage::url($path); // Mengubah path menjadi URL yang valid
        $photo->product_id = $product_id;
        $photo->save();
    }

    return redirect('photo')->with('status', 'Uploaded');
}



public function show($id)
{
    $photo = Photo::findOrFail($id);
    $product = Product::findOrFail($photo->product_id);

    return view('photo.show', compact('photo', 'product'));
}

public function preview()
{
    $photos = Photo::all();
    $products = Product::with('category', 'image')
    ->where('discount_rate', '=', 0)
    ->orderBy('id', 'DESC')
    ->take(4)
        ->get();

    return view('photo.index', compact('photos', 'products'));
}
}
