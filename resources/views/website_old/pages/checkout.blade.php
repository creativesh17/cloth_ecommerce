@extends('website.layouts.app',[
'meta' => [
"title" => "Checkout",
],
])
@section('content')
<main class="main-content">
    <section class="bread_cumb_section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/"><i class="fa fa-home" title="Home"></i></a>
                </li>
                <li>
                    <a href="#">
                        <span>checkout</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="bg-bt-gray p-tb-15 my-5 checkout-content" id="checkout_page">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="page-section shape_box7 ws-box">
                        <div class="section-head">
                            <h2><span>1</span>Customer Information</h2>
                        </div>
                        <div class="address">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label" for="input-firstname">Full Name *</label>
                                    <input class="form-control" v-model="checkout_info.full_name"
                                        name="full_name" type="text" placeholder="Full Name*"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-address">Full Address *</label>
                                <textarea v-model="checkout_info.address" id="address" name="address" class="form-control"
                                    placeholder="Address*"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="input-telephone">Mobile *</label>
                                <input type="tel" v-model="checkout_info.mobile_number" id="mobile_number" name="mobile_number"  class="form-control"
                                    placeholder="Telephone*">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Comment</label>
                                <textarea class="form-control" v-model="checkout_info.comment" name="comment"  placeholder="Comment"
                                    rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12  delivery-methods">
                            <div class="page-section shape_box7 ws-box">
                                <div class="section-head">
                                    <h2><span>3</span>Delivery Method</h2>
                                </div>

                                <p>Select a delivery method</p>
                                <label class="radio-inline">
                                    <input type="radio" checked name="shipping_method" value="inside_dhaka" v-model="checkout_info.shipping_method">
                                    Inside Dhaka - 60৳
                                </label>
                                <br>

                                <label class="radio-inline">
                                    <input type="radio" name="shipping_method" value="store_pickup" v-model="checkout_info.shipping_method">
                                    Store Pickup - 0৳
                                </label>
                                <br>

                                <label class="radio-inline">
                                    <input type="radio" name="shipping_method" value="outside_dhaka" v-model="checkout_info.shipping_method">
                                    Outside Dhaka - Courier Charge Applicable
                                </label><br>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 details-section-wrap">
                            <div class="page-section shape_box7 ws-box">
                                <div class="section-head">
                                    <h2><span>4</span>Order Overview</h2>
                                </div>
                                <table class="table table-bordered bg-white checkout-data">
                                    <thead>
                                        <tr>
                                            <td>Product Name</td>
                                            <td>Price</td>
                                            <td class="text-end">Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(product, index) in cart" :key="index">
                                            <td class="name">
                                                <a :href="product.product_url">
                                                    @{{product.product_name}}
                                                </a>
                                                <div class="options"></div>
                                                <div class="fade"></div>
                                            </td>
                                            <td class="price">
                                                <span>@{{product.sales_price}}৳</span>
                                                <span> x </span>
                                                <span>@{{product.qty}}</span>
                                            </td>
                                            <td class="price text-end">@{{product.sales_price * product.qty}}৳ </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2" class="text-end"><strong>Sub Total:</strong></td>
                                            <td class="text-end">
                                                <span class="amount">@{{total_cart_price}}৳</span>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2" class="text-end"><strong>Delivery Charge:</strong></td>
                                            <td class="text-end">
                                                <span class="amount">
                                                    @{{(checkout_info.shipping_method == 'inside_dhaka' ? 60 : 0)}}৳
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="total">
                                            <td colspan="2" class="text-end"><strong>Total:</strong></td>
                                            <td class="text-end">
                                                <span class="amount">
                                                    @{{total_cart_price + (checkout_info.shipping_method == 'inside_dhaka' ? 60 : 0)}}৳
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-12">
                            <div v-if="cart.length" class="page-section shape_box7 ws-box text-end">
                                <button @click.prevent="checkout_submit" style="min-width: 180px;" class="btn_add_to_cart d-inline-block shape_box1">
                                    Submit Order
                                </button>
                            </div>
                            <div v-else>
                                <a href="/" class="btn btn-warning">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
