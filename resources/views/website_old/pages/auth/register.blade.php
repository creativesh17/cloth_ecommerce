@extends('website.layouts.app',[
    "meta" => [
        "title" => "register",
    ]
])
@section('content')
<main>
    <div class="login-register-area section-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-4">
                            <div class="login-register-title mb-30">
                                <h3>Register</h3>
                                <p>Welcome back! Please enter your information to register in.</p>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="login-register-content">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="login-register-style">
                                    <form method="POST">
                                        @csrf
                                        <div class="login-register-input">
                                            <label for="first_name" class="col-md col-form-label text-md-right">Full Name</label>
                                            <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"  >

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="login-register-input">
                                            <label for="mobile_number" class="col-md col-form-label text-md-right">Phone number</label>
                                            <input id="mobile_number" type="text" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number') }}"  >

                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="login-register-input">
                                            <label for="email" class="col-md col-form-label text-md-right"> Email</label>
                                            <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  >

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="login-register-input">
                                            <label for="password" class="col-md col-form-label text-md-right">{{ __('Password') }}</label>
                                            <input id="password" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" >

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="login-register-input">
                                            <label for="password_confirmation" class="col-md col-form-label text-md-right">Confirm Password</label>
                                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Password" >

                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group row mb-0 mt-3">
                                            <div class="">
                                                <button type="submit" class="btn btn-secondary btn-register-now">
                                                    Register
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <br>
                                                    <a class="pt-2" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="btn-register mt-3">
                                            Already have an account? <a href="/login"><b>login</b></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
