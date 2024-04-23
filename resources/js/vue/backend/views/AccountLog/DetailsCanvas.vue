<template>
    <div class="canvas_backdrop" :class="{active:this[`get_${store_prefix}`]}" @click="$event.target.classList.contains('canvas_backdrop') && call_store(`set_${store_prefix}`,null)">
        <div class="content right" v-if="this[`get_${store_prefix}`]">
            <div class="content_header">
                <h3 class="offcanvas-title">Details</h3>
                <i @click="call_store(`set_${store_prefix}`,null)" class="fa fa-times"></i>
            </div>
            <div class="cotent_body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].id }}</td>
                        </tr>

                        <tr>
                            <td> Date </td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].date }}</td>
                        </tr>

                        <tr>
                            <td> Description </td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].description }}</td>
                        </tr>

                        <tr>
                            <td> Type </td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].type }}</td>
                        </tr>

                        <tr>
                            <td> Account category </td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].account_category.title }}</td>
                        </tr>

                        <tr>
                            <td> Amount </td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].amount }}</td>
                        </tr>

                        <tr>
                            <td> Amount In Text</td>
                            <td>:</td>
                            <td>{{ this[`get_${store_prefix}`].amount_in_text }}</td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <span v-if="this[`get_${store_prefix}`].status == 1" class="badge bg-label-success me-1">active</span>
                                <span v-if="this[`get_${store_prefix}`].status == 0" class="badge bg-label-success me-1">deactive</span>
                            </td>
                        </tr>

                        <div>
                            <img :src="`/${i.file}`" alt="" v-for="i in this[`get_${store_prefix}`]['account_log_attachment']" :key="i.id" style="width:60px; height: 60px; margin: 4px; object-fit: contain; padding: 0;">
                        </div>


                        <tr>
                            <td>created at</td>
                            <td>:</td>
                            <td>{{ new Date(this[`get_${store_prefix}`].created_at).toLocaleString() }}</td>
                        </tr>
                        <tr>
                            <td>udpated at</td>
                            <td>:</td>
                            <td>{{ new Date(this[`get_${store_prefix}`].updated_at).toLocaleString() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex'
/** store and route prefix for export object use */
import PageSetup from './PageSetup';
const {route_prefix, store_prefix} = PageSetup;
export default {
    data: function(){
        return {
            /** store prefix for JSX */
            store_prefix,
            route_prefix,
        }
    },
    methods: {
        ...mapMutations([`set_${store_prefix}`]),
        call_store: function(name, params=null){
            this[name](params)
        },
    },
    computed: {
        ...mapGetters([`get_${store_prefix}`])
    }
}
</script>

<style>

</style>
