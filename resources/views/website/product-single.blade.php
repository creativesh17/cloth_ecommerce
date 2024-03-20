@extends('layouts.website') 
@section('content')

@php
    function rating_star($rating, $forStar) {
        $class = $rating >= $forStar ? 'fa fa-star':'fa fa-star fa-custom';

        if(fmod($rating, 1) === 0.0) {
            return $class;
        }

        if(is_float($rating) && ceil($rating) === (float)$forStar) {
            $class = 'fa fa-star-half-o';
        }

        return $class;
    }
@endphp
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Product Details</h2>
                    <p>Very us move be blessed multiply night</p>
                </div>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="single-product.html">Product Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
							@foreach($product->files as $key=>$image)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" @if($key + 1 == 1) class="active" @endif>
                                <img width="60" height="60" src="{{ asset('storage/products/'.$image->image) }}" alt="" />
							</li>
							@endforeach
                        </ol>
                        <div class="carousel-inner">
							@foreach($product->files as $key=>$image)
                            <div class="carousel-item {{ ($key + 1 == 1 ) ? ' active':'' }}">
                                <img class="d-block w-100" src="{{ asset('storage/products/'.$image->image) }}" alt="First slide" />
							</div>
							@endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    @if($product->product_stock == 0)
                        
                    @else
                    <form action="{{ url('cart/add/'.$product->product_slug) }}" method="post" data-type="JSON" id="addCart">
                        @csrf
                        <h3>{{ $product->product_name }}</h3>
                        <h2>Tk {{ $product->product_price - (($product->product_price / 100) * $product->product_discount) }}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> : {{ $product->subcategories()->with('category')->get()->pluck('category')->first()->cate_name }}</a>
                            </li>
                            <li>
                                @if($product->product_stock >= 1)
                                <a href="#"> <span>Availibility</span> : In Stock</a>
                                @else
                                <a href="#" class="text-danger"> <span>Availibility</span> : Out of Stock</a>
                                @endif
                            </li>
                        </ul>
                        <p>
                            {{ $product->product_description }}
                        </p>
                        @foreach ($product->colors as $key=>$color)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="color" id="inlineRadio1" value="{{ $color->color_name }}" {{ $key == 0 ? 'checked':''}}>
                            <label class="form-check-label" for="inlineRadio1">{{ $color->color_name }}</label>
                        </div>
                        @endforeach
                        <hr>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" minlength="1" value="1" title="Quantity:" class="input-text qty" />
                            
                            <button onclick="var result = document.getElementById('sst'); 
                                            var sst = result.value; 
                                            if( !isNaN( sst ) &amp;&amp; sst < 12) result.value++; return false;" class="increase items-count" type="button">
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                            
                            <button onclick="var result = document.getElementById('sst'); 
                                            var sst = result.value; 
                                            if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;" class="reduced items-count" type="button">
                                <i class="lnr lnr-chevron-down"></i>
                            </button>
                        </div>
                        
                        <div class="card_area">
                            <button class="main_btn" type="submit">Add to Cart</button>
                            <a class="icon_btn" href="#">
                                <i class="lnr lnr lnr-diamond"></i>
                            </a>
                            <a class="icon_btn" href="#">
                                <i class="lnr lnr lnr-heart"></i>
                            </a>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
			</li>
        </ul>
        <div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p>{{ $product->product_description }}</p>
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="table-responsive">
				{!! $product->product_feature !!}}
				</div>
			</div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
              <div class="col-lg-6">
                <div class="comment_list">
                  <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img
                          src="{{ asset('contents/website') }}/img/product/single-product/review-1.png"
                          alt=""/>
                      </div>
                      <div class="media-body">
                        <h4>Blake Ruiz</h4>
                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                        <a class="reply_btn" href="#">Reply</a>
    				  </div>
   					 </div>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    </p>
    </div>
    <div class="review_item reply">
        <div class="media">
            <div class="d-flex">
                <img src="{{ asset('contents/website') }}/img/product/single-product/review-2.png" alt="" />
            </div>
            <div class="media-body">
                <h4>Blake Ruiz</h4>
                <h5>12th Feb, 2017 at 05:56 pm</h5>
                <a class="reply_btn" href="#">Reply</a>
            </div>
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        </p>
    </div>
    <div class="review_item">
        <div class="media">
            <div class="d-flex">
                <img src="{{ asset('contents/website') }}/img/product/single-product/review-3.png" alt="" />
            </div>
            <div class="media-body">
                <h4>Blake Ruiz</h4>
                <h5>12th Feb, 2017 at 05:56 pm</h5>
                <a class="reply_btn" href="#">Reply</a>
            </div>
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        </p>
    </div>
    </div>
    </div>
    <div class="col-lg-6">
        <div class="review_box">
            <h4>Post a comment</h4>
            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn submit_btn">
                        Submit Now
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
            <div class="col-lg-6">
                <div class="row total_rate">
                    <div class="col-6">
                        <div class="box_total">
                            <h5>Overall</h5>
                            <h4>{{ number_format($product->reviews->avg('rating'), 2) }}</h4>
                            <h6>(0{{ $product->reviews->count() }} Reviews)</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="rating_list">
                            <h3>Based on 3 Reviews</h3>
                            <ul class="list">
                                <li>
                                    <a href="#">5/4.5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> {{ $product->reviews()->where([['rating', '>=', 4.5]])->count() }}</a
                          >
                        </li>
                        <li>
                          <a href="#"
                            >4/3.5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star fa-custom"></i> {{ $product->reviews()->where([
                                ['rating', '>=', 3.5],
                                ['rating', '<=', 4],
                                ])->count() }}
                          </a>
                        </li>
                        <li>
                          <a href="#"
                            >3/2.5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star fa-custom"></i>
                            <i class="fa fa-star fa-custom"></i>
                            {{ $product->reviews()->where([
                                ['rating', '>=', 2.5],
                                ['rating', '<=', 3],
                                ])->count() }}
                          </a>
                        </li>
                        <li>
                          <a href="#"
                            >2/1.5 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star fa-custom"></i>
                            <i class="fa fa-star fa-custom"></i>
                            <i class="fa fa-star fa-custom"></i> 
                            {{ $product->reviews()->where([
                                ['rating', '>=', 1.5],
                                ['rating', '<=', 2],
                                ])->count() }}
                          </a>
                        </li>
                        <li>
                          <a href="#"
                            >1 Star
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> 
                            {{ $product->reviews()->where([
                                ['rating', '=', 1]])->count() }}
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="review_list">
					@foreach($product->reviews as $review)
						<div class="review_item">
							<div class="media">
								<div class="d-flex">
									<img
									src="{{ asset('contents/website') }}/img/product/single-product/review-1.png"
									alt=""
									/>
								</div>
							<div class="media-body">
                                <h4>{{ $review->name }}</h4>
                                
                                @include('layouts.partials.rating', ['rating' => $review->rating])
                                
							</div>
						</div>
                    	<p>{{ $review->review }}</p>
					</div>
					@endforeach
                </div>
              </div>
              <div class="col-lg-6">
                <div class="review_box">
					@guest
					<h4 class="text-center"><a href="{{ url('login') }}">Please log in first to add review</a></h4>
					@else
                    <h4>Add a Review</h4>
                    <form action="{{ url('product/review/'.$product->product_slug) }}" method="post" id="better-rating-form">
                        @csrf
                        <input class="form-control" type="text" name="name" placeholder="Your Name" id="" required>
                        <div class="rating">
                            <i class="fa fa-star" data-rate="1"></i>
                            <i class="fa fa-star" data-rate="2"></i>
                            <i class="fa fa-star" data-rate="3"></i>
                            <i class="fa fa-star" data-rate="4"></i>
                            <i class="fa fa-star" data-rate="5"></i>
                            <input type="hidden" id="rating-count" name="rating" value="0">
                        </div>
                        <textarea class="form-control" name="review" id="" cols="30" rows="6" required></textarea>
                        <button class="btn btn-success btn-block mt-3" type="submit">Submit</button>
					</form>
					@endguest
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



{{-- data-type="JSON"
var datatype = $(this).data("type");
datatype: datatype, --}}
{{-- <button class="main_btn {{ $product->product_stock == 0 ? 'opacity-less':'' }}" type="submit" {{ $product->product_stock == 0 ? 'disabled':'' }}>Add to Cart</button> --}}