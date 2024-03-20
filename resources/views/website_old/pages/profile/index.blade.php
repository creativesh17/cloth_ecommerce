@extends('website.layouts.app')
@section('content')

<div>
    {{-- Be like water. --}}
    <div class="account-area section-space">
        <div class="container">
            <div class="myaccount-page-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('website.pages.profile.sidemenu')
                    </div>

                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3>Dashboard</h3>
                                @if (session()->has('access_token'))
                                    <a class="btn btn-info my-3" data-turbolinks="false" href="/admin">go to dashboard</a>
                                @endif
                                <div class="welcome">
                                    <p>
                                        Hello,
                                        <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                                        (If Not <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>
                                        <a href="javascript:void(0)" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>)
                                    </p>
                                </div>
                                <p class="mb-0">From your account dashboard. you can easily check &amp; view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                            </div>
                        </div>
                    </div>

                    <script>
                        localStorage.setItem('token',`{{session()->get('access_token')}}`);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
