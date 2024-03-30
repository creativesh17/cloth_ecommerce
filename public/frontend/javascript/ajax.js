function cartItems() {
    var url = window.origin + '/cartitems';
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'HTML',
        success(data) {
            $('#cartItems').html(data);
        }
    });
}

$(function () {

    $('#addCart').submit(function (e) {
        e.preventDefault();

        var formdata = new FormData(this);
        // console.log(formdata);
        $.ajax({
            url: this.action,
            type: this.method,
            data: formdata,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            success(data) {
                Swal.fire({
                    // position: "top-end",
                    position: "center",
                    icon: "success",
                    title: "Successful!",
                    text: data.success,
                    showConfirmButton: true,
                    timer: 3000
                });
                return cartItems();
            }
        });

    });


});

var wish_list_loading = false;
function add_to_wish_list(id) {
    event.preventDefault();
    wish_list_loading = !wish_list_loading;
    fetch('/wishlist/' + id, {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
        .then(res => res.json())
        .then(res => {
            wish_list_loading = !wish_list_loading;
            Swal.fire({
                position: "top-end",
                // position: "center",
                icon: "success",
                title: "Successful!",
                text: res,
                showConfirmButton: false,
                timer: 2000
            });
            console.log(res);
        })
}

// $(document).on('click', '.addtocart', function(e) {
//     e.preventDefault();

//     var url = $(this).attr('href');
//     console.log(url);
//     // alert(url);
//     $('#addCart').attr('action', url).submit();

// });

function modal_cart_form_submit() {
    event.preventDefault();
    fetch(event.target.action, {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: new FormData(event.target)
    })
        .then(res => res.json())
        .then(res => {
            Swal.fire({
                position: "top-end",
                // position: "center",
                icon: "success",
                title: "Successful!",
                text: "Successfully added to cart",
                showConfirmButton: false,
                timer: 2000
            });
            cartItems();
        })
}

$(document).on("click", "#showProduct", function () {
    var productID = $(this).data('id');
    $(".modal-body #modal_id").val(productID);

    fetch("/product-details-modal/" + productID)
        .then(res => res.text())
        .then(res => {
            document.querySelector('.modal_add_cart_form').action = `/cart/add/${productID}`;
            document.getElementById('cart_modal_content').innerHTML = res;
            $('#cart_modal').modal('show');
        })
});

