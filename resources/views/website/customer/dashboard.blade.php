@extends('layouts.website') @section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Customer Dashboard</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/customer') }}">Customer Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- ================ contact section start ================= -->
<section class="section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-6 mt-3">
                @include('website.customer.sidebar')
            </div>
            <div class="col-lg-3 col-sm-12 col-md-6 mt-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp;{{ $totalOrders }}</h5>
                        <p class="card-text">Total Orders</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <a href="javascript:void(0)">Go Somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-6 mt-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;{{ $totalActiveOrders }}</h5>
                        <p class="card-text">Active Orders</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <a href="javascript:void(0)">Go Somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-6 mt-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-times"></i>&nbsp;&nbsp;{{ $totalCancelledOrders }}</h5>
                        <p class="card-text">Cancelled Orders</p>
                        <p>Lorem ipsum dolor sit amet</p>
                        <a href="javascript:void(0)">Go Somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Contact Success and Error message Area =================-->

@endsection @push('js')
<!-- contact js -->
<script src="{{asset('contents/website')}}/js/jquery.form.js"></script>
<script src="{{asset('contents/website')}}/js/jquery.validate.min.js"></script>
<script src="{{asset('contents/website')}}/js/contact.js"></script>
@endpush