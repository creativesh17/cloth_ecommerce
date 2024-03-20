
<div>
    @if (isset($product))
        @php
            try {
                $data = [
                    "id" => $product->id,
                    "product_name" => \Illuminate\Support\Str::slug($product->product_name)
                ];
            } catch (\Throwable $th) {
                //throw $th;
                // dd($product);
            }

        @endphp

        <div class="product-item">
            <div class="top">
                <a class="product-item-thumb" href="/{{ $product->product_url }}">
                    @if (count($product->related_images) > 0 && isset($product->related_images[0]['image']))
                        <img src="{{ asset($product->related_images[0]['image']) }}"
                        alt="{{ $product->product_name }}">
                    @endif
                </a>
                @if (isset($product->discounts['discount_percent']) && $product->discounts['discount_percent'] > 0)
                    <span class="badges">-{{ $product->discounts['discount_percent'] }}%</span>
                @endif
                {{-- <div class="product-item-action">
                    <button type="button" type="button" onclick="showQuickView({{ $product->id }})" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal" class="product-action-btn action-btn-quick-view">
                        <i class="icon-magnifier"></i>
                    </button>
                </div> --}}
                <div class="product-item-info text-center">
                    <h4 class="product-item-title">
                        {{-- <a href="{{ route('product_details', $data) }}">{{ $product->product_name }}</a> --}}
                        <a href="/{{ $product->product_url }}">{{ $product->product_name }}</a>
                    </h4>
                </div>

                <div class="short_description">
                    {!! $product->short_description !!}
                </div>
            </div>
            <div class="mid">

            </div>
            <div class="bottom">
                <div class="d-flex justify-content-center">
                    <div class="product-item-price text-center">

                        @if(!is_null($product->brand) && $product->brand)
                            <h5 class="product-item-brand">
                                <a href="#">{{ $product->brand['name'] }}</a>
                            </h5>
                        @endif
                            {{-- <div class="product-item-price mb-0">{{ $product->sales_price }}<span class="price-old">{{ $product->sales_price }}</span></div> --}}

                        @if ($product->discount && isset($product->discount['discount_percent']) && $product->discount['discount_percent'] > 0 && $product->discount['discount_last_date'] > Carbon\Carbon::now())
                            <div class="d-block">
                                <del class="price-old">{{ number_format($product->sales_price) }} ৳</del>
                            </div>
                            <div class="d-block">
                                <span>{{ number_format($product->sales_price-$product->discount['discount_amount']) }} ৳</span>
                            </div>
                        @else
                            <div class="product_price_amount">
                                @if (is_numeric($product->sales_price))
                                    {{ number_format($product->sales_price) }} ৳
                                @else
                                    {{ $product->sales_price }}
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    @if($product->is_upcomming)
                        <button type="button" disabled class="btn_add_to_cart">Up comming</button>
                    @elseif ($product->is_tba)
                        <button type="button" disabled class="btn_add_to_cart">TBA</button>
                    @elseif ($product->is_pre_order)
                        <button type="button" disabled class="btn_add_to_cart">Pre Order</button>
                    @elseif (!$product->is_in_stock)
                        <button type="button" disabled class="btn_add_to_cart">Out of stock</button>
                    @else
                        <button type="button"
                            onclick="vue_controller.methods.add_to_cart({
                                id: {{$product->id}},
                                product_name: `{{$product->product_name}}`,
                                photo_url: `{{ asset($product->related_images[0]['image']) }}`,
                                sales_price: {{$product->active_price}},
                                product_url: `{{$product->product_url}}`,
                            })"
                            class="btn_add_to_cart shape_box1">
                            <i class="fa fa-shopping-cart"></i>
                            Buy Now
                        </button>
                    @endif

                </div>
            </div>
        </div>

    @endif
</div>


