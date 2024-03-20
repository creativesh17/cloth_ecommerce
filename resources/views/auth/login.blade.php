@extends('layouts.app')
@section('content')
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-head">
                                            <a href="#" class="logo"><img src="{{asset('contents/admin')}}/assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                                        </div>                                        
                                        <h4 class="text-primary my-4">Log in !</h4>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email here" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password here"  required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox text-left">
                                                  <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                  <label class="custom-control-label font-14" for="remember">Remember Me</label>
                                                </div>                                
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="forgot-psw"> 
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" id="forgot-psw" href="{{ route('password.request') }}" class="font-14">Forgot Password?</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>                          
                                        <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                    </form>
                                    <div class="login-or">
                                        <h6 class="text-muted">OR</h6>
                                    </div>
                                    <div class="social-login text-center">
                                        <a class="btn btn-primary-rgba font-18" href="{{ url('login/facebook') }}"><i class="mdi mdi-facebook mr-2"></i>Facebook</a>
                                        <a class="btn btn-danger-rgba font-18" href="{{ url('login/google') }}"><i class="mdi mdi-google mr-2"></i>Google</a>
                                    </div>
                                    <p class="mb-0 mt-3">Don't have a account? <a href="{{ route('register') }}">Sign up</a></p>
                                </div>
                            </div>
                        </div> <!-- End Auth Box -->                        
                    </div> <!-- End col -->
                </div> <!-- End row -->
            </div>
        </div> <!-- End Container -->
    </div>
    <!-- End Containerbar -->
@endsection