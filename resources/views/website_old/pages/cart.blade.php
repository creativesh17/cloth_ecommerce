@extends('website.layouts.app',[
    'meta' => [
        "title" => "products cart",
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
                <li >
                    <a href="#">
                        <span>cart</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="bg-bt-gray p-tb-15 my-5" id="cart_page_list">
        <div class="container">
            <div class="content ws-box p-15">
                <h1 class="title">Shopping Cart</h1>
                <div class="table-responsive">
                    <table @mouseover="get_cart" class="table table-bordered cart-table bg-white">
                        <thead>
                            <tr>
                                <td class="text-center rs-none">Image</td>
                                <td class="text-start">Product Name</td>
                                <td class="text-start">Quantity</td>
                                <td class="text-end rs-none">Unit Price</td>
                                <td class="text-end">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in cart" :key="index">
                                <td class="text-center rs-none">
                                    <a :href="product.product_url">
                                        <img
                                            style="height: 40px;"
                                            :src="product.image"
                                            :alt="product.product_name"
                                            :title="product.product_name"
                                            class="img-thumbnail"
                                        />
                                    </a>

                                </td>
                                <td class="text-start">
                                    <a :href="cart.product_url">
                                        @{{product.product_name}}
                                    </a>
                                    <div class="mt-1">
                                        <span @click="remove_product(index)" class="text-danger cursor-pointer d-inline-block">
                                            <i  class="fa fa-trash"></i>
                                            Delete
                                        </span>
                                    </div>
                                </td>
                                <td class="text-start">
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        <input type="number" v-model="product.qty" size="1" class="form-control" />
                                    </div>
                                </td>
                                <td class="text-end rs-none">@{{product.sales_price}} ৳</td>
                                <td class="text-end">@{{product.sales_price * product.qty}} ৳</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered bg-white cart-total">
                            <tbody>
                                {{-- <tr>
                                    <td class="text-end"><strong>Sub-Total:</strong></td>
                                    <td class="text-end amount">42,800৳</td>
                                </tr> --}}
                                <tr>
                                    <td class="text-end"><strong>Total:</strong></td>
                                    <td class="text-end amount">@{{total_cart_price}} ৳</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-end">
                    <a href="/checkout" class="btn btn-info shape_box3">Confirm Order</a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
