@extends('website.layouts.app',[
    'meta' => [
        "title" => "Sign In",
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
				<div class="card-wrapper"><div><br></div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Sign In</h4>
							<form action="{{ url('login') }}" method="POST">
                                @csrf
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email"> <strong>E-Mail Address</strong> </label>
									<input id="email" type="email" class="form-control" name="email" value="" >
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <b>{{ $errors->first('email') }}</b>
                                        </span>
                                    @endif
                                    {{-- @if(count($errors) > 0)
                                        @foreach( $errors->all() as $message )
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button>
                                                <span>{{ $message }}</span>
                                            </div>
                                        @endforeach
                                    @endif --}}
								</div>

								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password"><strong>Password</strong>
										{{-- <a href="forgot.html" class="float-right">
											Forgot Password?
										</a> --}}
									</label>
									<input id="password" type="password" class="form-control" name="password" >
								    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <b>{{ $errors->first('password') }}</b>
                                        </span>
                                    @endif
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Sign In
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{ url('register') }}">Create One</a>
								</div>
								{{-- <div class="mt-4 text-center">
									<a href="{{ url('forget/password') }}">Forgot Password ?</a>
								</div> --}}
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
