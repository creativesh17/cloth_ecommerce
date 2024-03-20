<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index() {
        // return Cart::destroy();
        // return session()->forget('compare_product_list');
        // return ddd(session()->get('cart'));
        // dd(session()->get('cart'));
        // return $products = Cart::content();
        $products = Cart::content();
        $products = (array)$products;
        $cartItems = [];
        // dd($test);
        foreach ($products as $key => $value) {
            if(gettype($value) == "array") {
                foreach ($value as  $k=>$v) {
                    $cartItems[] = $v;
                }
            }
         }

        //  dd($cartItems);
        //  dd($cartItems[0]->rowId);
        //  dd($cartItems[0]->id);

        return view('website.pages.cart', compact('cartItems'));
    }

    public function addToCart(Product $product, Request $request) {
        // return $product;
        // if ($product->discounts && $product->discounts['discount_last_date'] > Carbon::now()) {

        // }
        // return $product;
        $added = Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => $request->qty ?: 1 ,
            'price' => $product->active_price ?: $product->sales_price,
            'weight' => 0,
            'options' => ['image' => $product->photo_url ]
        ]);

        if($added) {
            return response()->json([
                'success' => $added->name.' has been added to your cart'
            ]);
        }
    }

    public function cartItems() {
        return view('website.pages.cartitems');
    }

    public function updateCart(Request $request) {
        // dd(session()->get('cart'));
        // dd($request->all());

        $productDetails = $request->product;

        foreach($productDetails as $product) {
            // dd($product);
            Cart::update($product['rowId'],  $product); // Will update the name
        }

        return redirect()->back()->with('success','Cart successfully updated');
    }

    public function removeCart($rowid) {

        Cart::remove($rowid);
        return redirect()->back()->with('success','Cart item successfully removed');

    }


}
