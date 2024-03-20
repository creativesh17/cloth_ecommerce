@extends('layouts.website')


@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Customer Orders</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/customer/dashboard') }}">Customer Dashboard</a>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price*$product->product_qty }}</td>
                            <td>{{ $product->product_qty }}</td>
                            <td>{{ $product->product_discount }}%</td>
                            <td>{{ $product->product_price*$product->product_qty -($product->product_price*$product->product_qty)/100 * $product->product_discount }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right"></td>
                            <td>Including Delivery Charge</td>
                            <td colspan="5">{{ $order->order_total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection