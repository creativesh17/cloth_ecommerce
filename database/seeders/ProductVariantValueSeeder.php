<?php

namespace Database\Seeders;

use App\Models\Product\ProductVariantValue;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductVariantValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        ProductVariantValue::truncate();

        ProductVariantValue::insert([
            // 1
            [
                'product_variant_id' => 1,
                'title' => 'S',
            ],
            // 2
            [
                'product_variant_id' => 1,
                'title' => 'M',
            ],
            // 3
            [
                'product_variant_id' => 1,
                'title' => 'L',
            ],
            // 4
            [
                'product_variant_id' => 1,
                'title' => 'XL',
            ],
            // 5
            [
                'product_variant_id' => 1,
                'title' => 'XXL',
            ],
            // 6
            [
                'product_variant_id' => 2,
                'title' => '32',
            ],
            // 7
            [
                'product_variant_id' => 2,
                'title' => '34',
            ],
            // 8
            [
                'product_variant_id' => 2,
                'title' => '36',
            ],
            // 9
            [
                'product_variant_id' => 2,
                'title' => '38',
            ],
            // 10
            [
                'product_variant_id' => 2,
                'title' => '40',
            ],
            // 11
            [
                'product_variant_id' => 2,
                'title' => '42',
            ],
            // 12
            [
                'product_variant_id' => 2,
                'title' => '44',
            ],
            // 13
            [
                'product_variant_id' => 2,
                'title' => '46',
            ],
            // 14
            [
                'product_variant_id' => 3,
                'title' => 'Black',
            ],
            // 15
            [
                'product_variant_id' => 3,
                'title' => 'White',
            ],
            // 16
            [
                'product_variant_id' => 3,
                'title' => 'Maroon',
            ],
            // 17
            [
                'product_variant_id' => 3,
                'title' => 'Sky',
            ],
            // 18
            [
                'product_variant_id' => 3,
                'title' => 'Red',
            ],
            // 19
            [
                'product_variant_id' => 3,
                'title' => 'Grey',
            ],
            // 20
            [
                'product_variant_id' => 3,
                'title' => 'Green',
            ],
            // 21
            [
                'product_variant_id' => 4,
                'title' => 'Cotton',
            ],
            // 22
            [
                'product_variant_id' => 4,
                'title' => 'Polyester',
            ],
            // 23
            [
                'product_variant_id' => 4,
                'title' => 'Silk',
            ],
            // 24
            [
                'product_variant_id' => 4,
                'title' => 'Wool',
            ],
            // 25
            [
                'product_variant_id' => 4,
                'title' => 'Denim',
            ],
            // 26
            [
                'product_variant_id' => 5,
                'title' => '42',
            ],
            // 27
            [
                'product_variant_id' => 5,
                'title' => '44',
            ],
            // 28
            [
                'product_variant_id' => 5,
                'title' => '46',
            ],
            // 29
            [
                'product_variant_id' => 5,
                'title' => '48',
            ],
            // 30
            [
                'product_variant_id' => 5,
                'title' => '50',
            ],
            // 31
            [
                'product_variant_id' => 5,
                'title' => '52',
            ],
            // 32
            [
                'product_variant_id' => 6,
                'title' => 'Handloom',
            ],
            // 33
            [
                'product_variant_id' => 6,
                'title' => 'Embroidered, Karchupi ornamented with tassel',
            ],

        ]);


        Schema::enableForeignKeyConstraints();
    }
}
