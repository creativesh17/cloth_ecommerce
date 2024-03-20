<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function login() {
        if(auth()->check()){
            return redirect('/profile');
        }
        return view('website.pages.auth.login');
    }

    public function register() {
        if(auth()->check()) redirect('/');
        return view('website.pages.auth.register');
    }

    public function website_login(Request $request) {
        // dd($request->all());
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


        // dd(request()->all());
        $user = User::where('email', request()->email)->where('status', 1)->first();

        // dd($user);

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
        // dd(request()->all());
        return redirect('/login')->with('error', 'incorrect password');
    }

    public function website_register(Request $request) {
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

    public function logout() {
        auth()->logout();
        session()->forget('access_token');
        return redirect('/');
    }


    public function profile() {
        $this->middleware('auth');
        $user = auth()->user();
        return view('website.profile.profile',compact('user'));
    }

    public function profile_update() {

        $this->validate(request(),[
            'first_name' => 'required',
            'email' => request()->email?['unique:users,email,'.auth()->user()->id]:'',
            'mobile_number' => request()->mobile_number?['unique:users,mobile_number,'.auth()->user()->id]:'',
        ]);

        $user = User::find(auth()->user()->id);
        $user->fill(request()->except('photo'))->update();

        if (request()->hasFile('photo')) {
            $user = User::find(Auth::user()->id);
            $file = request()->file('photo');
            $path = 'uploads/user/pp-' . $user->first_name . '-' . $user->id . rand(10000, 99999) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->fit(200, 200)->save(public_path($path));
            $user->photo = $path;
            $user->save();
        }
        return redirect()->back()->with('success','Profile Updated');

    }

    public function orders() {
        $this->middleware('auth');
        $user = Auth::user();
        if($user) {
            $orders = Order::where('user_id', $user->id)->where('status', 1)->latest()->paginate(3);
            // $orderDetails = Order::where('user_id', $user->id)->order_details->paginate(10);
        }
        // dd($orders);
        return view('website.profile.orders',compact('orders'));
    }

    public function order_single_item_delete($id) {
        $this->middleware('auth');

        $user = Auth::user();
        $orderItem = OrderDetails::findOrFail($id);
        $orderDetailsCount = OrderDetails::where('order_id', $orderItem->order_id)->count();
        $order = Order::where('id', $orderItem->order_id)->first();

        if($orderItem) {
            // dd($orderDetailsCount);
            $orderItem->delete();
            if($orderDetailsCount == 1) {
                $order->order_delivery()->delete();
                $order->order_address()->delete();
                $order->delete();
                return redirect('orders')->with('success','Order is empty');
            }
            return redirect()->back()->with('success','Order item is deleted');

            // if(count($order->order_details) && count($order->order_details) > 0) {
            //     return Redirect::to('orders/details/'.$order->id)->with('success', 'Order Item Canceled!');
            // } else {
            //     $order->delete();
            //     return Redirect::to('orders')->with('success', 'Order Item Canceled!');
            // }
        }

    }

    public function orders_delete($id) {
        $this->middleware('auth');
        $user = Auth::user();
        // dd($id);
        $order = Order::where('user_id', $user->id)->where('id', $id)->where('status', 1)->firstOrFail();
        $orderDetails = OrderDetails::where('user_id', $user->id)->where('order_id', $order->id)->get();
        // return $orderDetails[0];
        if($order) {
            foreach($orderDetails as $orderDetail) {
                $orderDetail->delete();
            }
            $order->order_delivery()->delete();
            $order->order_address()->delete();
            $order->delete();
        }

        // if(cont($orderDetails) < 1) {
        //     $order->order_delivery()->delete();
        //     $order->order_address()->delete();
        //     $order->delete();
        // }

        return Redirect::to('orders')->with('success', 'Order Canceled!');

    }


    public function order_details($id) {
        $this->middleware('auth');

        $user = Auth::user();
        if($user) {
            $order = Order::where('id', $id)->withSum('order_payments', 'amount')->first();
            $order_details = $order->order_details()->get();
            $order_address = $order->order_address()->get();
        }
        // dd($order);
        return view('website.profile.order_details', compact('order', 'order_details', 'order_address'));
    }




    public function myreviews() {
        $this->middleware('auth');

        $user = Auth::user();
        // dd($user->id);
        $reviews = ProductReview::where('user_id', $user->id)->paginate(5);
        // dd($reviews);
        return view('website.profile.myreviews', compact('reviews'));
    }

    public function myreviews_delete($id) {
        $this->middleware('auth');
        // return $id;
        $user = Auth::user();
        // dd($user->id);
        $reviewDelete = ProductReview::where('id', $id)->delete();
        // $reviews = ProductReview::where('user_id', $user->id)->paginate(5);
        // dd($reviews);
        return view('website.profile.myreviews');
    }



    public function reset_password() {
        $user = Auth::user();
        return view('website.pages.auth.reset_password', compact('user'));
    }

    public function reset_password_update(Request $request) {
        $this->validate(request(),[
            'old_password' => 'required|string',
            'newpassword' => 'required|confirmed',
            'newpassword_confirmation' => 'required',
        ]);

        if(auth()->user()->id != $request->id) {
            abort('403', 'Permission Denied!');
        }

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
        return redirect()->back()->with('success','Password Changed successfully');
    }


}
