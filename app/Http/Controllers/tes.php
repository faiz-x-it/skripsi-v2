<?php

namespace App\Http\Controllers;
use App\Author;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class tes extends Controller
{
    //
    public function bookDetails()
    {
        $book = Book::findOrFail(2);
        $book_reviews = $book->reviews()->latest()->get();
        return view('tes.tes' , compact('book', 'book_reviews'));
    }
}
