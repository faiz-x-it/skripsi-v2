<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Photo;

class AdminProductController extends AdminBaseController
{
    public function index()
    {
        $books = Product::with('category', 'tendor', 'image')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.products.index', compact('books'));
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store(CreateRequest $request)
    {
        $input = $request->all();

        $count_discount = (($request->init_price * $request->discount_rate)/100);
        $final_price  = $request->init_price - $count_discount;
        $input['price'] = $final_price;

        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(340,380);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $create_books = Product::create($input);
        return redirect('/admin/books')
            ->with('success_message', 'Book created successfully');

    }

    public function edit($id)
    {
        $book = Product::findOrFail($id);
        return view('admin.products.edit', compact('book'));

    }
    public function update(UpdateRequest $request, $id)
    {
        $input = $request->all();

        $count_discount = (($request->init_price * $request->discount_rate)/100);
        $final_price  = $request->init_price - $count_discount;
        $input['price'] = $final_price;

        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(340,380);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $book = Product::findOrFail($id);
        $book->update($input);
        return redirect('/admin/books')
            ->with('success_message', 'Book updated successfully');

    }

    public function destroy($id)
    {
        $book= Product::findOrFail($id);
        $book->delete();
        return redirect()->back()->with('alert_message', 'Book move to trash');
    }

    public function restore($id)
    {
        $trash = Product::onlyTrashed()->findOrFail($id);
        $trash->restore();
        return redirect()->back()
            ->with('success_message', 'Book successfully restore from trash');
    }

    public function forceDelete($id)
    {
        $trash_book = Product::onlyTrashed()->findOrfail($id);
        if(!is_null($trash_book->image_id))
        {
            unlink(public_path().'/assets/img/'.$trash_book->image->file);
        }
        $trash_book->image->delete();
        $trash_book->forceDelete();
        return redirect()->back()
            ->with('alert_message', 'Book deleted permanently');
    }

    public function trashBooks()
    {
        $books = Product::onlyTrashed()->orderBy('id', 'DESC')->get();
        return view('admin.products.trash-books', compact('books'));
    }

    public function discountBooks()
    {
        $discount_books = "All books with discount";
        $books = Product::with('tendor', 'category')
            ->orderBy('discount_rate', 'DESC')
            ->where('discount_rate', '>', 0)->get();

        return view('admin.products.index', compact('books', 'discount_books'));
    }


}
