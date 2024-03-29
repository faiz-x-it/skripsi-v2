<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function store(Product $Product , Request $request)
    {
        $rules = [
            'body'          => 'required'
        ];
        $message = [
            'body.required' => "Comment body can't be empty"
        ];
        $this->validate($request, $rules, $message);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['Product_id'] = $Product->id;

        $review = Review::create($input);

        return redirect()->back()->with('success_message', 'Your review added');
    }

}
