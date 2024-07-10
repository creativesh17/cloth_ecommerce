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
        <form action="{{ url('/cart/update') }}" method="POST">
            <div class="row cart-inner">
                <div class="col-lg-8">
                    <div class="flat-row-title style1 d-flex justify-content-between">
                        <h3>Shopping Cart</h3>
                        @if ($cartItems)
                            <button type="submit" class="btn btn-info" title="">Update Cart</button>    
                        @endif
                    </div>
                    <div class="table-cart mCustomScrollbar ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside"
                            style="max-height: none;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x"
                                style="position: relative; top: 0px; left: 0px; width: 464px; min-width: 100%; overflow-x: inherit;"
                                dir="ltr">
                                
                                    @csrf
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th class="cart-show-page">Quantity</th>
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
                                                        <div class="d-flex gap-3">
                                                            <div class="img-product">
                                                                <img src="{{ $product->options->image }}" alt="" class="mCS_img_loaded" />
                                                            </div>
                                                            <div>
                                                                <div class="name-product name-product-size">
                                                                {{ $product->name }}
                                                                    @if($product->options->v_titles) @foreach ($product->options->v_titles as $title) - {{ $title }}
                                                                    @endforeach
                                                                    @endif
                                                                </div>
                                                                <div class="text-dark font-bold">
                                                                    <b>
                                                                        {{ number_format($product->price) }} ৳
                                                                    </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="quanlity product_count product_count_size">
                                                            <input type="number" name="product[{{ $key }}][qty]" value="{{ $product->qty }}" min="1" max="100" class="" placeholder="Quanlity" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="total total-cart" style="white-space: nowrap;">
                                                            {{ number_format($product->price * $product->qty) }} ৳
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('cart/remove/'.$product->rowId) }}" title="">
                                                            <img src="{{ asset('frontend') }}/images/icons/delete.png" alt="" class="mCS_img_loaded" />
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($cartItems)
                                    <div class="d-flex justify-content-end mt-2">
                                        <button type="submit" class="btn btn-info" title="">Update Cart</button>
                                    </div>
                                    @endif
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
                        <h3>Cart Total</h3>
                        <form action="#" method="get" accept-charset="utf-8">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="subtotal" id="subtotal" data-subtotal="{{ $subtotal }}">
                                            {{ number_format($subtotal) }} ৳
                                        </td>
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
                                        <td class="price-total">
                                            <span id="s-price-total">{{ number_format($total) }}</span> ৳
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            {{-- @auth --}}
                            <div class="btn-cart-totals">
                                <a href="{{ url('/checkout') }}" class="btn btn-info checkout" title="">Proceed to Checkout</a>
                            </div><!-- /.btn-cart-totals -->
                            {{-- @endauth --}}

                        </form><!-- /form -->
                    </div><!-- /.cart-totals -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </form>
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

        var subTotal = document.getElementById("subtotal").dataset.subtotal;  
        // console.log(subTotal);
        // var subTotal = document.querySelectorAll('.subtotal')[0].innerText
        var grandTotal = Number(subTotal) + Number(value)
        var element = document.querySelector('#s-price-total')
        var setGrandTotal = new Intl.NumberFormat().format(grandTotal)
        element.innerText = setGrandTotal;
        

    }



</script>
@endpush
