<div class="box-suggestions">
    <ul>
        @forelse ($products as $product)
        <li>
            <div class="image">
                <img src="{{ $product->photo_url }}"
                    alt="">
            </div>
            <div class="info-product">
                <div class="name">
                    <a href="{{ route('product_details_page', $product->id) }}" title="">
                        {{ $product->product_name }}
                    </a>
                </div>
                <div class="price">
                    @if ($product->discount && $product->discount['discount_last_date'] > Carbon\Carbon::now())
                        <i class="old_price">
                            {{ $product->sales_price }} ৳
                        </i>
                        <i class="running_price">
                            {{ $product->active_price }} ৳
                        </i>
                    @else
                        <i class="running_price">
                            {{ $product->sales_price }} ৳
                        </i>
                    @endif
                </div>
            </div>
        </li>            
        @empty
            <div>No such products</div>
        @endforelse
    </ul>

    <div class="search-item">
        <a href="{{ url('/product/search/page?search') }}">
            See all results
        </a>
    </div>


</div>
