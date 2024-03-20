@extends('website.layouts.app', [
    'meta' => [
        'title' => 'Checkout',
    ],
])
@push('css_plugin')
    <style>

    </style>
@endpush
@php
    $storePickup = 0;
    $subtotal = 0;
@endphp
@section('content')
    
    @include('website.layouts.partials.breadcrumb')

    <section class="flat-checkout">
        <div class="container">
            <form action="{{ url('/checkout') }}" method="POST" class="checkout" accept-charset="utf-8">
            @csrf
            <div class="row">
                    <div class="col-md-7">
                        <div class="box-checkout">
                            <h3 class="title">Checkout</h3>
                            <div class="checkout-login">
                                <a href="{{ url('/login') }}" title="">Click here to login</a> OR
                                <a href="{{ url('/register') }}" title="">Create an account?</a>
                            </div>

                            <div class="billing-fields">
                                <div class="fields-title">
                                    <h2>Customer Information</h2>
                                    <span><br></span>
                                    <div class="clearfix"></div>
                                </div><!-- /.fields-title -->
                                <div class="fields-content">
                                    <div class="field-row p_star {{ $errors->has('ship_name') ? ' has-error' : '' }}">
                                        <p class="field-one-half">
                                            <label for="ship_name">Full Name *</label>
                                            <input type="text" id="ship_name" name="ship_name" value="{{ old('ship_name') }}" placeholder="Ali Khan">
                                            @if ($errors->has('ship_name'))
                                                <span class="invalid-feedback">
                                                    <b>{{ $errors->first('ship_name') }}</b>
                                                </span>
                                            @endif
                                        </p>
                                        {{-- <p class="field-one-half">
                                        <label for="last-name">Last Name *</label>
                                        <input type="text" id="last-name" name="last-name" placeholder="Tufan">
                                    </p> --}}
                                        {{-- <div class="clearfix"></div> --}}
                                    </div>
                                    <div class="field-row{{ $errors->has('ship_email') ? ' has-error' : '' }}">
                                        <p class="field-one-half">
                                            <label for="ship_email">Email Address *</label>
                                            <input type="email" id="ship_email" name="ship_email" value="{{ old('ship_email') }}">
                                            @if ($errors->has('ship_email'))
                                                <span class="invalid-feedback">
                                                    <b>{{ $errors->first('ship_email') }}</b>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="field-row{{ $errors->has('ship_phone') ? ' has-error' : '' }}">
                                        <p class="field-one-half">
                                            <label for="ship_phone">Phone *</label>
                                            <input type="text" id="ship_phone" name="ship_phone" value="{{ old('ship_phone') }}">
                                            @if ($errors->has('ship_phone'))
                                                <span class="invalid-feedback">
                                                    <b>{{ $errors->first('ship_phone') }}</b>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="clearfix"></div><br>

                                    <div class="field-row{{ $errors->has('ship_address') ? ' has-error' : '' }}">
                                        <label for="ship_address">Address *</label>

                                        {{-- <input type="text" id="address" name="address" placeholder="Street address">
                                    <input type="text" id="address-2" name="address" placeholder="Apartment, suite, unit etc. (optional)"> --}}

                                        <textarea id="add1" name="ship_address" placeholder="Address" class="form-control">{{ old('ship_address') }}</textarea>
                                        @if ($errors->has('ship_address'))
                                            <span class="invalid-feedback">
                                                <b>{{ $errors->first('ship_address') }}</b>
                                            </span>
                                        @endif
                                    </div>

                                </div><!-- /.fields-content -->
                            </div><!-- /.billing-fields -->
                        </div><!-- /.box-checkout -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="cart-totals style2">
                            <h3>Your Order</h3>

                            <table class="product">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Total</th>
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
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }} ৳ x {{ $product->qty }}</td>
                                            <td>{{ $product->price * $product->qty }} ৳</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- /.product -->
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="subtotal">{{ $subtotal }}</td>
                                    </tr>

                                    <tr>
                                        <td>Shipping</td>
                                        <td class="btn-radio">
                                            <div class="">
                                                {{-- <input type="radio" id="flat-rate" checked="" name="radio-flat-rate"> --}}
                                                {{-- <span>Flat Rate: <span id="flatrate">{{ $shippingCharge }}</span>
                                                    Taka</span> --}}
                                            </div>
                                            <div class="radio-info">
                                                <input type="radio" id="store_pickup" name="shipping_method"
                                                    value="store_pickup" onclick="setFlat({{ $storePickup }});">
                                                <label for="store_pickup"><span>Store Pickup</span></label>
                                            </div>
                                            <div class="radio-info">
                                                <input type="radio" id="inside_dhaka" name="shipping_method"
                                                    value="inside_dhaka"
                                                    onclick="setFlat({{ $home_delivery_value }});" checked>
                                                <label for="inside_dhaka"><span>Inside Dhaka</span></label>
                                            </div>
                                            <div class="radio-info">
                                                <input type="radio" id="outside_dhaka" name="shipping_method"
                                                    value="outside_dhaka"
                                                    onclick="setFlat({{ $outside_dhaka_value }});">
                                                <label for="outside_dhaka"><span>Outside Dhaka</span></label>
                                            </div>
                                            {{-- <div class="btn-shipping">
                                            <a href="#" title="">Calculate Shipping</a>
                                        </div> --}}
                                        </td><!-- /.btn-radio -->
                                    </tr>

                                    <tr>
                                        @php
                                            $total = $subtotal + $home_delivery_value;
                                        @endphp
                                        <td>Total</td>
                                        <td class="price-total">{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-radio style2">
                                <div class="radio-info">
                                    <p>Check Payments</p>
                                </div>
                                <div class="radio-info">
                                    <input type="radio" id="cash-delivery" name="payoption" value="cash" checked>
                                    <label for="cash-delivery">Cash on Delivery</label>
                                </div>
                                <div class="radio-info">
                                    <input type="radio" id="paypal" name="payoption" value="paypal">
                                    <label for="paypal">bKash</label>
                                </div>
                            </div><!-- /.btn-radio style2 -->
                            <div class="checkbox">
                                <input type="checkbox" id="checked-order" name="checked-order" checked>
                                <label for="checked-order">I’ve read and accept the terms & conditions *</label>
                            </div><!-- /.checkbox -->
                            <div class="btn-order">
                                <button type="submit" class="order btn btn-success" title="">Place Order</button>
                            </div><!-- /.btn-order -->

                        </div><!-- /.cart-totals style2 -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </form>
        </div><!-- /.container -->
    </section><!-- /.flat-checkout -->

    <section class="flat-row flat-iconbox style5">
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
        function setFlat(value) {
            // $("#flatrate").text(value);

            var subTotal = document.querySelectorAll('.subtotal')[0].innerText
            // console.log(subTotal);
            var grandTotal = Number(subTotal) + Number(value)
            // console.log(grandTotal);
            var element = document.querySelectorAll('.price-total')[0]
            element.innerText = grandTotal;

        }
    </script>
@endpush
