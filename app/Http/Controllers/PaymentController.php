<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\Product;
use Carbon\Carbon;
use App\OrderDetail;
use Illuminate\Http\Request;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\IpnNotification;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function payment() {
        if(ipn_hash_varify(config('sslcommerz.store_password'))){
            $ipn = new IpnNotification($_POST);
            $val_id = $ipn->getValId();
            $transaction_id = $ipn->getTransactionId();
            $resp = Client::verifyOrder($val_id);
            $amount = $ipn->getAmount();
            
            $payment = Payment::create([
                'amount' => $amount,
                'transaction_id' => $transaction_id,
                'val_id' => $val_id,
            ]);

            $discount = 0;
            foreach(Cart::content() as $product) {
                $discount += ($product->price * $product->qty/100)*($product->options->discount);
            }
            $total = Cart::total() - $discount;
            $user = auth()->user();

            $order = Order::insertGetId([
                'customer_id' => $user->id,
                'payment_id' => $payment->id,
                'shipping_id' => session()->get('shipping_id'),
                'order_total' => $total + session()->get('shipcharge'),
                'shipping_charge' => session()->get('shipcharge'),
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
            }
        }else {
            return redirect('error');
        } 
        
        if($orderConfirm) {
            Cart::destroy();
            session()->forget(['shipping_id', 'shipcharge']);
            return redirect('success')->with('success', 'Order is Successfull!');
        }else {
            return back();
        }
    }

    public function success() {
        return view('website.success')->with('success', 'Payment Process Successfull');
    }
    public function error() {
        return view('website.error')->with('error', 'Opps! Something went wrong!');
    }
    public function cancel() {
        return view('website.cancel')->with('error', 'Payment Process Cancelled');
    }
}
