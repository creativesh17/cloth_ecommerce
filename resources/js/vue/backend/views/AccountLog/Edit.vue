<template>
    <div class="container">
        <div class="card list_card">
            <div class="card-header">
                <h4>Edit</h4>
                <div class="btns">
                    <a href="" @click.prevent="call_store(`set_${store_prefix}`,null), $router.push({ name: `All${route_prefix}` })"  class="btn rounded-pill btn-outline-warning" >
                        <i class="fa fa-arrow-left me-5px"></i> 
                        <span >
                            Back
                        </span>
                    </a>
                </div>
            </div>
            <form @submit.prevent="call_store(`update_${store_prefix}`,$event.target)" autocomplete="false">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="admin_form form_1" v-if="this[`get_${store_prefix}`]">

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

                                <div class=" form-group d-grid align-content-start gap-1 mb-2 " >
                                    <input-field
                                        :label="`Amount`"
                                        :name="`amount`"
                                        :value="this[`get_${store_prefix}`]['amount']"
                                    />
                                </div>

                                <div class=" form-group d-grid align-content-start gap-1 mb-2">
                                    <input-field
                                        :label="`Date`"
                                        :name="`date`"
                                        :type="`date`"
                                        :value="this[`get_${store_prefix}`]['date']"
                                    />
                                </div>

                                

                                <div class="form-group d-grid align-content-start gap-1 mb-2 " >
                                    <label for="meta_description">Description</label>
                                    <textarea 
                                        class="form-control" 
                                        :label="`Description`"
                                        :name="`description`"
                                        :value="this[`get_${store_prefix}`]['description']">
                                    </textarea>
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
                                    <div >
                                        <img :src="`/${i.file}`" alt="" v-for="i in this[`get_${store_prefix}`]['account_log_attachment']" :key="i.id" style="width:60px; height: 60px; margin: 3px; object-fit: cover;">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-outline-info" >
                        <i class="fa fa-upload"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex'
import InputField from '../components/InputField.vue'

import AccountCategoryManagementModal from "./components/ManagementModal.vue"
/** store and route prefix for export object use */
import PageSetup from './PageSetup';
const {route_prefix, store_prefix} = PageSetup;
export default {
    components: { InputField, AccountCategoryManagementModal },
    data: function(){
        return {
            /** store prefix for JSX */
            store_prefix,
            route_prefix,
            selected_category: '',
        }
    },
    created: async function () {
        await this[`fetch_${store_prefix}`]({id: this.$route.params.id});

        this.selected_category = this[`get_${store_prefix}`].account_category_id;
        this.set_selected_account_categorys(this[`get_${store_prefix}`].account_category)

        console.log(this[`get_${store_prefix}`]);
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
        ...mapActions([
            `update_${store_prefix}`,
            `fetch_${store_prefix}`,
        ]),
        ...mapMutations([
            `set_${store_prefix}`,
            `set_selected_account_categorys`,
        ]),
        call_store: function(name, params=null){
            this[name](params)
        },
    },
    computed: {
        ...mapGetters([
            `get_${store_prefix}`,
            'get_account_category_selected'

        ]),
    }
};
</script>

<style>
</style>
