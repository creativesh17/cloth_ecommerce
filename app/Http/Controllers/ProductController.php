<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Color;
use App\Product;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function __construct() {
        
    }

    public function index() {
        return view('website.product');
    }
    
    public function view(Product $product) {
        $product->load('reviews');
        return view('website.product-single', compact('product'));
    }

    public function productByCategory(Category $category) {
        $products = $category->subcategories()
                                ->with('products')->get()
                                ->pluck('products')->collapse()->unique('id');

        return view('website.product', compact('products'));
    }

    public function productBySubcategory(Subcategory $subcategory) {
        $products = $subcategory->products;
        return view('website.product', compact('products'));
    }

    public function productByBrand(Brand $brand) {
        $products = $brand->products;
        return view('website.product', compact('products'));
    }

    public function productByColor(Color $color) {
        $products = $color->products;
        return view('website.product', compact('products'));
    }

    public function search(Request $request) {
        $search = $request->search;
        $products = Product::where('product_name', 'Like', "%$search%")
                        ->orWhere('product_description', 'Like', "%$search%")
                        ->paginate(1);
        return view('website.product', compact('products'));
    }
}
