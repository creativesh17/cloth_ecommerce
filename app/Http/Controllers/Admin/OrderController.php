<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller {
    public function index() {
        // DB::enableQueryLog(); 
        // view('admin.order.all', compact('orders'))->render();
        // dd(DB::getQueryLog());
        $orders = Order::latest()->with('shipping')->paginate(4);
        return view('admin.order.all', compact('orders'));
    }

    public function delivered(Order $order) {
        if($order->status == 0) {
            $order->status = 1;
            $order->save();
        }

        return back()->with('success', 'Order successfully delvered!');
    }

    public function deliveredEmail(Request $request, Order $order) {
        // return $request->status;
        if($request->status == "completed") {
            Mail::to($order->shipping->ship_email)->send(new OrderConfirmationMail($order,  $request->message));
        }

        return back()->with('success', 'Email sent successfully!');
    }

    public function show(Order $order) {
        return view('admin.order.view', compact('order'));
    }
}
