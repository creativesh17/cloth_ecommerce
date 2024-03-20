<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $skip = 0;
    public $take = 0;

    public function get_category_product($category_slug) {
        return 5;
        if(null !== Category::where('slug', $category_slug)->first()) {
            $category = Category::where('slug', $category_slug)->first();
            $categories = Category::where('slug', $category_slug)->firstOrFail()->products()->paginate();
            // dd($categories);
            return view('website.pages.category_products', compact('category', 'categories'));
        } else {
            $category = null;
            $categories = null;
            return view('website.pages.category_products', compact('category', 'categories'));
        }
        // dd($productsByCategory);
    }


    public function productsearch(Request $request) {
        $output = '';
        if($request->ajax()) {
            $search = $request->get('search');
            if($search != '') {
                $products = Product::where('status', 1)
                ->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('search_keywords', 'LIKE', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->limit(4)->get();
            } else {
                return '';
            }

            return view('website.components.ajax_search_result', compact('products'));

        }

    }


    public function productSearchPage(Request $request) {
        $search = request()->get('search');
        $products = Product::where('status', 1)
                ->where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('search_keywords', 'LIKE', '%' . $search . '%')
                ->orderBy('sales_price', 'desc')
                ->paginate(12);

        // return view('website.pages.search_product', compact('products'));
        return view('website.components.ajax_search_result', compact('products'));
    }



    public function search_products(Request $request) {
        $products = Product::whereBetween('price',[$request->left_value, $request->right_value])->get();
        return view('search_result', compact('products'))->render();
    }

    public function sort_by(Request $request) {

        if($request->sort_by == 'lowest_price'){
            $products = Product::orderBy('price','asc')->get();
        }

        if($request->sort_by == 'highest_price'){
            $products = Product::orderBy('price','desc')->get();
        }
        return view('search_result', compact('products'))->render();

    }


}
