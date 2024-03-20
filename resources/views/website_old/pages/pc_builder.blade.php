@extends('website.layouts.app',[
    "meta" => [
        "title" => "pc builder",
    ]
])
@section('content')
<main class="main-content">
    <section>
        <div class="container">
            <ul class="breadcrumb pt-4">
                <li>
                    <a href="/"><i class="fa fa-home" title="Home"></i></a>
                </li>
                <li>
                    <a href="#">
                        <span>pc builder</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="print_body" id="pc_builder_section" style="min-height: 100vh;">
        <br>
        <br>
        <div v-if="show_loader" class="loader"></div>
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <section class="build-your-pc bg-bt-gray">
                        <div class="container">
                            <div class="pcb-container">
                                <div class="pcb-head">
                                    <div class="startech-logo">
                                        <img class="logo" src="/{{$setting->header_logo}}" alt="Logo">
                                    </div>
                                    <div class="actions">
                                        <div class="all-actions">
                                            <a class=" btn btn-info" target="_blank" href="/pc-builder-print">
                                                <i class="fa fa-print"></i>
                                                <span class="action-text">Print</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="pcb-inner-content">
                                    <div class="pcb-top-content">
                                        <div class="left">
                                            <h1 class="m-hide">PC Builder - Build Your Own Computer - CTG Computer</h1>
                                            <div class="checkbox-inline">
                                                {{-- <input type="checkbox" name="hide" id="input-hide">
                                                <label for="input-hide">Hide Unconfigured Components</label> --}}
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="total-amount estimated-watt">
                                                {{-- <span class="amount">117W</span><br>
                                                <span class="items">Estimated Wattage</span>
                                                <span class="betaa">BETA</span> --}}
                                            </div>
                                            <div class="total-amount bg-dark t-price">
                                                <span class="amount">@{{at_a_glance.total}} ৳</span><br>
                                                <span class="items">@{{at_a_glance.qty}} Items</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pcb-content">
                                        <div class="content-label">Core Components</div>

                                        <template v-for="i in core_components">
                                            <div :key="i" :class="`c-item ${get_item(i).photo_url?'selected': 'blank'}`">
                                                <div class="img">
                                                    <a v-if="get_item(i).photo_url" target="_blank" :href="get_item(i).product_url">
                                                        <img :src="get_item(i).photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                    </a>
                                                    <span v-else :class="`img-ico ${i}`"></span>
                                                </div>
                                                <div class="details">
                                                    <div class="component-name">
                                                        <span class="text-capitalize">@{{i.replaceAll('_',' ')}}</span>
                                                        {{-- <span class="mark">Required</span> --}}
                                                    </div>
                                                    <div class="product-name">
                                                        @{{get_item(i).product_name}}
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div v-if="get_item(i).active_price" class="price">
                                                        @{{get_item(i).active_price}} ৳
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div v-if="get_item(i).product_name" class="action-items">
                                                        <a class="action btn btn-sm btn-outline-danger" @click.prevent="remove_item(i)" href="#" title="Remove"><i class="fa fa-close"></i></a>
                                                        <a class="action btn btn-sm btn-outline-warning" @click.prevent="search_key=i;search_type=i;search_products();" href="#" title="Choose"><i class="fa fa-refresh"></i></a>
                                                    </div>
                                                    <a v-else class="btn btn-outline-info" @click.prevent="search_key=i;search_type=i;search_products();" href="#" >
                                                        Choose
                                                    </a>
                                                </div>
                                            </div>
                                        </template>

                                        <div class="content-label">Peripherals &amp; Others</div>

                                        <template v-for="i in peripherals">
                                            <div :key="i" :class="`c-item ${get_item(i).photo_url?'selected': 'blank'}`">
                                                <div class="img">
                                                    <a v-if="get_item(i).photo_url" target="_blank" :href="get_item(i).product_url">
                                                        <img :src="get_item(i).photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                    </a>
                                                    <span v-else :class="`img-ico ${i}`"></span>
                                                </div>
                                                <div class="details">
                                                    <div class="component-name">
                                                        <span class="text-capitalize">
                                                            @{{i.replaceAll('_',' ')}}
                                                        </span>
                                                        {{-- <span class="mark">Required</span> --}}
                                                    </div>
                                                    <div class="product-name">
                                                        @{{get_item(i).product_name}}
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div v-if="get_item(i).active_price" class="price">
                                                        @{{get_item(i).active_price}} ৳
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div v-if="get_item(i).product_name" class="action-items">
                                                        <a class="action btn btn-sm btn-outline-danger" @click.prevent="remove_item(i)" href="#" title="Remove"><i class="fa fa-close"></i></a>
                                                        <a class="action btn btn-sm btn-outline-warning" @click.prevent="search_key=i;search_type=i;search_products();" href="#" title="Choose"><i class="fa fa-refresh"></i></a>
                                                    </div>
                                                    <a v-else class="btn btn-outline-info" @click.prevent="search_key=i;search_type=i;search_products();" href="#" >
                                                        Choose
                                                    </a>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="pcBuilderModal">
            <div class="modal-dialog overflow-x-auto modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Search Component</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2 d-flex gap-2">
                            <input type="search" v-model="search_key" @change="search_products" class="form-control">
                            <button type="button" class="btn btn-sm btn-outline-info"><i class="fa fa-search"></i></button>
                        </div>
                        <div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr v-for="data in search_data.data" :key="data.id">
                                        <td>
                                            <img :src="data.photo_url" style="width: 80px;" class="img-thumbnail" alt="">
                                        </td>
                                        <td>
                                            @{{ data.product_name }} <br>
                                            <b class="d-inline-block mt-2">
                                                @{{ data.active_price }} ৳
                                            </b>
                                        </td>
                                        <td>
                                            <a href="#" @click.prevent="select_data(data)" class="btn btn-sm btn-outline-primary">
                                                Select
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <pagination :data="search_data" :limit="5" :size="'small'" :show-disabled="true" :align="'left'"
                            @pagination-change-page="get_data">
                            <span slot="prev-nav"><i class="fa fa-angle-left"></i> Previous</span>
                            <span slot="next-nav">Next <i class="fa fa-angle-right"></i></span>
                        </pagination>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
