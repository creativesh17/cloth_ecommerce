<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $user = User::find(auth()->user()->id);
        $role = $user->roles()->whereIn('role_serial',[1,2])->first();
        if($role){
            return redirect()->route('admin_index');
        }else{
            return redirect('/profile');
        }
    }
}
