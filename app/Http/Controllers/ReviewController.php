<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller {
    public function store(Request $request, Product $product) {
        
        $request['product_id'] = $product->id;
        $request['user_id'] = auth()->id();
        $create = Review::create($request->all());

        if($create) {
            return response()->json(['success' => 'Thanks for your review!']);
        }else {
            return response()->json(['error' => 'An error occurred!']);
        }
    }
}
