@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Sign Up',
    ],
])


@section('content')

<section class="flat-account background">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="form-register">
                    <div class="title">
                        <h3>Register</h3>
                    </div>
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="form-box{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name"><b>First Name*</b> </label>
                            <input type="text" id="first_name" name="first_name">
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div><!-- /.form-box -->
                        <div class="form-box{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                            <label for="mobile_number"><b>Mobile Number *</b> </label>
                            <input type="text" id="mobile_number" name="mobile_number">
                            @if ($errors->has('mobile_number'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                </span>
                            @endif
                        </div><!-- /.form-box -->
                        <div class="form-box{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email"><b>Email Address * </b></label>
                            <input type="email" id="email" name="email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div><!-- /.form-box -->

                        <div class="form-box{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"><b>Password</b></label>
                            <input type="password" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <label for="password"><b>Confirm Password</b></label>
                            <input type="password" id="password-confirm" name="password-confirm">
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <button type="submit" class="register">Sign Up</button>
                        </div><!-- /.form-box -->
                    </form><!-- /#form-register -->
                </div><!-- /.form-register -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.flat-account -->

@endsection
