<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() {
        // return Cart::destroy();
        // $products = Cart::content();
        // $products = (array)$products;
        // $cartItems = [];

        // foreach ($products as $key => $value) {
        //     if(gettype($value) == "array") {
        //         foreach ($value as  $k=>$v) {
        //             $cartItems[] = $v;
        //         }
        //     }
        // }

        $user = Auth::user();

        $wishlists = Wishlist::where("user_id", $user->id)->get();

        return view('website.pages.wishlist', compact('wishlists'));

    }


    public function addToWishlist($id) {
        $this->middleware('auth');
        $user = Auth::user();

        $newWishlist = Wishlist::where('product_id',$id)->where('user_id',$user->id)->first();
        if(!$newWishlist){
            $newWishlist = new Wishlist();
        }
        $newWishlist->product_id = $id;
        $newWishlist->user_id = $user->id;
        $newWishlist->save();
        return response()->json("Product added to wishlist");

    }

    public function removeWishlist($id) {

        $deleteItem = Wishlist::Where('product_id', $id);
        $deleteItem->delete();
        return redirect()->back()->with('success','Wishlist item successfully removed');

    }


}
