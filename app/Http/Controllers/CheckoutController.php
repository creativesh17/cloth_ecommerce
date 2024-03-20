<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Shipping;
use Carbon\Carbon;
use App\OrderDetail;
use Illuminate\Http\Request;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('website.checkout');
    }

    public function store(Request $request) {
        // $this->validate($request, [], []);
        $request->validate([
            'ship_name' => 'required'
        ]);

        $request['status'] = (boolean)$request->status;
        $shipping = Shipping::create($request->all());

        $discount = 0;
        foreach(Cart::content() as $product) {
            $discount += ($product->price * $product->qty/100)*($product->options->discount);
        }
        $total = Cart::total() - $discount;
        $user = auth()->user();
        // var_dump($total);

        if($request->payoption == 'cash') {
            $order = Order::insertGetId([
                'customer_id' => $user->id,
                'shipping_id' => $shipping->id,
                'order_total' => $total + $request->shipcharge,
                'shipping_charge' => $request->shipcharge,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

            foreach(Cart::content() as $product) {
                OrderDetail::insert([
                    'order_id' => $order,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'product_qty' => $product->qty,
                    'product_discount' => $product->options->discount,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);

                $orderedProduct = Product::findOrFail($product->id);
                $orderedProduct->product_stock = $orderedProduct->product_stock - $product->qty;
                $orderConfirm = $orderedProduct->save();

                // $orderedProduct = Product::findOrFail($product->id);
                // $orderConfirm = $orderedProduct->update([
                //     'product_stock' => $orderedProduct->product_stock - $product->qty
                // ]);
            }

        }else {
            $customer = new Customer($user->name, $user->email, $user->phone);
            $resp = Client::initSession($customer, $total);
            session()->put('shipping_id', $shipping->id);
            session()->put('shipcharge', $request->shipcharge);
            return redirect($resp->getGatewayUrl());
        }

        if($orderConfirm) {
            Cart::destroy();
            return redirect('success')->with('success', 'Order is Successfull!');
        }else {
            return back();
        }
    }
}

