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
            <div class="col-lg-9 col-sm-12 col-md-6 mt-3">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $key=>$order)
                            @foreach($order->products as $product)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price*$product->product_qty - ($product->product_price*$product->product_qty)/100 * $product->product_discount}}</td>
                                <td>{{ $product->product_qty }}</td>
                                <td>
                                    <a href="{{ url('/customer/orders/'.$order->id) }}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                                    @php
                                        $orderedTime = Carbon\Carbon::parse($order->created_at);
                                        $currentTime = Carbon\Carbon::parse(now());
                                        $totalTimeOver = $orderedTime->diffInMinutes($currentTime);
                                    @endphp
                                    @if($totalTimeOver < 120)
                                        <a href="{{ url('customer/orders/'.$order->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i></a>
                                        <span class="minutes{{$order->id}}"></span>
                                        <span class="seconds{{$order->id}}"></span>
                                        <div class="timer{{$order->id}}" data-time="{{ Carbon\Carbon::parse($order->created_at)->addMinutes(30) }}"></div>
                                        @push('js')
                                        <script>
                                            $(document).ready(function() {
                                                function makeTimer() {
                                                    var endTime = $(".timer{{$order->id}}").data('time');
                                                    // console.log(endTime);
                                                    endTime = (Date.parse(endTime) / 1000);
                                                    var now = new Date();
                                                    now = (Date.parse(now) / 1000);
                                                    var timeLeft = endTime - now;
                                                    var days = Math.floor(timeLeft / 86400);
                                                    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                                                    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                                                    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                                                    if (hours < "10") {
                                                        hours = "0" + hours
                                                    }
                                                    if (minutes < "10") {
                                                        minutes = "0" + minutes
                                                    }
                                                    if (seconds < "10") {
                                                        seconds = "0" + seconds
                                                    }
                                                    // $("#days").html(days + "<span>Days</span>");
                                                    // $("#hours").html(hours + "<span>Hours</span>");
                                                    $(".minutes{{ $order->id }}").html(minutes + "<span> : </span>");
                                                    $(".seconds{{ $order->id }}").html(seconds + "<span> </span>")
                                                }
                                                setInterval(function() {
                                                    makeTimer()
                                                }, 1000);

                                                document.oncontextmenu = function() {
                                                    return !1
                                                }
                                                document.onselectstart = function() {
                                                    return !1
                                                }
                                                document.onkeydown = function() {
                                                    return !1
                                                }
                                            });
                                        </script>
                                        @endpush
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @empty
                        <tr> 
                            <td colspan="4" class="text-center">No Orders Yet! </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('js')
<!-- contact js -->
<script src="{{asset('contents/website')}}/js/jquery.form.js"></script>
<script src="{{asset('contents/website')}}/js/jquery.validate.min.js"></script>
<script src="{{asset('contents/website')}}/js/countdown.jquery.js"></script>
<script src="{{asset('contents/website')}}/js/countdown.init.js"></script>
<script src="{{asset('contents/website')}}/js/contact.js"></script>
@endpush