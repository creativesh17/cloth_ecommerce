<div class="show_cart_list_icon" onclick="toggle_canvas()">
    <i class="fa fa-shopping-cart"></i>
    <span class="title">CART</span>
    <span class="amount" id="cart_count_at_a_glance">0</span>
</div>
<div class="cart_canvas" id="cart_canvas">
    <div class="overlay" onclick="toggle_canvas()"></div>
    <div class="cart_list" @mouseover="get_cart" >
        <div class="header">
            <h4>Your Cart</h4>
            <i class="fa close_cart fa-times text-light" onclick="toggle_canvas()"></i>
        </div>
        <div class="body custom_scroll">
            <div class="cart_product_list">
                <template v-for="(product, index) in cart" >
                    <div class="cart_product_item" :key="product.id">
                        <div class="left">
                            <img :src="`${product.image}`" alt="">
                        </div>
                        <div class="right">
                            <div class="top">
                                <h4>@{{product.product_name}}</h4>
                                <div class="cart_remove">
                                    <i @click="remove_product(index)" class="fa fa-trash"></i>
                                </div>
                            </div>
                            <div class="bottom">
                                <div>@{{product.sales_price}} ৳ x</div>
                                <div> <input type="number" v-model="product.qty" > = </div>
                                <div>@{{product.sales_price * product.qty}} ৳</div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <div class="footer">
            <div class="item">
                <div class="title d-flex justify-content-between">
                    <div class="left">
                        {{-- <a href="/shop" class="text-dark">প্রোডাক্ট সমূহ দেখুন</a> --}}
                    </div>
                    <div class="right">Total</div>
                </div>
                <div class="amount">@{{total_cart_price}} ৳</div>
            </div>
            <div class="checkout">
                <a href="/checkout">Checkout</a>
            </div>
        </div>
    </div>
</div>
