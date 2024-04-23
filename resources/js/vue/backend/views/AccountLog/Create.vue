<template>
    <div class="container">
        <div class="card list_card">
            <div class="card-header">
                <h4>Create</h4>
                <div class="btns">
                    <router-link
                        :to="{ name: `All${route_prefix}` }"
                        class="btn rounded-pill btn-outline-warning"
                    >
                        <i class="fa fa-arrow-left me-5px"></i>
                        Back
                    </router-link>
                </div>
            </div>
            <form
                @submit.prevent="
                    call_store(`store_${store_prefix}`, $event.target)
                "
                autocomplete="false"
            >
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="admin_form form_1">

                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <div>
                                        <label class="mb-2 text-capitalize">
                                            Select Account Category
                                        </label>
                                        <AccountCategoryManagementModal :select_qty="1" />
                                        <div>
                                            <input type="hidden" v-model="selected_category" name="account_category_id">
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="form-group d-grid align-content-start gap-1 mb-2"
                                >
                                    <input-field
                                        :label="`Amount`"
                                        :name="`amount`"
                                    />
                                </div>
                                <div
                                    class="form-group d-grid align-content-start gap-1 mb-2"
                                >
                                    <input-field
                                        :label="`Date`"
                                        :name="`date`"
                                        :type="`date`"
                                        :value="placeDate"
                                    />
                                </div>

                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <label for="type">Type</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                </div>

                                

                                <div class="form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`File Upload`"
                                        :name="`images[]`"
                                        :type="`file`"
                                        :accept="`.jpg,.jpeg,.png,.pdf`"
                                        :multiple="true"
                                        :preview="true"
                                    />
                                </div>

                                <div class="form-group d-grid align-content-start gap-1 mb-2 " >
                                    <label for="meta_description">Description</label>
                                    <textarea 
                                        class="form-control" 
                                        :label="`Description`"
                                        :name="`description`">
                                    </textarea>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-outline-info">
                        <i class="fa fa-upload"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";

import InputField from "../components/InputField.vue";

import AccountCategoryManagementModal from "./components/ManagementModal.vue";
/** store and route prefix for export object use */
import PageSetup from "./PageSetup";
import { mapGetters } from "vuex/dist/vuex.common.js";
import moment from "moment";
const { route_prefix, store_prefix } = PageSetup;

export default {
    components: { InputField, AccountCategoryManagementModal },
    data: function () {
        return {
            /** store prefix for JSX */
            store_prefix,
            route_prefix,
            selected_category: '',
            placeDate: '',
        };
    },
    created: function () {
        this.placeDate = moment().format('YYYY-MM-DD');
    },
    watch: {
        get_account_category_selected:{
            handler: function(v){
                this.selected_category = v[0].id;
            },
            deep: true,
        }
    },
    methods: {
        ...mapActions([`store_${store_prefix}`]),
        call_store: function (name, params = null) {
            this[name](params);
        },
    },
    computed: {
        ...mapGetters(['get_account_category_selected'])
    }
};
</script>

<style></style>
