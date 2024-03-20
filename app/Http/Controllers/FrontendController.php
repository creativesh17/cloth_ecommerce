<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderDeliveryInfo;
use App\Models\OrderDetails;
use App\Models\OrderPayment;
use App\Models\Product\ProductQuestion;
use App\Models\ProductReview;
use App\Models\ProductStockLog;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class FrontendController extends Controller
{
    public function checkout() {
        $setting = Setting::select('home_delivery_cost', 'outside_dhaka_cost')->first();
        $cart_handler = new CartController();
        $carts = $cart_handler->get();
        $cart_total = $cart_handler->cart_total();
        $shipping_method  = 0;
        $order_total = 0;
        $home_delivery_value = $setting->home_delivery_cost;
        $outside_dhaka_value = $setting->outside_dhaka_cost;

        return view('website.pages.checkout', compact('carts', 'cart_total', 'shipping_method', 'order_total', 'home_delivery_value', 'outside_dhaka_value'));
    }

    public function confirm_order(Request $request) {
        $carts = new CartController(request()->cart);
        $rules = [
            'full_name' => ['required', 'string'],
            // 'last_name' => ['required'],
            'address' => ['required'],
            'mobile_number' => ['required', 'string'],
            // 'email' => ['email'],
            // 'city' => ['required', 'string'],
            // 'zone' => ['required', 'string'],
            // 'payment_method' => ['required'],
            // 'bkash_number' => ['required_if:payment_method,==,bkash'],
            // 'bkash_trx_id' => ['required_if:payment_method,==,bkash'],
            // 'bank_account_no' => ['required_if:payment_method,==,bank'],
            // 'bank_transaction_id' => ['required_if:payment_method,==,bank'],
            'shipping_method' => ['required'],
            // 'divisions' => ['required'],
            // 'districts' => ['required'],
            // 'police_stations' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'err_message' => 'validation error',
                'data' => $errors,
            ], 422);
        }

        if(request()->police_stations == 'Enter police station name'){
            return response()->json([
                'err_message' => 'validation error',
                'data' => ["police_stations"=>["enter your police station name."]],
            ], 422);
        }

        $setting = Setting::select('home_delivery_cost', 'outside_dhaka_cost')->first();
        $shipping_charge = 0;
        if ($request->shipping_method == 'inside_dhaka') {
            $shipping_charge = $setting->home_delivery_cost;
        }
        if ($request->shipping_method == 'outside_dhaka') {
            // $shipping_charge = $setting->outside_dhaka_cost;
            $shipping_charge = 0;
        }

        $cart_handler = new CartController(request()->cart);
        $cart_total = $cart_handler->cart_total();

        $order = new Order();
        $order->order_status = 'Pending';
        if (Auth::user()) {
            $order->user_id = Auth::user()->id;
        }
        $order->total_price = $cart_total + $shipping_charge;
        $order->sub_total = $cart_total;
        $order->total_discount = $request->total_discount;
        $order->order_coupon = $request->coupon;
        $order->coupon_discount = $request->coupon_discount;
        $order->payment_status = 'Pending';
        $order->delivery_method = $request->shipping_method;
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
        }
        $order_info->first_name = $request->full_name;
        $order_info->last_name = $request->last_name;
        $order_info->address = $request->address;
        $order_info->mobile_number = $request->mobile_number;
        $order_info->email = $request->email;
        $order_info->zone = $request->zone;
        $order_info->city = $request->city;
        $order_info->comment = $request->comment;
        $order_info->save();

        // $order_payment = new OrderPayment();
        // $order_payment->order_id = $order->id;
        // if (Auth::user()) {
        //     $order_payment->user_id = Auth::user()->id;
        // }
        // $order_payment->payment_method = $request->payment_method;
        // $order_payment->bkash_number = $request->bkash_number;
        // $order_payment->bkash_trx_id = $request->bkash_trx_id;
        // $order_payment->bank_account_no = $request->bank_account_no;
        // $order_payment->bank_trx_id = $request->bank_trx_id;
        // $order_payment->amount = $order->total_price;
        // $order_payment->trx_id = uniqid();
        // $order_payment->status = "Pending";
        // $order_payment->save();

        $order_delivery = new OrderDeliveryInfo();
        $order_delivery->order_id = $order->id;
        if (Auth::user()) {
            $order_delivery->user_id = Auth::user()->id;
        }
        $order_delivery->delivery_method = $request->shipping_method;
        if ($request->shipping_method == 'cod') {
            $order_delivery->delivery_cost = 0;
        }

        if ($request->shipping_method == 'inside_dhaka') {
            $order_delivery->delivery_cost = $setting->home_delivery_cost;
        }
        $order_delivery->save();

        // if ($request->shipping_method == 'outside_dhaka') {
        //     $order_delivery->delivery_cost = 100;
        // }
        // if ($request->distircts == 47) {
        //     $order_delivery->delivery_cost =  $setting->home_delivery_cost;
        // }else{
        //     // $order_delivery->delivery_cost =  $deliver_cost->outside_dhaka_cost;
        //     $order_delivery->delivery_cost =  0;
        // }


        $cart_products = $carts->get();
        foreach ($cart_products as $key => $product) {
            $product = (object) $product;
            $order_details = new OrderDetails();
            $order_details->order_id = $order->id;
            if (Auth::user()) {
                $order_details->user_id = Auth::user()->id;
            }
            $order_details->product_id = $product->id;
            if (is_numeric($product->sales_price)) {
                $order_details->product_price = $product->sales_price;
            } else {
                $order_details->product_price = 0;
            }
            $order_details->qty = $product->qty;
            $order_details->save();

            $stock_log = new ProductStockLog();
            $stock_log->product_id = $product->id;
            $stock_log->qty = $product->qty;
            $stock_log->type = "sell";
            $stock_log->save();
        }
        $carts->emptyCart();

        return response()->json([
            "message" => "Order Completed Successfully",
            "order" => $order
        ], 200);
    }

    public function order_complete($id) {
        $order = Order::where('invoice_id', $id)->first();
        return view('website.pages.order_complete',compact('order'));
    }

    public function order_complete_print($id) {
        $order = Order::where('invoice_id', $id)->first();
        $view = view('website.pages.order_complete_print', ['order'=>$order])->render();
        // echo $view;
        // return ;
        $pdf = Pdf::loadHTML($view);
        return $pdf->download('ctg-computer-'.$order->invoice_id.'.pdf');
    }

    public function questionSubmit(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request,[
                'question' => ['required', 'string'],
                'product_id' => ['required']
            ]);

            $product_review = new ProductQuestion();
            $product_review->user_id = Auth::user()->id;
            $product_review->name = Auth::user()->fist_name.' '.auth()->user()->last_name;
            $product_review->product_id = $request->product_id;
            $product_review->question = $request->question;
            $product_review->creator = Auth::user()->id;
            $product_review->save();

            return redirect(url()->previous().'#question');
        } else {
            return redirect(url()->previous().'#question');
        }

        return redirect(url()->previous().'#question');
    }

    public function reviewSubmit(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request,[
                'rating' => ['required', 'numeric'],
                'review_description' => ['required', 'string']
            ]);

            $product_review = new ProductReview();
            $product_review->user_id = Auth::user()->id;
            $product_review->product_id = $request->product_id;
            $product_review->star = $request->rating;
            $product_review->review_description = $request->review_description;
            $product_review->creator = Auth::user()->id;
            $product_review->approve = 0;
            $product_review->status = 1;
            $product_review->save();

            return redirect(url()->previous().'#review');
        } else {
            return redirect(url()->previous().'#review');
        }

        return redirect(url()->previous().'#review');
    }

    public function reviewremove()
    {
        ProductReview::where('id', request()->id)->where('creator', auth()->user()->id)->delete();
        return redirect(url()->previous().'#review');
    }



    public function orders() {
        $user = Auth::user();
        if($user) {
            $orders = Order::where('user_id', $user->id)->paginate(20);
        }
        return view('website.pages.profile.orders',compact('orders'));
    }

    public function my_reviews()
    {
        $user = Auth::user();
        if($user) {
            $product_reviews  = ProductReview::where('user_id', $user->id)->with('product')->paginate(10);
        }
        return view('website.pages.profile.reviews',compact('product_reviews'));
    }

    public function address()
    {
        $user = Auth::user();
        $address = new OrderAddress();
        if($user) {
            $address = OrderAddress::where('user_id', $user->id)->orderBy('id','DESC')->first() ?? new OrderAddress();
        }
        return view('website.pages.profile.address',compact('address'));
    }

    public function address_update()
    {
        $user = Auth::user();
        $address = OrderAddress::where('user_id', $user->id)->orderBy('id','DESC')->first();
        if($address){
            $address->fill(request()->except('_token'))->update();
        }else{
            OrderAddress::create(request()->all());
        }
        return redirect()->back()->with('success','information updated');
    }

    public function account_details()
    {
        $user = Auth::user();
        return view('website.pages.profile.account_details',compact('user'));
    }

    public function account_details_update()
    {
        $this->validate(request(),[
            'first_name' => 'required',
            'email' => request()->email?['unique:users,email,'.auth()->user()->id]:'',
            'mobile_number' => ['unique:users,mobile_number,'.auth()->user()->id],
        ]);

        $user = User::find(auth()->user()->id);
        $user->fill(request()->except('photo'))->update();

        if (request()->hasFile('photo')) {
            $user = User::find(Auth::user()->id);
            $file = request()->file('photo');
            $path = 'uploads/user/pp-' . $user->user_name . '-' . $user->id . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->fit(200, 200)->save(public_path($path));
            $user->photo = $path;
            $user->save();
        }
        return redirect()->back()->with('success','information updated');
    }

    public function reset_password()
    {
        $user = Auth::user();
        return view('website.pages.profile.reset_password',compact('user'));
    }

    public function reset_password_update()
    {
        $this->validate(request(),[
            'old_password' => 'required|string',
            'newpassword' => 'required|confirmed',
            'newpassword_confirmation' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        if (Hash::check(request()->old_password, $user->password)) {
            if (strlen(request()->newpassword) && strlen(request()->newpassword_confirmation)) {

                $user->password = Hash::make(request()->newpassword);
                $user->update();

                session()->flash('message', "Your password is updated successfully.");
            }
        } else {
            session()->flash('error', 'your given old password not matching.');
        }
        return redirect()->back()->with('success','information updated');
    }

    public function login()
    {
        if(auth()->check()){
            return redirect('/profile');
        }
        return view('website.pages.auth.login');
    }

    public function register()
    {
        if(auth()->check()) redirect('/');
        return view('website.pages.auth.register');
    }

    public function website_login(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'err_message' => 'validation error',
        //         'data' => $validator->errors(),
        //     ], 422);
        // }

        session()->forget('access_token');

        $this->validate(request(), [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where(function ($q) {
            $q->where('email', request()->email)
                ->orWhere('mobile_number', request()->email);
        })->where('status', 1)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'invalid user');
        }

        if (Hash::check(request()->password, $user->password)) {
            $request->session()->regenerate();
            auth()->login($user);
            if ($user->roles()->whereIn('role_serial', [1, 2])->first()) {
                session()->put('access_token', $user->createToken('accessToken')->accessToken);
            }
            return redirect('/profile');
        }

        return redirect('/login')->with('error', 'incorrect password');
    }

    public function website_register(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            // 'last_name' => [Rule::requiredIf(strlen($request->last_name))],
            'mobile_number' => 'required|unique:users,mobile_number',
            'password' => 'min:8,required|confirmed',
            'email' => request()->email?'sometimes|email':'',
        ];

        //if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
           // $rules['email'] = 'email,unique:users';
        //}

        $this->validate($request, $rules);

        // $validator = Validator::make($request->all(), [
        //     'name' => ['required'],
        //     'email' => ['unique:users'],
        //     'password' => ['required', 'min:8', 'confirmed'],
        //     'mobile_number' => ['required'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'err_message' => 'validation error',
        //         'data' => $validator->errors(),
        //     ], 422);
        // }

        $data = $request->except(['password', 'password_confirmation', 'image']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = 'uploads/users/pp-' . $user->user_name . '-' . $user->id . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->fit(200, 200)->save(public_path($path));
            $user->photo = $path;
        }
        $user->slug = $user->id . rand(1000, 9999);
        $user->save();

        $user->roles()->attach([3]);

        Auth::login($user);
        return redirect('/profile');

        // $user = User::where('id', Auth::user()->id)->with('roles')->first();
        // return response()->json($user, 200);
    }

    public function logout()
    {
        auth()->logout();
        session()->forget('access_token');
        return redirect('/');
    }
}
