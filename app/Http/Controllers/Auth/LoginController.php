<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    public function showLoginForm() {
        if(!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    public function __construct() {
        $this->middleware('guest')->except('logout');
        $this->middleware('preventbackgoing');
    }


    public function redirectTo() {
        if(Auth::check() && Auth::user()->user_role_id <= 2) {
            return '/admin/dashboard';
        }else {
            return '/customer/dashboard';
        }
    }

    // protected function redirectTo() {
    //     return url()->previous();
    // }



    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider) {
        $socialUser = Socialite::driver($provider)->user();

        $user = $this->findOrCreateUser($socialUser);

        auth()->login($user);

        return redirect($this->redirectTo())->with('success', 'Login Successfully!');
    }

    protected function findOrCreateUser($socialUser) {
        $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

        if($user->exists) return $user;

        $user->fill([
            'name' => $socialUser->getName(),
            'password' => bcrypt('12345678'),
        ])->save();

        return $user;
    }



}
