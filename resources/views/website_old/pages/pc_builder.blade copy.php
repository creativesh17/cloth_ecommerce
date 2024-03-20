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

    <section id="pc_builder_section" style="min-height: 100vh;">
        <br>
        <br>
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
                                            <a class=" btn btn-info" href="quote-download">
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
                                                <span class="amount">7,300৳</span><br>
                                                <span class="items">1 Items</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pcb-content">
                                        <div class="content-label">Core Components</div>

                                        <template v-for="i in core_components">
                                            <div :key="i" :class="`c-item ${this[i].photo_url?'selected': 'blank'}`">
                                                <div class="img">
                                                    <a v-if="this[i].photo_url" target="_blank" :href="this[i].product_url">
                                                        <img :src="this[i].photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                    </a>
                                                    <span v-else :class="`img-ico ${i}`"></span>
                                                </div>
                                                <div class="details">
                                                    <div class="component-name">
                                                        <span>CPU</span>
                                                        <span class="mark">Required</span>
                                                    </div>
                                                    <div class="product-name">
                                                        @{{this[i].product_name}}
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div v-if="this[i].active_price" class="price">
                                                        @{{this[i].active_price}} ৳
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div v-if="this[i].product_name" class="action-items">
                                                        <a class="action btn btn-sm btn-outline-danger" @click.prevent="remove_item('this[i]')" href="#" title="Remove"><i class="fa fa-close"></i></a>
                                                        <a class="action btn btn-sm btn-outline-warning" @click.prevent="search_key='this[i]';search_type='this[i]';search_products();" href="#" title="Choose"><i class="fa fa-refresh"></i></a>
                                                    </div>
                                                    <a v-else class="btn btn-outline-info" @click.prevent="search_key='this[i]';search_type='this[i]';search_products();" href="#" >
                                                        Choose
                                                    </a>
                                                </div>
                                            </div>
                                        </template>

                                        <div :class="`c-item ${cooler.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="cooler.photo_url" target="_blank" :href="cooler.product_url">
                                                    <img :src="cooler.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico cpu-cooler"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>CPU Cooler</span>

                                                </div>
                                                <div class="product-name">
                                                    @{{cooler.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="cooler.active_price" class="price">
                                                    @{{cooler.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div v-if="cooler.product_name" class="action-items">
                                                    <a class="action btn btn-sm btn-outline-danger" @click.prevent="remove_item('cooler')" href="#" title="Remove"><i class="fa fa-close"></i></a>
                                                    <a class="action btn btn-sm btn-outline-warning" @click.prevent="search_key='cooler';search_type='cooler';search_products();" href="#" title="Choose"><i class="fa fa-refresh"></i></a>
                                                </div>
                                                <a v-else class="btn btn-outline-info" @click.prevent="search_key='cooler';search_type='cooler';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${motherboard.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="motherboard.photo_url" target="_blank" :href="motherboard.product_url">
                                                    <img :src="motherboard.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico motherboard"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Motherboard</span>
                                                    <span class="mark">Required</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{motherboard.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="motherboard.active_price" class="price">
                                                    @{{motherboard.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='motherboard';search_type='motherboard';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${ram.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="ram.photo_url" target="_blank" :href="ram.product_url">
                                                    <img :src="ram.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico ram"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>RAM</span>
                                                    <span class="mark">Required</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{ram.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="ram.active_price" class="price">
                                                    @{{ram.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='ram';search_type='ram';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${storage.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="storage.photo_url" target="_blank" :href="storage.product_url">
                                                    <img :src="storage.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico storage"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Storage</span>
                                                    <span class="mark">Required</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{storage.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="storage.active_price" class="price">
                                                    @{{storage.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='storage';search_type='storage';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${graphics_card.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="graphics_card.photo_url" target="_blank" :href="graphics_card.product_url">
                                                    <img :src="graphics_card.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico graphics-card"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Graphics Card</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{graphics_card.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="graphics_card.active_price" class="price">
                                                    @{{graphics_card.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='graphics_card';search_type='graphics_card';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${power_supply.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="power_supply.photo_url" target="_blank" :href="power_supply.product_url">
                                                    <img :src="power_supply.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico power-supply"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Power Supply</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{power_supply.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="power_supply.active_price" class="price">
                                                    @{{power_supply.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='power_supply';search_type='power_supply';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${casing.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="casing.photo_url" target="_blank" :href="casing.product_url">
                                                    <img :src="casing.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico casing"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Casing</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{casing.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="casing.active_price" class="price">
                                                    @{{casing.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='casing';search_type='casing';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div class="content-label">Peripherals &amp; Others</div>

                                        <div :class="`c-item ${monitor.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="monitor.photo_url" target="_blank" :href="monitor.product_url">
                                                    <img :src="monitor.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico monitor"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Monitor</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{monitor.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="monitor.active_price" class="price">
                                                    @{{monitor.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='monitor';search_type='monitor';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${casing_cooler.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="casing_cooler.photo_url" target="_blank" :href="casing_cooler.product_url">
                                                    <img :src="casing_cooler.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico casing-cooler"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Casing Cooler</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{casing_cooler.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="casing_cooler.active_price" class="price">
                                                    @{{casing_cooler.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='casing_cooler';search_type='casing_cooler';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${keyboard.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="keyboard.photo_url" target="_blank" :href="keyboard.product_url">
                                                    <img :src="keyboard.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico keyboard"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>keyboard</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{keyboard.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="keyboard.active_price" class="price">
                                                    @{{keyboard.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='keyboard';search_type='keyboard';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${mouse.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="mouse.photo_url" target="_blank" :href="mouse.product_url">
                                                    <img :src="mouse.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico mouse"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>mouse</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{mouse.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="mouse.active_price" class="price">
                                                    @{{mouse.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='mouse';search_type='mouse';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${anti_virus.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="anti_virus.photo_url" target="_blank" :href="anti_virus.product_url">
                                                    <img :src="anti_virus.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico anti-virus"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Anti Virus</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{anti_virus.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="anti_virus.active_price" class="price">
                                                    @{{anti_virus.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='anti_virus';search_type='anti_virus';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                        <div :class="`c-item ${ups.photo_url?'selected': 'blank'}`">
                                            <div class="img">
                                                <a v-if="ups.photo_url" target="_blank" :href="ups.product_url">
                                                    <img :src="ups.photo_url" alt="" title="" style="object-fit: contain; height: 80px; width: 80px;">
                                                </a>
                                                <span v-else class="img-ico ups"></span>
                                            </div>
                                            <div class="details">
                                                <div class="component-name">
                                                    <span>Ups</span>
                                                </div>
                                                <div class="product-name">
                                                    @{{ups.product_name}}
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div v-if="ups.active_price" class="price">
                                                    @{{ups.active_price}} ৳
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-outline-info" @click.prevent="search_key='ups';search_type='ups';search_products();" href="#" >
                                                    Choose
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="galleryModal">
            <div class="modal-dialog overflow-x-auto modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Search Component</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="search" v-model="search_key" @keyup="search_products" class="form-control">
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
