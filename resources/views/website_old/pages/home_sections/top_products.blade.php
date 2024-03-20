<div class="home-top-categories-area home_cat_section">
    <div class="container custom-container">
        <div class="section_content">
            <div class="top_bar">
                <div>
                    <h2 class="section_heading">
                        Top Products
                    </h2>
                </div>
                <div class="navigation_links">

                </div>
            </div>
            <div class="items" style="grid-template-columns: 1fr;">
                <div class="cat_products_wrapper">
                    <div class="home_cat_product_row">
                        @foreach ($home_top_products as $top_product)
                            @include('website.include.product',[
                                'product' => $top_product,
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
