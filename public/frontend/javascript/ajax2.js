$(function() {

    $('.addToCompare').submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(this);
        console.log(formdata);
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
                // return cartItems();
            }
        });

    });

    // function cartItems() {
    //     var url = window.origin + '/cartitems';
    //     $.ajax({
    //         url: url,
    //         type: 'GET',
    //         dataType: 'HTML',
    //         success(data) {
    //             $('#cartItems').html(data);
    //         }
    //     });
    // }
    


});

// var wish_list_loading = false;
// function add_to_wish_list(id){
//     event.preventDefault();
//     wish_list_loading = !wish_list_loading;
//     fetch('/wishlist/'+id,{
//         method: "POST",
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//         }
//     })
//     .then(res=>res.json())
//     .then(res=>{
//         wish_list_loading = !wish_list_loading;
//         Swal.fire({
//             position: "top-end",
//             // position: "center",
//             icon: "success",
//             title: "Successful!",
//             text: res,
//             showConfirmButton: false,
//             timer: 2000
//         });
//         console.log(res);
//     })
// }

$(document).on('click', '.addToCompare', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    fetch(url,{
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(res=>res.json())
        .then(res=>{
            window.s_alert(res.message);
        })

});




