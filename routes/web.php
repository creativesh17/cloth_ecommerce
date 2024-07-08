<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


Route::group(['prefix' => '', 'namespace' => "Livewire"], function () {
    // Route::get('/contact', "Contact")->name('contact_us');
});

Route::group(['prefix' => '', 'namespace' => "Controllers"], function () {

    // Website Home Page
    Route::get('/', 'Website\WebsiteController@home')->name('home');


    // Customer Dashboard
    Route::get('/customer/dashboard', 'Website\DashboardController@dashboard')->name('customer.dashboard');


    // terms - about us - policy
    Route::get('/about-us', "Website\WebsiteController@aboutus")->name('about_us');
    Route::get('/privacy-policy', "Website\WebsiteController@privacy_policy")->name('privacy.policy');
    Route::get('/terms-conditions', "Website\WebsiteController@terms")->name('terms');
    Route::get('/contact', "Website\WebsiteController@contact")->name('contact');
    Route::post('/contact', "Website\WebsiteController@contact_store")->name('contact.store');
    Route::get('/sitemap', "Website\WebsiteController@sitemap")->name('sitemap');


    // AuthController - includes both Auth and Orders and Reviews
    Route::get('/login', 'Website\AuthController@login')->name('login');
    Route::post('/login', 'Website\AuthController@website_login')->name('login');
    Route::get('/register', 'Website\AuthController@register')->name('register');
    Route::post('/register', 'Website\AuthController@website_register')->name('register');
    // Route::get('/forget/password', 'Website\AuthController@forget_password')->name('forget.password');
    Route::post('/logout', 'Website\AuthController@logout')->name('logout');
    Route::get('/profile', 'Website\AuthController@profile')->middleware('auth')->name('profile');
    Route::post('/profile/update', 'Website\AuthController@profile_update')->middleware('auth')->name('profile.update');
    Route::get('/reset-password', 'Website\AuthController@reset_password')->name('reset_password');
    Route::post('/reset-password', 'Website\AuthController@reset_password_update')->name('reset_password');

    // Orders and Reviews
    Route::get('/orders', 'Website\AuthController@orders')->name('orders');
    Route::get('/orders/details/{id}', 'Website\AuthController@order_details')->name('orders.details');
    Route::get('/orders/delete/{id}', 'Website\AuthController@orders_delete')->name('orders.delete');
    Route::get('/orders/single/{id}', 'Website\AuthController@order_single_item_delete')->name('order.single.delete');
    Route::get('/myreviews', 'Website\AuthController@myreviews')->name('myreviews');
    Route::get('/myreviews/{id}', 'Website\AuthController@myreviews_delete')->name('myreviews.delete');


    // newsletter
    Route::post('/newsletter', 'Website\WebsiteController@newsletter')->name('newsletter');

    // Live Product Search
    Route::get('/productsearch', 'Website\ProductController@productsearch')->name('productsearch');
    Route::get('/product/search/page', 'Website\ProductController@productSearchPage')->name('product.search.page');

    // Cart
    Route::get('cart', 'Website\CartController@index')->name('cart');
    Route::post('cart/add/{product}', 'Website\CartController@addToCart')->name('cart.add');
    Route::get('cartitems', 'Website\CartController@cartItems');

    Route::post('cart/update', 'Website\CartController@updateCart');
    Route::get('cart/remove/{rowid}', 'Website\CartController@removeCart');

    Route::any('products/compare/{id}', 'Website\CompareController@products_compare')->name('products.compare');
    Route::get('compare', 'Website\CompareController@compare_page')->name('compare.page');
    Route::get('wishlist', 'Website\WishlistController@index')->middleware('auth')->name('wishlist');
    Route::post('wishlist/{id}', 'Website\WishlistController@addToWishlist')->middleware('auth')->name('wishlist.add');
    Route::get('wishlist/remove/{id}', 'Website\WishlistController@removeWishlist')->middleware('auth')->name('wishlist.remove');


    // checkout
    Route::get('/checkout', 'Website\CheckoutController@checkout')->name('checkout');
    Route::post('/checkout', 'Website\CheckoutController@store');
    Route::get('/order-complete/{id}', 'Website\CheckoutController@order_complete');
    Route::post('product/review', 'Website\ReviewController@review')->name('review.new');
    // Route::post('/review-remove', 'FrontendController@reviewremove')->name('review_remove');


    Route::get('/category/{slug}', 'Website\WebsiteController@category_product')->name('category_product');
    Route::get('/brand/{url}', 'Website\WebsiteController@productsByBrands')->name('productsByBrands');
    Route::get('/product/{url}', 'Website\WebsiteController@product_details')->name('product_details_page');
    Route::get('/product-details-modal/{id}', 'Website\WebsiteController@product_details_modal')->name('product_details_modal');
    Route::get('/clear/compare', 'Website\CompareController@clear_compare_all')->name('clear.compare');
    Route::get('/clear/item/compare/{id}', 'Website\CompareController@clear_compare_item')->name('remove.compare.item');

    // Filter
    Route::get('/filter-price-products', 'Website\WebsiteController@products_price_range')->name('products_price_range');


    // search by brand
    // Route::get('/productsByBrands/{id}', 'Website\WebsiteController@productsByBrands')->name('productsByBrands');


    Route::get('products-range', function () {
        $products = Product::skip(rand(500, 900))->limit(10)->get();
        $html = "";
        foreach ($products as $product) {
            $html .= "<div class='col-lg-4'>";
            $html .= view('website.components.product_box', compact('product'))->render();
            $html .= "</div>";
        }

        return $html;
    })->name('route name');



    // Route::get('/checkout', 'FrontendController@checkout');
    // Route::post('/checkout', 'FrontendController@confirm_order');
    // Route::get('/order-complete/{id}','FrontendController@order_complete');
    // Route::get('/order-complete/{id}/print','FrontendController@order_complete_print')->name('download_invoice');
    // Route::get('/invoice/{invoice}', 'WebsiteController@invoice_download')->name('invoice');

    // Cart
    // Route::post('add_to_cart', 'WebsiteController@add_to_cart');
    // Route::get('clear_cart', 'WebsiteController@clear_cart');
    // Route::get('cart_all', 'WebsiteController@cart_all');

    // Route::get('/cart', 'CartController@cart');
    // Route::get('/wishlist', 'CartController@cart');

    // Route::get('/checkout', 'FrontendController@checkout');
    // Route::post('/checkout', 'FrontendController@confirm_order');
    // Route::get('/order-complete/{id}','FrontendController@order_complete');
    // Route::get('/order-complete/{id}/print','FrontendController@order_complete_print')->name('download_invoice');
    // Route::get('/invoice/{invoice}', 'WebsiteController@invoice_download')->name('invoice');


    // Route::get('/profile', 'FrontendController@profile')->name('frontend.profile');
    // Route::get('/orders', 'FrontendController@orders')->name('frontend.orders');
    // Route::get('/my-reviews', 'FrontendController@my_reviews')->name('frontend.reviews');

    // Route::get('/address', 'FrontendController@address')->name('frontend.address');
    // Route::post('/address', 'FrontendController@address_update');

    // Route::get('/account-details', 'FrontendController@account_details')->name('frontend.account_details');
    // Route::post('/account-details', 'FrontendController@account_details_update');

    // Route::get('/reset-password', 'FrontendController@reset_password')->name('frontend.reset_password');
    // Route::post('/reset-password', 'FrontendController@reset_password_update');


});

Route::get('/insert/purcahse-price', function() {
    $products = Product::all();
    foreach($products as $product) {
        // if(!$product->sales_price || $product->sales_price < 1000) {
        //     $product->sales_price = rand(2000, 4000);
        // }
        $product->purchase_price = $product->sales_price - rand(50, 100);
        $product->save();
    }
})->name('route.eft');

Route::group(['prefix' => '', 'namespace' => "Controllers"], function () {

    Route::get('/tt', function () {
        $p = \App\Models\Product::class;
        $c = \App\Models\Category::class;
        $b = \App\Models\Brand::class;
        $t = \App\Models\Tag::class;
        $weburl = \App\Models\WebsiteUrl::class;
        // $weburl::truncate();

        foreach ($weburl::select('id', 'url')->get() as $item) {
            // $check = $weburl::where('url',$item->url)->first();
            // if($check){
            //     $item->url = $item->url.$item->id;
            //     $item->save();
            // }
            // $weburl::insert([
            //     "table_id" => $item->id,
            //     "table_name" => 'brands',
            //     'url' => $item->url,
            // ]);
            if ($item->url[0] == '/') {
                $item->url = substr($item->url, 1, strlen($item->url));
                $item->save();
            }
        }
    });
});

Route::get('/admin', function () {
    if(!Auth::check()) {
        return redirect()->route('login');
    }
    $user = \App\Models\User::find(auth()->user()->id);
    $role = $user->roles()->whereIn('role_serial', [1, 2])->first();
    if ($role) {
        return view('backend.dashboard');
    } else {
        return redirect()->route('frontend.profile');
    }
})->name('admin');

Route::get('/cat', function () {
    return response()->json(\App\Models\Category::select(['id', 'name', 'parent_id'])->get());
});

Route::post('/seo-logout', function () {
    if (auth()->check()) {
        auth()->logout();
    }

    return redirect('/');
});


Route::prefix('')->namespace('Controllers')->group(function () {
    // Route::get('/{url}/{url2?}/{url3?}', 'WebsiteController@product_and_category_by_url')->where('url', '^(?!api\/)[\/\w\.-]*');
});
