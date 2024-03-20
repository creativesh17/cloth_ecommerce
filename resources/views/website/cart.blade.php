@extends('layouts.website')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Cart</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="cart.html">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Color</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>
				<tbody>
					@php
						$discount = 0;
						$total = 0;
					@endphp
					@foreach($products as $product)
					<tr>
						<td>
							<div class="media">
								<div class="d-flex">
								<img width="80" src="{{asset('storage/products/'.$product->options->image)}}"
									alt=""
								/>
								</div>
								<div class="media-body">
								<p>{{ $product->name }}</p>
								</div>
							</div>
						</td>
						<td>
							<h5>{{ $product->price }}</h5>
						</td>
						<td>
							<div class="product_count">
							<input type="text" name="qty" id="sst{{$product->id}}" maxlength="12" value="{{ $product->qty }}" title="Quantity:" class="input-text qty"/>
								
								<button data-rowid="{{ $product->rowId }}" 
								onclick="var result = document.getElementById('sst{{$product->id}}'); 
										var sst = result.value; 
										if( !isNaN( sst ) &amp;&amp; sst < 12 ) result.value++;	
										return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i>
								</button>
								<button data-rowid="{{ $product->rowId }}" 
								onclick="var result = document.getElementById('sst{{$product->id}}'); 
										var sst = result.value; 
										if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;	
										return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i>
								</button>
							</div>
						</td>
						<td>
							<h5>{{ $product->options->color }}</h5>
						</td>
						<td>
							<h5>{{ $product->options->discount }}%</h5>
						</td>
						<td>
							<h5>{{ ($product->price * $product->qty) - ($product->price * $product->qty/100)*($product->options->discount) }}</h5>
						</td>
						<td>
							<button data-rowid="{{ $product->rowId }}" data-url="cart/remove" class="btn btn-danger btn-remove"><i class="fa fa-times"></i></button>
						</td>
					</tr>
					@php
						$discount += ($product->price * $product->qty/100)*($product->options->discount);
						
						$total += ($product->price * $product->qty) - ($product->price * $product->qty/100)*($product->options->discount);
					@endphp
					@endforeach
					<tr>
						<td scope="col"></td> 
						<td scope="col"></td>
						<td scope="col">Total Qty: {{ Cart::count() }}</td>
						<td scope="col"></td>
						<td scope="col">Discount: {{ $discount }} (TK)</td>
						<td scope="col">Total: {{ $total }}</td>
						<td></td>
					</tr>
				</tbody>
            </table>
		  </div>
		  <div class="float-right">
			<a href="{{ url('checkout') }}" class="btn btn-success">Continue To Checkout</a>
		  </div>
        </div>
	  </div>
    </section>
    <!--================End Cart Area =================-->

    
    
@endsection


{{-- config('cart.format.decimals') --}}
	{{-- @php
		$discount = 0;
	@endphp
	@foreach


	@php
		$discount += $product->options->discount * $product->qty;
	@endphp
	@endforeach
	<tr>
		<td scope="col"></td> 
		<td scope="col"></td>
		<td scope="col">Total Qty: {{ Cart::count() }}</td>
		<td scope="col">{{ $discount }}</td>
		<td scope="col"></td>
		<td scope="col"></td>
	</tr> --}}
	
	{{-- @php
	$thousand_separator = config('cart.format.thousand_separator');
	$thousand_separator = floatval(implode(explode(',',$thousand_separator))); 
	@endphp --}}