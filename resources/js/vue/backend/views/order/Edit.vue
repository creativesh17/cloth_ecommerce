<template>
    <div class="container">
        <div class="card list_card">
            <div class="card-header">
                <h4>Edit</h4>
                <div class="btns">
                    <a href="" @click.prevent=" call_store(`set_${store_prefix}`, null), $router.push({ name: `All${route_prefix}` })" class="btn rounded-pill btn-outline-warning">
                        <i class="fa fa-arrow-left me-5px"></i>
                        <span> Back </span>
                    </a>
                </div>
            </div>

            <form @submit.prevent="updateOrder($event)" autocomplete="false" class="update_form">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <input type="hidden" name="id" :value="this[`get_${store_prefix}`]?.id">
                            <div class="" v-if="this[`get_${store_prefix}`]">
                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Name`"
                                        :name="`first_name`"
                                        :value="this[`get_${store_prefix}`].order_address.first_name"
                                    />
                                </div>
                                <!-- <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Email`"
                                        :name="`email`"
                                        :value="
                                            this[`get_${store_prefix}`]
                                                .order_address.email
                                        "
                                    />
                                </div> -->
                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Email`"
                                        :name="`email`"
                                        :value="this[`get_${store_prefix}`].order_address.email"
                                    />
                                </div>
                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Phone`"
                                        :name="`mobile_number`"
                                        :value="this[`get_${store_prefix}`].order_address.mobile_number"
                                    />
                                </div>

                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" :value="this[`get_${store_prefix}`].order_address.address" name="address"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="" v-if="this[`get_${store_prefix}`]">
                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <!-- <input-field
                                        :label="`Name`"
                                        :name="`first_name`"
                                        :value="
                                            this[`get_${store_prefix}`][
                                                'first_name'
                                            ]
                                        "
                                    /> -->
                                    <label for="division">Division</label>
                                    <select v-model="selected_division" name="division"
                                        @change="set_district($event.target.value)"
                                        id="division"
                                        class="form-select"
                                    >
                                        <option v-for="e in divisions" :key="e.id" :value="`${e.id}_${e.name}`">
                                            {{ e.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <!-- <input-field
                                        :label="`Email`"
                                        :name="`email`"
                                        :value="
                                            this[`get_${store_prefix}`]['email']
                                        "
                                    /> -->
                                    <label for="district">District</label>
                                    <select v-model="selected_district" name="district" id="district" class="form-select">
                                        <option v-for="e in districts" :key="e.id" :value="`${e.name}`">
                                            {{ e.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <!-- <div>
                        <input
                            type="text"
                            class="form-control w-50 mx-auto my-3"
                            placeholder="search product"
                        />
                    </div> -->
                    <div class="form-group d-grid align-content-start gap-1 mb-2">
                        <div>
                            <label class="mb-2 text-capitalize w-50 mx-auto my-3">
                                Search Product
                            </label>
                            <ProductManagementModal :select_qty="1" />
                        </div>
                    </div>

                    <div class="table-responsive my-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>D.Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in order_items" :key="item.id">
                                    <td class="" style="padding: 0">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            @click.prevent="removeOrder(index)"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <td>{{ item.product_name }}</td>
                                    <td>{{ item.sales_price }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <input type="number" class="form-control" style="width: 100px;"
                                            :value="calculate_discount(
                                                item.sales_price,
                                                item.discount_price
                                            )"
                                            @change="($event) => set_discount(
                                                        index,
                                                        $event.target
                                                    )" 
                                                    >
                                                    <span>%</span>
                                        </div>
                                        
                                    </td>
                                    <td>{{ item.discount_price }}</td>
                                    <td class="width-hundred">
                                        <input type="number" step="0" class="form-control" v-model="item.qty"
                                            @change="($event) =>set_total(
                                                                    index,
                                                                    $event.target.value
                                                                )"
                                        />
                                    </td>
                                    <td>
                                        {{ item.total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="admin_form form_1">
                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input
                                        class="form-control"
                                        :label="`Delivery Charge`"
                                        :name="`delivery_charge`"
                                        type="number"
                                        v-model="delivery_charges"
                                    />
                                </div>

                                <!-- <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Discount`"
                                        :name="`discount`"
                                        :value="
                                            this[`get_${store_prefix}`][
                                                'discount'
                                            ]
                                        "
                                    />
                                </div> -->

                                <!-- <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Order Coupon`"
                                        :name="`order_coupon`"
                                        :value="
                                            this[`get_${store_prefix}`][
                                                'order_coupon'
                                            ]
                                        "
                                    />
                                </div> -->

                            </div>
                        </div>

                        <div class="col-md-6">
                            <table class="table my-3 remove-border-table">
                                <tbody>
                                    <tr>
                                        <td class="text-end">Subtotal</td>
                                        <td class="text-end">{{ subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end">Delivery Charge</td>
                                        <td class="text-end">{{delivery_charges  }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end">Total</td>
                                        <td class="text-end">{{ subtotal + delivery_charges }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-outline-info">
                        <i class="fa fa-upload"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
import InputField from "../components/InputField.vue";
// import ProductManagementModal from "./order/components/ManagementModal.vue";
import ProductManagementModal from "../product/components/ManagementModal.vue";
/** store and route prefix for export object use */
import PageSetup from "./PageSetup";
const { route_prefix, store_prefix } = PageSetup;
export default {
    components: { InputField, ProductManagementModal },
    data: function () {
        return {
            /** store prefix for JSX */
            store_prefix,
            route_prefix,

            order_items: [],
            divisions: [],
            districts: [],
            selected_division: "",
            selected_district: "",
            delivery_charges: 0,
        };
    },
    created: async function () {
        let that = this;
    
        await this.set_divisions();
        await this[`fetch_${store_prefix}`]({ id: this.$route.params.id });
        that.selected_division =
            that[`get_${store_prefix}`].order_address.division;
        that.selected_district =
            that[`get_${store_prefix}`].order_address.district;
        that.set_district(that.selected_division || "6");

        this.delivery_charges = that[`get_${store_prefix}`].delivery_charge;
        let order_items = that[`get_${store_prefix}`].order_details;
        order_items.forEach((i) => {
            i.product.discount_price = i.discount_price;
            i.product.qty = i.qty;
            i.product.total = 0;
            that.set_selected_products(i.product);
        });
        console.log("mydata", this[`get_${store_prefix}`]);
    },
    watch: {
        get_product_selected: {
            handler: function (v) {
                this.order_items = [];
                v.forEach((i) => {
                    if (!i.qty || i.qty <= 0) {
                        i.qty = 1;
                    }
                    if (!i.discount_price || i.discount_price <= 0) {
                        i.discount_price = 0;
                    }
                    i.total = i.qty * (i.discount_price || i.sales_price);
                    this.order_items.push(i);
                });
            },
            deep: true,
        },
    },

    methods: {
        ...mapActions([`update_${store_prefix}`, `fetch_${store_prefix}`]),
        ...mapMutations([
            `set_${store_prefix}`, 
            `set_selected_products`,
            `set_clear_selected_products`,
        ]),
        call_store: function (name, params = null) {
            this[name](params);
        },
        
        set_divisions: async function () {
            let that = this;
            await fetch("/jsons/divisions.json")
                .then((r) => r.json())
                .then((data) => {
                    that.divisions = data;
                });
        },

        set_district: async function (division_id = "6") {
            console.log(division_id);
            division_id = division_id.split("_")[0];
            let that = this;
            await fetch("/jsons/districts.json")
                .then((r) => r.json())
                .then((data) => {
                    let options = data.filter(
                        (e) => e.division_id == division_id
                    );
                    that.districts = options;
                });
        },
        calculate_discount(purchasePrice, salePrice) {
            let discountPercentage = 0;
            if (purchasePrice && salePrice) {
                const discount = purchasePrice - salePrice;
                discountPercentage = ((discount / purchasePrice) * 100).toFixed(
                    0
                );
            }
            return discountPercentage;
        },
        removeOrder(index) {
            this.order_items.splice(index, 1);
        },
        set_discount: async function(index, target) {
            let value = target.value;
            if(isNaN(value)){
                value = 0;
            }else {
                value = parseInt(value);
            }

            if(value < 0) {
                value = 0;
            }

            if(value > 100) {
                value = 100;
            }

            target.value = value;

            let items = [...this.order_items];
            let item = items[index];

            let sales_price = item.sales_price;

            let discount_price = sales_price - (sales_price * value/100);
            item.discount_price = discount_price;

            item.total = item.qty * (item.discount_price || item.sales_price);
            
            this.set_clear_selected_products(false);
            items.forEach(i=>this.set_selected_products(i));
        },
        set_total: function (index, qty) {
            let items = [...this.order_items];
            let item = items[index];
            if (isNaN(qty)) {
                qty = 1;
            }
            qty = parseInt(qty);
            item.qty = qty;
            item.total = qty * (item.discount_price || item.sales_price);
            
            this.set_clear_selected_products(false);
            items.forEach(i=>this.set_selected_products(i));
        },
        updateOrder(e) {
            console.log("print korlam tomake...........");
            let form_data = new FormData(e.target);
            form_data.append('order_items',JSON.stringify(this.order_items));
            axios.post('/order/manage', form_data)
                .then(response => {

                })
                .catch(error => {

                })
        },
    },
    computed: {
        ...mapGetters([`get_${store_prefix}`, `get_product_selected`]),
        subtotal() {
            return this.order_items.reduce((t=0, i)=>(t += (i.qty * (i.discount_price || i.sales_price))),0)
        }
    },
};
</script>

<style></style>
