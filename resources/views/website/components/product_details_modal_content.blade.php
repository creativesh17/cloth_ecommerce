<div class="cart_product_view">
    <div>
        @if ($product->related_image->first())
            <img src="{{ asset($product->related_image->first()->image) }}" alt='' width='400' height='300' />
        @endif
    </div>
    <div>
        <div class="content-detail">
            <h3 class="product_name">{{ $product->product_name }}</h3>
            <div>
                <table class="table my-product-detail">
                    <tbody>
                        <tr>
                            <td>Product Price</td>
                            <td>{{ $product->sales_price }} ৳</td>
                        </tr>
                        <tr>
                            <td>Special Price</td>
                            <td>{{ $product->active_price }} ৳</td>
                        </tr>
                        <tr>
                            <td>Stock Status<br></td>
                            <td>
                                <span>
                                    @if ($product->is_in_stock == 1)
                                        In Stock
                                    @else
                                        Out of Stock
                                    @endif
                                </span>
                                <br>
                            </td>
                        </tr>
                        @if ($product->sku)
                            <tr>
                                <td>Product SKU</td>
                                <td>
                                    {{ $product->sku }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>Brand<br></td>
                            <td>
                                <a href="{{ route('productsByBrands', $product->brand->id) }}">
                                    {{ $product->brand->name }}
                                </a><br>
                            </td>
                        </tr>
                        @foreach ($varaintValues as $key => $variants)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>
                                    @foreach ($variants as $value)
                                        {{ $value->value->title }},
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>Warranty</td>
                            <td>
                                {{ $product->waranty_information }}
                                <br>
                            </td>
                        </tr>
                        <?php $totalRevs = \App\Models\ProductReview::where('product_id', $product->id)->count(); ?>
                        <tr>
                            <td>Total Reviews<br></td>
                            <td class="review-links">
                                {{ $totalRevs }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="price">
                @if ($product->discount && $product->discount['discount_last_date'] > Carbon\Carbon::now())
                    {{-- @if ($product->active_price) --}}
                    <div class="regular my-regular-price" style="float: left; margin-right: 10px;">
                        {{ $product->sales_price }} ৳
                    </div>
                    <div class="sale my-sale">
                        {{ $product->active_price }} ৳
                    </div>
                @else
                    <div class="sale my-sale">
                        {{ $product->sales_price }} ৳
                    </div>
                @endif
            </div>
        </div>

        <div class="product_cart_box variants">
            @foreach ($varaintValues as $key => $variants)
                <div class="colors">
                    <select name="variants[]" class="cart_select_variant">
                        <option value="">Select {{ $key }}</option>
                        @foreach ($variants as $value)
                            <option
                                value="{{ $key }}___{{ $value->value->title }}___{{ $value->value->id }}">
                                {{ $value->value->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
        <div class="product_cart_box">
            <div class="">
                <span class=""></span>
                <input type="number" class="cartQuantity" name="qty" value="1" min="1" max="100"
                    placeholder="Quanlity">
                <span class=""></span>
            </div>
            <div>
                @if ($product->is_in_stock > 0 && $product->stock != 0)
                    <div class="btn-add-cart">
                        <button type="submit" class="add_to_cart">
                            <img src="{{ asset('frontend') }}/images/icons/add-cart.png" alt="">
                            Add to Cart
                        </button>
                    </div>
                @endif
            </div>
        </div><!-- /.quanlity-box -->
    </div>
</div>
