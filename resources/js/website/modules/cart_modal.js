window.show_cart_modal = function(product = {}){
    var cartModal = new bootstrap.Modal('#cartModal');
    var modal_data_left = document.querySelector('.modal_data .left');
    var modal_data_right_tbody = document.querySelector('.modal_data .right tbody');
    if(modal_data_left){
        modal_data_left.innerHTML = `
            You have added
                <a href="${product.product_url}" class="text-warning">
                    ${product.product_name}
                </a>
            to your shopping cart!
        `;
    }
    if(modal_data_right_tbody){
        modal_data_right_tbody.innerHTML = `
        <tr>
            <td>Cart Quantity</td>
            <td>:</td>
            <td>${product.qty}</td>
        </tr>
        <tr>
            <td>Cart Total</td>
            <td>:</td>
            <td>${product.qty * product.sales_price}</td>
        </tr>
        `;
    }
    cartModal.show();
}
