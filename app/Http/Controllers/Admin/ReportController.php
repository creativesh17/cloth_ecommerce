<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller {
    public function __construct() {
        
    }

    public function index(Request $request) {
        $orders = Order::whereBetween('created_at', [$request->report_from, $request->report_to])->get();
        return view('admin.report.index', compact('orders'));
    }
    
}
