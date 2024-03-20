@extends('layouts.website') @section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Product Checkout</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="checkout.html">Product Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
				<form class="row contact_form" action="{{ url('checkout') }}" method="post" novalidate="novalidate">
					@csrf
					<div class="col-lg-7">
						<h3>Billing Details</h3>
							<div class="col-md-12 form-group p_star @error('ship_name') is-invalid @enderror">
								<input type="text" class="form-control" name="ship_name" placeholder="Full Name"/>
								@error('ship_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control"  name="ship_phone" placeholder="Phone number"/>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" name="ship_email" placeholder="Email Address"/>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="add1" name="ship_address" placeholder="Address"/>
							</div>
							<div class="col-md-12 form-group p_star">
								<select class="nice-select country_select" name="ship_country">
									<option value="">Country</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="USA">USA</option>
								</select>
							</div>
							<div class="col-md-12 form-group p_star">
								<select class="nice-select country_select" name="ship_city">
									<option value="">City</option>
									<option value="Dhaka">Dhaka</option>
									<option value="Chattogram">Chattogram</option>
									<option value="Noakhali">Noakhali</option>
									<option value="Rajshahi">Rajshahi</option>
								</select>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="zip" name="ship_zip" placeholder="Postcode/ZIP" />
							</div>
						</div>
						<div class="col-lg-5">
							<div class="order_box">
								@php
									$total = Cart::total();
									// $total = (float)preg_replace('/[^0-9]/i', '', $total);
									$total = str_replace( ',', '', $total);
									$total = sprintf('%0.2f', $total);
									// $total = number_format($total, 2); 
									// echo $total;
									// var_dump($total);
									$total = 0;
									foreach (Cart::content() as $product) {
										$total += ($product->price * $product->qty) - ($product->price * $product->qty/100)*($product->options->discount);
									}	
								@endphp
								<h2>Your Order</h2>
								<ul class="list">
									<li><a href="#">Product<span>Total</span></a></li>
									@foreach(Cart::content() as $product)
										<li><a href="#">{{ $product->name }} <span class="middle">x {{ $product->qty }}</span> <span class="last">Tk {{ $product->price * $product->qty }}</span></a>
										</li>
									@endforeach
								</ul>
								<ul class="list list_2">
									<li>
										<a href="#">
											Subtotal
											<span> Tk.
												{{ $total	 }}
											</span>
										</a>
									</li>
									<li>
										<a href="#">Shipping<span>Flat rate: Tk 50.00</span></a>
										<input type="hidden" name="shipcharge" value="50">
									</li>
									<li>
										<a href="#">Total
											<span> Tk.
												{{ $total + 50 }}
											</span>
										</a>
									</li>
								</ul>
								<div class="payment_item">
									<div class="radion_btn">
										<input type="radio" id="f-option5" name="payoption" value="cash"/>
										<label for="f-option5">Cash on Hand</label>
										<div class="check"></div>
									</div>
								</div>
								<div class="payment_item active">
									<div class="radion_btn">
										<input type="radio" id="f-option6" name="payoption" value="bank"/>
										<label for="f-option6">Bank </label>
										<img src="{{ asset('contents/website') }}/img/product/single-product/card.jpg" alt="" />
										<div class="check"></div>
									</div>
								</div>
								{{-- <div class="payment_item">
									<div class="radion_btn">
										<input type="radio" id="f-option5" name="payoption" value="paypal"/>
										<label for="f-option5">Paypal</label>
										<div class="check"></div>
									</div>
								</div>
								<div class="payment_item">
									<div class="radion_btn">
										<input type="radio" id="f-option5" name="payoption" value="stripe"/>
										<label for="f-option5">Stripe</label>
										<div class="check"></div>
									</div>
								</div> --}}
								<div class="creat_account">
									<input type="checkbox"  name="status" />
									<label for="f-option4">I’ve read and accept the </label>
									<a href="#">terms & conditions*</a>
								</div>
								<a class="main_btn" href="javascript:void(0)">Continue to Payment</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--================End Checkout Area =================-->
@endsection
@push('js')
	<script>
		$(function() {
			$(".main_btn").on("click", function(e) {
				e.preventDefault();
				$(".contact_form").submit();
			});
		});
	</script>
@endpush