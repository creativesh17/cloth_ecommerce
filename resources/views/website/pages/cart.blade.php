@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Cart',
    ],
])


@php
    $subtotal = 0;
    $shippingCharge = 50;
@endphp
@section('content')
    
    @include('website.layouts.partials.breadcrumb')

    <section class="flat-shop-cart">
        <div class="container">
            <div class="row cart-inner">
                <div class="col-lg-8">
                    <div class="flat-row-title style1">
                        <h3>Shopping Cart</h3>
                    </div>
                    <div class="table-cart mCustomScrollbar _mCS_1 mCS_no_scrollbar">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside"
                            style="max-height: none;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x"
                                style="position: relative; top: 0px; left: 0px; width: 464px; min-width: 100%; overflow-x: inherit;"
                                dir="ltr">
                                <form action="{{ url('/cart/update') }}" method="POST">
                                    @csrf
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $key => $product)
                                                @php
                                                    $subtotal += $product->qty * $product->price;
                                                @endphp
                                                <input type="hidden" name="product[{{ $key }}][rowId]"
                                                    value="{{ $product->rowId }}">
                                                <input type="hidden" name="product[{{ $key }}][id]"
                                                    value="{{ $product->id }}">
                                                <tr>
                                                    <td>
                                                        <div class="img-product">
                                                            <img src="{{ $product->options->image }}" alt=""
                                                                class="mCS_img_loaded">
                                                        </div>
                                                        <div class="name-product">
                                                            {{ $product->name }}
                                                        </div>
                                                        <div class="price">
                                                            {{ $product->price }} ৳
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </td>
                                                    <td>
                                                        <div class="quanlity product_count">
                                                            {{-- <span class="btn-down"></span> --}}
                                                            {{-- <span class="btn-up"></span> --}}
                                                            <input type="number" name="product[{{ $key }}][qty]"
                                                                value="{{ $product->qty }}" min="1" max="100"
                                                                class="" placeholder="Quanlity">

                                                            {{-- <div class="product_count">
                                                            <input type="text" name="qty" id="sst{{ $product->id }}" maxlength="12" value="{{ $product->qty }}" title="Quantity:" class="input-text qty"/>
                                                        </div> --}}

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="total">
                                                            {{ $product->price * $product->qty }} ৳
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('cart/remove/'.$product->rowId) }}" title="">
                                                            <img src="{{ asset('frontend') }}/images/icons/delete.png"
                                                                alt="" class="mCS_img_loaded">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-info" title="">Update Cart</button>
                                    </div>
                                </form>

                                {{-- <div class="form-coupon">
                                    <form action="#" method="get" accept-charset="utf-8">
                                        <div class="coupon-input">
                                            <input type="text" name="coupon code"
                                                placeholder="Coupon Code">
                                            <button type="submit">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div><!-- /.form-coupon --> --}}
                            </div>
                            <div id="mCSB_1_scrollbar_horizontal"
                                class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_horizontal"
                                style="display: none;">
                                <div class="mCSB_draggerContainer">
                                    <div id="mCSB_1_dragger_horizontal" class="mCSB_dragger"
                                        style="position: absolute; min-width: 30px; width: 0px; left: 0px;">
                                        <div class="mCSB_dragger_bar"></div>
                                    </div>
                                    <div class="mCSB_draggerRail"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.table-cart -->
                </div><!-- /.col-lg-8 -->

                <div class="col-lg-4">
                    <div class="cart-totals">
                        <h3>Cart Totals</h3>
                        <form action="#" method="get" accept-charset="utf-8">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="subtotal">{{ $subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td class="btn-radio">
                                            <div class="">
                                                {{-- <input type="radio" id="flat-rate" checked="" name="radio-flat-rate"> --}}
                                                 <span >Flat Rate: <span id="flatrate">{{ $shippingCharge }}</span> Taka</span>
                                            </div>
                                            <div class="radio-info">
                                                <input type="radio" id="inside_dhaka" name="radio-flat-rate" value="50" onclick="setFlat(50);" checked>
                                                <label for="inside_dhaka"><span>Inside Dhaka</span></label>
                                            </div>
                                            <div class="radio-info">
                                                <input type="radio" id="outside_dhaka" name="radio-flat-rate" value="100" onclick="setFlat(100);">
                                                <label for="outside_dhaka"><span>Outside Dhaka</span></label>
                                            </div>
                                            {{-- <div class="btn-shipping">
                                                <a href="#" title="">Calculate Shipping</a>
                                            </div> --}}
                                        </td><!-- /.btn-radio -->
                                    </tr>
                                    <tr>
                                        @php
                                            $total = $subtotal + $shippingCharge;
                                        @endphp
                                        <td>Total</td>
                                        <td class="price-total" >{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            {{-- @auth --}}
                            <div class="btn-cart-totals">
                                <a href="{{ url('/checkout') }}" class="checkout" title="">Proceed to Checkout</a>
                            </div><!-- /.btn-cart-totals -->
                            {{-- @endauth --}}

                        </form><!-- /form -->
                    </div><!-- /.cart-totals -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>




    <section class="flat-row flat-iconbox style3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/car.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Worldwide Shipping</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/order.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Order Online Service</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/payment.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Payment</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6">
                    <div class="iconbox style1">
                        <div class="box-header">
                            <div class="image">
                                <img src="{{ asset('frontend') }}/images/icons/return.png" alt="">
                            </div>
                            <div class="box-title">
                                <h3>Return 30 Days</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.box-header -->
                    </div><!-- /.iconbox -->
                </div><!-- /.col-lg-3 col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-iconbox -->
@endsection

@push('js_plugin')
<script>

    // var flatrate = document.querySelector('[name="radio-flat-rate"]');
    // // alert(target);
    // console.log(flatrate.value);
    // subtotal 250         50 (100)             total 300  =  350
    function setFlat(value) {
        // $("#flatrate").text(value);

        var subTotal = document.querySelectorAll('.subtotal')[0].innerText
        var grandTotal = Number(subTotal) + Number(value)
        var element = document.querySelectorAll('.price-total')[0]
        element.innerText = grandTotal;

    }



</script>
@endpush
