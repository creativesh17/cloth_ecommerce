<div class="modal" tabindex="-1" id="cartModal">
    <div class="modal-dialog overflow-x-auto modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content cart_modal_content rounded-0 bg-transparent border-0">
            {{--
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            --}}
            <div class="modal-body p-0">
                <div class="close_modal_btn">
                    <button data-bs-dismiss="modal" aria-label="Close" type="button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="modal_icon_left">
                    <i class="fa fa-check"></i>
                </div>
                <div class="modal_confirm_order">
                    <a href="/checkout">Confirm Order</a>
                </div>
                <div class="modal_view_cart">
                    <a href="/cart">View Cart</a>
                </div>
                <div class="modal_shape"></div>
                <div class="modal_data">
                    <div class="left">

                    </div>
                    <div class="right">
                        <table class="table table-bordered">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{--
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            --}}

        </div>
    </div>
</div>
