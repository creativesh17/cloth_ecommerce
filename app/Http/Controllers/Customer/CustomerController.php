<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller {

    public function index() {
        $totalOrders = auth()->user()->orders->count();
        $totalActiveOrders = auth()->user()->orders->where('status', 1)->count();
        $totalCancelledOrders = auth()->user()->orders->where('status', 0)->count();
        return view('website..customer.dashboard', compact('totalOrders', 'totalActiveOrders', 'totalCancelledOrders'));
    }

    public function orders() {
        $orders = auth()->user()->orders;
        return view('website.customer.orders', compact('orders'));
    }

    public function ordershow(Order $order) {
        $products = $order->products;
        return view('website.customer.show', compact('order', 'products'));
    }

    public function profile() {
        $customer = auth()->user();
        return view('website.customer.account', compact('customer'));
    }

    public function settings() {
        $customer = auth()->user();
        return view('website.customer.setting', compact('customer'));
    }

    public function update(Request $request) {
        $request->validate([
    		'name' => 'required|string|max:255',
    		'email' => 'required|email|max:255',
    		'password' => 'nullable|min:8|confirmed'
        ]);
        
        $request['password'] = bcrypt($request->password);
        $update = auth()->user()->update($request->all());

        if($update){
    		return back()->with('success', 'Profile successfully updated!');
    	}
    }

    public function logout() {
        auth()->logout();
        return back();
    }
}
