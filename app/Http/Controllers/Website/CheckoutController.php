<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderDeliveryInfo;
use App\Models\OrderDetails;
use App\Models\ProductStockLog;
use App\Models\Setting;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout() {

        // return count(auth()->user()->order_addresses);
        // if(count(auth()->user()->order_addresses)) {
        //     return ;
        // }else {
        //     return 5;
        // }
        // return auth()->user()->order_addresses[auth()->user()->order_addresses->count() - 1];
        
        $setting = Setting::select('home_delivery_cost', 'outside_dhaka_cost')->first();
        // $cart_handler = new CartController();
        // $carts = $cart_handler->get();
        // $cart_total = $cart_handler->cart_total();
        $shipping_method  = 0;
        $order_total = 0;
        $home_delivery_value = $setting->home_delivery_cost ?: 50;
        $outside_dhaka_value = $setting->outside_dhaka_cost ?: 100;
        // dd($home_delivery_value);
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

        if(!count($cartItems)) {
            return back()->with('warning', 'To go to checkout page, add some products in your cart!');
        }

        // dd($cartItems);
        // dd($cartItems[0]->rowId);
        // dd($cartItems[0]->id);

        // return view('website.pages.checkout', compact('carts', 'cart_total', 'shipping_method', 'order_total', 'home_delivery_value', 'outside_dhaka_value'));
        return view('website.pages.checkout', compact('shipping_method', 'order_total','home_delivery_value', 'outside_dhaka_value', 'cartItems'));

    }

    public function store(Request $request) {
        // dd($request->all());
        // dd($carts = Cart::content());
        // $carts = new CartController(request()->cart);

        $request->validate([
            'ship_name' => ['required', 'string'],
            'ship_email' => ['email'],
            'ship_phone' => ['required', 'string'],
            'ship_address' => ['required'],
            'division' => ['required'],
            'district' => ['required'],
            'check-terms' => ['required'],
            'shipping_method' => ['required'],
        ],[
            'ship_name.required' => "Name field is required",
            'ship_email.required' => "Email field is required",
            'check-terms.required' => "This has to be checked"
        ]);

        // dd($request->all());

        // var_dump($total);
        $setting = Setting::select('home_delivery_cost', 'outside_dhaka_cost')->first();
        $shipping_charge = 0;
        if ($request->shipping_method == 'inside_dhaka') {
            $shipping_charge = $setting->home_delivery_cost;
        }
        if ($request->shipping_method == 'outside_dhaka') {
            $shipping_charge = $setting->outside_dhaka_cost;
        }

        $discount = 0;
        foreach(Cart::content() as $product) {
            $discount += ($product->price * $product->qty/100)*($product->options->discount);
        }
        $cart_total = Cart::total() - $discount;

        $order = new Order();
        $order->order_status = 'Pending';
        if (Auth::user()) {
            $order->user_id = Auth::user()->id;
        } else {
            $order->user_id = '130';
        }
        $order->total_price = $cart_total + $shipping_charge;
        $order->sub_total = $cart_total;
        // $order->total_discount = $request->total_discount;
        // $order->order_coupon = $request->coupon;
        // $order->coupon_discount = $request->coupon_discount;
        $order->payment_status = 'Pending';
        $order->delivery_method = $request->shipping_method;
        $order->delivery_charge = $shipping_charge;
        $order->save();

        $date = Carbon::now()->format('ym');
        if (strlen($order->id) == 1) {
            $order->invoice_id = $date . "000" . $order->id;
        } elseif (strlen($order->id) == 2) {
            $order->invoice_id = $date . "00" . $order->id;
        } elseif (strlen($order->id) == 3) {
            $order->invoice_id = $date . "0" . $order->id;
        } else {
            $order->invoice_id = $date . "" . $order->id;
        }
        $order->invoice_id .= rand(0,100);
        $order->invoice_date = Carbon::now()->format('Y-m-d');
        $order->save();


        $order_info = new OrderAddress();
        $order_info->order_id = $order->id;
        
        if (Auth::user()) {
            $order_info->user_id = Auth::user()->id;
        } else {
            $order_info->user_id = '130';
        }

        $order_info->first_name = $request->ship_name;
        $order_info->last_name = $request->last_name ?: NULL;
        $order_info->email = $request->ship_email;
        $order_info->mobile_number = $request->ship_phone;
        $order_info->division = $request->division;
        $order_info->district = $request->district;
        $order_info->address = $request->ship_address;
        $order_info->save();


        $order_delivery = new OrderDeliveryInfo();
        $order_delivery->order_id = $order->id;
        if (Auth::user()) {
            $order_delivery->user_id = Auth::user()->id;
        }

        $order_delivery->delivery_method = $request->shipping_method;

        if ($request->shipping_method == 'store_pickup') {
            $order_delivery->delivery_cost = 0;
        } elseif ($request->shipping_method == 'inside_dhaka') {
            $order_delivery->delivery_cost = $setting->home_delivery_cost;
        } elseif ($request->shipping_method == 'outside_dhaka') {
            $order_delivery->delivery_cost = $setting->outside_dhaka_cost;
        }

        $order_delivery->save();


        $products = Cart::content();
        // dd($products);
        // $cart_products = $carts->get();
        foreach ($products as $key => $product) {
            $product = (object) $product;
            $order_details = new OrderDetails();
            $order_details->order_id = $order->id;
            if (Auth::user()) {
                $order_details->user_id = Auth::user()->id;
            }
            // dd($product);
            $order_details->product_id = $product->id;
            $order_details->product_price = $product->price;

            $order_details->qty = $product->qty;
            $order_details->save();

            $stock_log = new ProductStockLog();
            $stock_log->product_id = $product->id;
            $stock_log->qty = $product->qty;
            $stock_log->type = "sell";
            $stock_log->save();
        }
        // $carts->emptyCart();
        // Cart::destroy();
        if($stock_log) {
            Cart::destroy();
            return redirect('order-complete/'.$order->invoice_id)->with('success', 'Order is Successfull!');
        }else {
            return back()->with('error', 'Something went wrong');
        }

    }


    public function order_complete($id) {
        $order = Order::where('invoice_id', $id)->withSum('order_payments', 'amount')->first();
        $order_details = $order->order_details()->get();
        $order_address = $order->order_address()->get();
        // dd($order_address[0]->first_name);
        // dd($order_details);
        // dd($order);
        return view('website.pages.order-complete', compact('order', 'order_details', 'order_address'));
    }


    


}
