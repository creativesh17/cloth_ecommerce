window.Vue = require('vue');
import axios from 'axios';
import Vue from 'vue';

window.debounce = function (func, delay) {
    let timeoutId;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(context, args);
        }, delay);
    };
}

window.addEventListener('load', function () {
    let pc_builder_section = document.getElementById('pc_builder_section');
    if (pc_builder_section) {
        Vue.component('pagination', require('laravel-vue-pagination'));
        new Vue({
            el: '#pc_builder_section',
            data: () => ({
                show_loader: false,
                search_key: '',
                search_data: {},

                search_type: '',

                cpu: {},
                processor: {},
                cooler: {},
                motherboard: {},
                ram: {},
                storage: {},
                graphics_card: {},
                power_supply: {},
                casing: {},
                monitor: {},
                casing_cooler: {},
                keyboard: {},
                mouse: {},
                anti_virus: {},
                headphone: {},
                ups: {},

                core_components: [
                    'processor',
                    'cooler',
                    'motherboard',
                    'ram',
                    'storage',
                    'graphics_card',
                    'power_supply',
                    'casing',
                ],
                peripherals: [
                    'monitor',
                    // 'casing_cooler',
                    'keyboard',
                    'mouse',
                    // 'anti_virus',
                    'ups',
                ],
            }),
            created: function () {
                window.show_pcBuilderModal = function(){
                    window.pcBuilderModal = new bootstrap.Modal('#pcBuilderModal');
                    window.pcBuilderModal.show();
                }
                window.hide_pcBuilderModal = function(){
                    window.pcBuilderModal.hide();
                }
                this.get_from_local();
            },
            methods: {
                search_products: debounce(function () {
                    this.get_data()
                }, 500),
                get_data: function (page = 1) {
                    let that = this;
                    that.show_loader = true;
                    axios.get('/api/v1/products?key=' + this.search_key + `&page=${page}`)
                        .then(res => {
                            that.search_data = res.data;
                            that.show_loader = false;

                            if(window.pcBuilderModal._isShown != true){
                                window.show_pcBuilderModal();
                            }
                        })
                },
                select_data: function (product) {
                    let item = product;

                    if( Object.keys(product).length){
                        item = {
                            photo_url: product.photo_url,
                            product_name: product.product_name,
                            active_price: product.active_price,
                        };
                    }

                    switch (this.search_type) {
                        case 'cpu':
                            this.cpu = item;
                            this.save_to_local('cpu',item);
                            break;
                        case 'processor':
                            this.processor = item;
                            this.save_to_local('processor',item);
                            break;
                        case 'cooler':
                            this.cooler = item;
                            this.save_to_local('cooler',item);
                            break;
                        case 'motherboard':
                            this.motherboard = item;
                            this.save_to_local('motherboard',item);
                            break;
                        case 'ram':
                            this.ram = item;
                            this.save_to_local('ram',item);
                            break;
                        case 'storage':
                            this.storage = item;
                            this.save_to_local('storage',item);
                            break;
                        case 'graphics_card':
                            this.graphics_card = item;
                            this.save_to_local('graphics_card',item);
                            break;
                        case 'power_supply':
                            this.power_supply = item;
                            this.save_to_local('power_supply',item);
                            break;
                        case 'casing':
                            this.casing = item;
                            this.save_to_local('casing',item);
                            break;
                        case 'monitor':
                            this.monitor = item;
                            this.save_to_local('monitor',item);
                            break;
                        case 'casing_cooler':
                            this.casing_cooler = item;
                            this.save_to_local('casing_cooler',item);
                            break;
                        case 'keyboard':
                            this.keyboard = item;
                            this.save_to_local('keyboard',item);
                            break;
                        case 'mouse':
                            this.mouse = item;
                            this.save_to_local('mouse',item);
                            break;
                        case 'anti_virus':
                            this.anti_virus = item;
                            this.save_to_local('anti_virus',item);
                            break;
                        case 'headphone':
                            this.headphone = item;
                            this.save_to_local('headphone',item);
                            break;
                        case 'ups':
                            this.ups = item;
                            this.save_to_local('ups',item);
                            break;

                        default:
                            break;
                    }
                    window.hide_pcBuilderModal();
                },
                save_to_local: function(key,item){
                    let pc_builder = localStorage.getItem('pc_builder');
                    if(pc_builder){
                        pc_builder = JSON.parse(pc_builder);
                    }else{
                        pc_builder = {};
                    }
                    pc_builder[key]  = item;

                    localStorage.setItem('pc_builder',JSON.stringify(pc_builder));
                },
                get_from_local: function(){
                    let pc_builder = localStorage.getItem('pc_builder');
                    if(pc_builder){
                        pc_builder = JSON.parse(pc_builder);
                    }else{
                        pc_builder = {};
                    }

                    for (const key in pc_builder) {
                        if (Object.hasOwnProperty.call(pc_builder, key)) {
                            const element = pc_builder[key];
                            this[key] = element;
                        }
                    }
                },
                remove_item: function(key){
                    let pc_builder = localStorage.getItem('pc_builder');
                    if(pc_builder){
                        pc_builder = JSON.parse(pc_builder);
                    }else{
                        pc_builder = {};
                    }

                    this[key] = {};
                    pc_builder[key] = {};

                    localStorage.setItem('pc_builder',JSON.stringify(pc_builder));
                },
                get_item: function(key){
                    return this[key];
                }
            },
            computed: {
                at_a_glance: function(){
                    let total = 0;
                    let qty = 0;
                    [...this.core_components,...this.peripherals].forEach(el => {
                        if(this.get_item(el).active_price){
                            total += this.get_item(el).active_price;
                            qty++;
                        }

                    });
                    return {total, qty};
                }
            }
        });
    }
});
