<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $cart = [];
    // Str::word();
    public function __construct($cart = null) {
        // if(auth()->check()) {
        //     $this->cart = Cart::Where('user_id', auth()->user()->id)->get();
        // }else {
        // }
        if($cart){
            $this->cart = $cart;
        }
        else if(Session::has("carts")) {
            $this->cart = Session::get("carts");
        }
        else{
        }
        // dd(session()->all());
    }

    public function cart()
    {
        return view('website.pages.cart');
    }

    public function add_to_cart($id, $qty)
    {

        foreach ($this->cart as $key => $value) {
            if($value['product']->id == $id)
            {
                $value['qty']+= 1;
                return $this->cart;
            }
        }

        $product = Product::where('id', $id)
        ->where('status', 1)
        ->select("id", "product_name", "sales_price")
        ->with(['discounts', 'related_image' => function($q) {
            $q->select('id', 'product_id' ,'image');
        }])
        ->first();

        // dd($product);

        if(isset($product->discounts) && $product->discounts) {
            $price = (float)$product->sales_price-(float)$product->discounts['discount_amount'];
        }else {
            $price = (float)$product->sales_price;
        }

        if(!is_numeric($price)) {
            $price = 0;
        }

        $temp_arr = [
            "product" => $product,
            "qty" => $qty,
            "price" => $price,
            "sales_price" => $price,
        ];

        array_push($this->cart, collect($temp_arr));
        $this->cart_save();


    }
    
    public function cart_save() {
        Session::put('carts', $this->cart);
    }

    public function cart_count()
    {
        $count = count($this->cart);
        return $count;
    }

    public function cart_total()
    {
        $total = 0;
        foreach ($this->cart as $value) {
            // if($value['product']->id == $id)

            if(is_numeric($value['sales_price'])) {
                $total += $value['sales_price'] * $value['qty'];
            }else {
                0 * $value['qty'];
            }
        }
        return $total;
    }

    public function qty_increase($id) {
        foreach ($this->cart as $key => $value) {
            if($value['product']->id == $id)
            {
                $value['qty']+= 1;
            }
        }
        $this->cart_save();
        return $this->cart;
    }
    public function qty_decrease($id) {
        foreach ($this->cart as $key => $value) {
            if($value['product']->id == $id)
            {
                if($value['qty']>0) {
                    $value['qty']-= 1;
                }
            }
        }
        $this->cart_save();
        return $this->cart;
    }
    public function remove($id) {
        foreach ($this->cart as $key => $value) {
            if($value['product']->id == $id)
            {
                array_splice($this->cart, $key, 1);
                $this->cart_save();
            }
        }

        return $this->cart;
    }

    public function emptyCart()
    {
        session()->forget('carts');
    }

    public function qty_change($qty, $id) {
        foreach ($this->cart as $key => $value) {
            if($value['product']->id == $id)
            {
                $qty = (int)$qty;
                if($value['qty']>0) {
                    $value['qty'] = $qty;
                }
            }
        }
        $this->cart_save();
        return $this->cart;
    }

    public function get($id=null) {
        if($id) {

        }else {
            return $this->cart;
        }
    }

}
