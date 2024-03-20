<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\ProductReview;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {
        
        $user = Auth::user();
        $totalOrders = Order::where('user_id', $user->id)->count();
        $totalWishlist = Wishlist::where('user_id', $user->id)->count();
        $totalReviews = ProductReview::where('user_id', $user->id)->count();
        $totalPayments = OrderPayment::where('user_id', $user->id)->count();
        return view('website.profile.dashboard', compact('totalOrders', 'totalWishlist', 'totalReviews', 'totalPayments', 'totalPayments'));
    }
}
