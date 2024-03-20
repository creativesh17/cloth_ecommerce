@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Sign Up',
    ],
])

@push('css_plugin')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/stylesheets/my-login.css">
@endpush

@section('content')
    <div class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div><br></div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Sign Up</h4>
                                <form action="{{ url('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <label for="first_name"> <b>First Name</b> </label>
                                        <input id="first_name" type="text" class="form-control" name="first_name"
                                            value="">
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if (count($errors) > 0)
                                        @foreach ($errors->all() as $message)
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @endforeach
                                    @endif --}}
                                    </div>

                                    <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                                        <label for="mobile_number"> <b>Mobile Number</b> </label>
                                        <input id="mobile_number" type="text" class="form-control" name="mobile_number"
                                            value="">
                                        @if ($errors->has('mobile_number'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('mobile_number') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if (count($errors) > 0)
                                        @foreach ($errors->all() as $message)
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @endforeach
                                    @endif --}}
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email"> <b>E-Mail Address</b> </label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if (count($errors) > 0)
                                        @foreach ($errors->all() as $message)
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @endforeach
                                    @endif --}}
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password"><b>Password</b>
                                            {{-- <a href="forgot.html" class="float-right">
											Forgot Password?
										</a> --}}
                                        </label>
                                        <input id="password" type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><b>Confirm Password</b></label>
                                        <input id="password-confirm"
                                                type="password"
                                                class="form-control"
                                                name="password_confirmation">
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Sign Up
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        Don't have an account? <a href="{{ url('register') }}">Create One</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>


    @push('js_plugin')
        <script type="text/javascript" src="{{ asset('frontend') }}/javascript/my-login.js"></script>
    @endpush
@endsection
