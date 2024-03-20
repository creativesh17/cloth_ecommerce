<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product\ProductVariantValue;
use App\Models\Product\ProductVariantValueProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;

class CompareController extends Controller
{
    public function products_compare(Request $request, $id)
    {
        $session_products = session()->get('compare_product_list');

        if (is_array($session_products)) {
            $session_products[] = $id;
        } else {
            $session_products = [$id];
        }

        $session_products = array_unique($session_products);

        session()->put('compare_product_list', $session_products);
        session()->save();

        return response()->json([
            "message" => "Product added to compare list.",
            "data" => $session_products,
        ]);
    }

    public function compare_page(Request $request) 
    {
        // session()->flush();
        $session_products = session()->get('compare_product_list');

        $compareProducts = [];
        $variantKeys = [];
        $comp_keys = [];

        $compareItems = [];
        $totalRating = [];
        $totalReceivedRating = 0;
        if (is_array($session_products)) {

            foreach ($session_products as $key => $item) {
                $compareItem = Product::where('id', $item)->with('reviews')->first();
                $compareItems[] = $compareItem;
            }

            $variantTitles = [];
            for ($i = 0; $i < count($compareItems); $i++) {
                $product = $compareItems[$i];
                $variants = $product->productvariants()->get()->unique('title');
                foreach ($variants as $key => $variant) {
                    $variantTitles[$variant->title . "_" . $variant->id] =  $variant->value_products()->where('product_id', $product->id)->with('value')->get();
                }
            }

            $comp_keys = [
                "image",
                "name",
                "short description",
                "rating",
                "active price",
                "rating",
                "availablity",
            ];

            
            foreach ($variantTitles as $key => $variants) {
                $variantKeys[] = $key;
            }

            

            for ($i = 0; $i < count($compareItems); $i++) {

                $compareProducts[$i] = [
                    "id" => $compareItems[$i]->id,
                    "image" => $compareItems[$i]->photo_url ?: "",
                    "name" => $compareItems[$i]->product_name,
                    "short description" => $compareItems[$i]->short_description,
                    // "regular_price" => $compareItems[$i]->sales_price,
                    "active price" => $compareItems[$i]->active_price,
                    "rating" => $compareItems[$i]->rating_count,
                    "availablity" => $compareItems[$i]->is_in_stock,
                ];

                foreach ($variantKeys as $variant) {
                    $vkey = explode("_", $variant);

                    $product_id = $compareItems[$i]->id;
                    $variant_id = $vkey[1];

                    $productVariantValues = ProductVariantValueProduct::where('product_variant_id', $variant_id)->where('product_id', $product_id)->get();

                    $title = "";
                    foreach ($productVariantValues as $j => $item) {
                        $saveProductValueTitle = ProductVariantValue::find($item->product_variant_value_id);
                        $title .= $saveProductValueTitle->title . ", ";
                    }

                    $compareProducts[$i][$vkey[0]] = $title;
                }

            }
           
        }



        // return $products = collect($compareProducts)->toObject();
        // return (object)$compareProducts;
        // dd($compareProducts);
        // return $compareProduct;
        // return $variantKeys;
        // return $comp_keys;
        return view('website.pages.compare', compact('compareProducts','variantKeys','comp_keys'));

        /**
         [1, 2, 3];

         [
            color,
            size,

            size,
            type,

            clock_speed,
            core,
            size,
            color,
         ]

        variant_values = array_uniqe [
            color,
            size,
            type,
            clock_speed,
            core,
        ];

        $compare_keys = [
            "id",
            "name",
            "image",
            "short_descriptin",
            "ratting",
            "availablity",

            color,
            size,
            type,
            clock_speed,
            core,
        ];

         compare_product_array = [
            [
                "id" => 1,
                "name" => "",
                "image" => "",
                "short_descriptin" => "",
                "ratting" => 5,
                "availablity" => "in stock",

                "color" => "",
                "size" => "xl,md,lg",
                "type" => "",
                "clock_speed" => "",
                "core" => 4,

            ],
            [
                "id" => 2,
                "name" => "",
                "image" => "",
                "short_descriptin" => "",
                "ratting" => 5,
                "availablity" => "in stock",
                "color" => "",
                "size" => "xl,md,lg",
                "type" => "",
                "clock_speed" => "",
                "core" => 4,

            ],
            [
                "id" => 3,
                "name" => "",
                "image" => "",
                "short_descriptin" => "",
                "ratting" => 5,
                "availablity" => "in stock",
                "color" => "",
                "size" => "xl,md,lg",
                "type" => "",
                "clock_speed" => "",
                "core" => 4,

            ],

         ];
         */
    }


    public function clear_compare_all() {
        session()->forget('compare_product_list');
        return back()->with('success');
    }

    public function clear_compare_item($id) {
        // session()->forget('compare_product_list');

        $session_products = session()->get('compare_product_list');

        $index = array_search($id, $session_products);

        unset($session_products[$index]);

        session()->put('compare_product_list', $session_products);
        session()->save();

        return back()->with('success');

    }
}
