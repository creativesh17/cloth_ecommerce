window.Vue = require('vue');
import Vue from 'vue';

window.toggle_canvas = () => {
    document.getElementById('cart_canvas').classList.toggle('active');
}

const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    allowEscapeKey: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});
window.s_alert = (title="success", icon="success") =>{
    Toast.fire({
        icon,
        title
    });
}

window.vue_controller = {
    data: function () {
        return {
            cart: [],
            delivery_charge: 0,
            checkout_info: {},
        }
    },
    created: function () {
        this.get_cart();
        this.get_checkout_info();
        // console.log('ctg_ecommerce', this.checkout_info);
    },
    watch: {
        cart: {
            handler: function (newv) {
                this.updateCartStore(newv);
            },
            deep: true,
        },
        checkout_info: {
            handler: function (newv) {
                this.updateAddressStore(newv);
            },
            deep: true,
        },
    },
    methods: {
        get_cart: function () {
            let local_cart = window.localStorage.getItem('cart');
            if (local_cart) {
                local_cart = JSON.parse(local_cart);
            } else {
                local_cart = [];
            }
            this.cart = local_cart;
        },
        get_checkout_info: function(){
            let checkout_info = window.localStorage.getItem('checkout_info');
            if (checkout_info) {
                checkout_info = JSON.parse(checkout_info);
                if(!checkout_info.shipping_method){
                    checkout_info.shipping_method = "inside_dhaka";
                }
            } else {
                checkout_info = {
                    shipping_method: "inside_dhaka"
                };
            }
            this.checkout_info = checkout_info;
        },
        remove_product: function (index) {
            this.cart.splice(index, 1);
        },
        add_to_cart: function (product) {
            this.get_cart();
            let check = this.cart.find(i => i.id == product.id);
            if (check) {
                check.qty = product.qty>0 ? product.qty : check.qty++;
                check = {
                    ...check,
                    product_name: product.product_name,
                    sales_price: product.discount?.discount_price || product.sales_price,
                    image: product.photo_url,
                    weight: product.weight,
                    product_url: product.product_url,
                }
            }else{
                check = {
                    qty: product.qty>0 ? product.qty : 1,
                    product_name: product.product_name,
                    sales_price: product.discount?.discount_price || product.sales_price,
                    image: product.photo_url,
                    id: product.id,
                    weight: product.weight,
                    product_url: product.product_url,
                };
                this.cart.unshift(check)
            }
            this.updateCartStore(this.cart);
            window.show_cart_modal(check);
            // window.s_alert("cart added");
        },
        updateCartStore: function(newv){
            localStorage.setItem('cart', JSON.stringify(newv));
            let cart_count_at_a_glance = document.getElementById('cart_count_at_a_glance');
            cart_count_at_a_glance.innerHTML = newv.length;
        },
        updateAddressStore: function(newv){
            localStorage.setItem('checkout_info', JSON.stringify(newv));
        },
        empty_cart: function(){
            localStorage.setItem('cart', '[]');
            this.cart = [];
        },
        checkout_submit: function(){
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            fetch('/checkout',{
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-Token": csrfToken,
                },
                body: JSON.stringify({
                    cart: this.cart,
                    ...this.checkout_info,
                })
            })
            .then(async res => {
                let response = {}
                response.status = res.status
                response.data = await res.json();
                return response;
            }).then(res => {
                if(res.status === 422) {
                    render_error(res.data.data)
                }
                if(res.status === 200) {
                    this.empty_cart();
                    location.href = "/order-complete/"+res.data.order.invoice_id;
                }
            })
        }
    },
    computed: {
        total_cart_price: function () {
            return this.cart.reduce((t, i) => t += (i.sales_price * i.qty), 0)
        },
        total_weight_price: function () {
            let total_weight = this.cart.reduce((t, i) => t += (i.qty * i.weight), 0);
            console.log(total_weight);
            let delivery_charge = 50;
            if(total_weight <= 500){
                delivery_charge = 50;
            }else if(total_weight > 500 && total_weight <= 1000){
                delivery_charge = 80;
            }else if(total_weight > 1000 && total_weight <= 2000){
                delivery_charge = 100;
            }else{
                delivery_charge = 120;
                total_weight -= 2000;
                total_weight = Math.ceil(total_weight / 1000);
                delivery_charge += total_weight * 20;
            }

            return delivery_charge;
        },
    }
};

window.addEventListener('load',function(){
    if (document.getElementById('checkout_page')) {
        new Vue({
            el: '#checkout_page',
            ...vue_controller,
        });
    }

    window.cart_canvas = document.getElementById('cart_canvas');
    if (window.cart_canvas) {
        new Vue({
            el: '#cart_canvas',
            ...window.vue_controller,
        });
    }

    window.cart_page_list = document.getElementById('cart_page_list');
    if (window.cart_page_list) {
        new Vue({
            el: '#cart_page_list',
            ...window.vue_controller,
        });
    }

})

