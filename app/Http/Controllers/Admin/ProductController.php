<?php

namespace App\Http\Controllers\Admin;

// php artisan make:request ProductValidate
use App\Brand;
use App\Color;
use App\Product;
use App\Category;
use App\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProductValidate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    public function __construct() {
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if(request('status') == 'trashed') {
            $products = Product::with('brand', 'files')->onlyTrashed()->paginate(2);
        }else {
            $products = Product::with('brand', 'files')->active()->orderBy('id', 'DESC')->paginate(2);
        }
    
        return view('admin.product.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::active()->get();
        $subcategories = Subcategory::active()->get();
        $colors = Color::active()->get();
        $brands = Brand::active()->get();
        return view('admin.product.add', compact('categories', 'subcategories', 'colors', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidate $request) {
        $request['product_slug'] = Str::slug($request->product_name);
        $product = Product::create($request->all());

        if($request->hasFile('images')) {
            $images = $request->file('images');
            foreach($images as $image) {
                $imageName = Str::slug($request->product_name)."_".time()."_".uniqid().".".$image->getClientOriginalExtension();

                if(!Storage::disk('public')->exists('products')) {
                    Storage::disk('public')->makeDirectory('products');
                }

                Image::make($image)->fit(555,600)->save(public_path('storage/products/'.$imageName));
                $product->files()->create(['image' => $imageName]);
            }
        }

        $product->subcategories()->attach($request->subcategories);
        $product->colors()->attach($request->colors);

        if($product) {
            return back()->with('success', $product->product_name.' created successfully');
        }else {
            return back()->with('error', 'Opps! An Error Occurred!');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        // $product = $product->load(['brand', 'subcategories.pivot']);
        return view('admin.product.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        $categories = Category::active()->get();
        $subcategories = Subcategory::active()->get();
        $colors = Color::active()->get();
        $brands = Brand::active()->get();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'colors', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) {
        $request['product_slug'] = Str::slug($request->product_name);

        if($request->hasFile('images')) {
            // folderDelete dtabaseDelete newImageReceiev name makeDirectory saveName save/insert/create 
            foreach($product->files as $productImage) {
                if(Storage::disk('public')->exists('products/'.$productImage->image)) {
                    Storage::disk('public')->delete('products/'.$productImage->image);
                }
            }

            $product->files()->delete();


            $images = $request->file('images');
            foreach($images as $image) {
                // name makeDirectory save/insert/create
                $imageName = Str::slug($request->product_name)."_".time()."_".uniqid().".".$image->getClientOriginalExtension();

                Image::make($image)->fit(555, 600)->save(public_path('storage/products/'.$imageName));

                $product->files()->create(['image' => $imageName]);
            }
        }

        $product->subcategories()->sync($request['subcategories']);
        $product->colors()->sync($request['colors']);
        $update = $product->update($request->all());

        if($update) {
            return back()->with('success', $product->product_name." updated successfully.");
        }else {
            return back()->with('error', 'Opps! An error occurred.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        $delete = $product->delete();

        if($delete) {
            return back()->with('success', 'Product Deleted Successfully!');
        }else {
            return back()->with('error', 'Opps! An error occurred');
        }
    }

    public function restore($id) {
        $product = Product::onlyTrashed()->findOrFail($id);
        $restore = $product->restore();

        if($restore) {
            return back()->with('success', 'Product Restored Successfully!');
        }else {
            return back()->with('error', 'Opps! An error occurred');
        }
    }

    public function forceDelete($slug) {
        $product = Product::onlyTrashed()->where('product_slug', $slug)->firstOrFail();
        foreach($product->files as $productImage) {
            if(Storage::disk('public')->exists('products/'.$productImage->image)) {
                Storage::disk('public')->delete('products/'.$productImage->image);
            }
        }

        $product->files()->delete();
        $product->subcategories()->detach();
        $product->colors()->detach();

        $delete = $product->forceDelete();

        if($delete) {
            return back()->with('success', 'Product Permanently Deleted Successfully!');
        }else {
            return back()->with('error', 'Opps! An error occurred');
        }
    }


    public function subcategory($id) {
        $subcategories  = Subcategory::active()->where('category_id', $id)->get();
        return view('admin.product.subcategory-ajax', compact('subcategories'));
        // return response()->json($subcategories);
    }
}





















        // $this->validate($request, [
        //     'product_name' => 'required|string|max:255',
        //     'brand_id' => 'required|integer',
        //     'product_price' => 'required|numeric',
        //     'product_discount' => 'required|numeric',
        //     'product_stock' => 'required|numeric',
        //     'product_description' => 'required|string',
        //     'product_feature' => 'required',
        //     'new_from' => 'required',
        //     'new_to' => 'required',
        // ], [
        //     'product_name.required' => 'Please enter product name!',
        //     'brand_id.required' => 'Please enter product brand!',
        //     'product_price.required' => 'Please enter product price!',
        //     'product_discount.required' => 'Please enter product discount!',
        //     'product_stock.required' => 'Please enter product stock!',
        //     'product_description.required' => 'Please enter product description!',
        // ]);

        // Object oriented way
        // $product = new Product();
        // $product->product_name = $request->product_name;
        // $product->brand_id = $request->brand_id;
        // $product->product_price = $request->product_price;
        // $product->product_discount = $request->product_discount;
        // $product->product_stock = $request->product_stock;
        // $product->product_description = $request->product_description;
        // $product->product_feature = $request->product_feature;
        // $product->new_from = $request->new_from;
        // $product->new_to = $request->new_to;
        // $product->save();

        // Array insertion in structred programming way
        // $data = [];
        // $data['product_name'] = $request->product_name;
        // $data['brand_id'] = $request->brand_id;
        // $data['product_price'] = $request->product_price;
        // $data['product_discount'] = $request->product_discount;
        // $data['product_stock'] = $request->product_stock;
        // $data['product_description'] = $request->product_description;
        // $data['product_feature'] = $request->product_feature;
        // $data['new_from'] = $request->new_from;
        // $data['new_to'] = $request->new_to;
        // Product::insert($data);