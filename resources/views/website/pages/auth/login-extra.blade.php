@extends('website.layouts.app',[
    'meta' => [
        "title" => "Sign In",
    ],
])


@section('content')

<section class="flat-account background">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="form-login">
                    <div class="title">
                        <h3>Login</h3>
                    </div>
                    <form action="#" method="get" id="form-login" accept-charset="utf-8">
                        <div class="form-box">
                            <label for="name-login">Username or email address * </label>
                            <input type="text" id="name-login" name="name-login" placeholder="Ali">
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <label for="password-login">Password * </label>
                            <input type="text" id="password-login" name="password-login" placeholder="******">
                        </div><!-- /.form-box -->
                        <div class="form-box checkbox">
                            <input type="checkbox" id="remember" checked name="remember">
                            <label for="remember">Remember me</label>
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <button type="submit" class="login">Login</button>
                            <a href="#" title="">Lost your password?</a>
                        </div><!-- /.form-box -->
                    </form><!-- /#form-login -->
                </div><!-- /.form-login -->
            </div><!-- /.col-md-6 -->

        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.flat-account -->



@endsection
