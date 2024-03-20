@extends('layouts.website')


@section('content')

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
<section class="section_gap mt-4 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-6 mt-3">
                @include('website.customer.sidebar')
            </div>
            <div class="col-lg-9 col-sm-12 col-md-6 mt-3">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{ $customer->name }}</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="{{ url('customer/settings') }}" class="btn btn-primary stretched-link">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection