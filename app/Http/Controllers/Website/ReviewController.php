<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(Request $request) {
        $id = $request->id;
        $product = Product::findOrFail($id);
        // return $product;

        $this->validate($request,[
            'rating' => ['required', 'numeric'],
            'review_description' => ['required', 'string']
        ]);

        $product_review = new ProductReview();
        $product_review->user_id = Auth::user()->id ?: '129';
        $product_review->product_id = $product->id;
        $product_review->star = $request->rating;
        $product_review->review_description = $request->review_description;
        $product_review->creator = Auth::user()->id;
        $product_review->approve = 0;
        $product_review->status = 1;
        $product_review->save();

        // if($product_review) {
        //     return redirect(url()->previous().'#review')->with('success');
        // } else {
        //     return redirect(url()->previous().'#review');
        // }
        if($product_review) {
            return response()->json([
                'success' => 'Thanks for your review'
            ]);
        } else {
            return response()->json([
                'error' => 'Ops! Something went wrong'
            ]);
        }
    }
}
