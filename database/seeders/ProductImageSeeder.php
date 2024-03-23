<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        ProductImage::truncate();

        ProductImage::insert([
        	[
        		'product_id' => 1,
		        'image' => "uploads/product/1.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 2,
		        'image' => "uploads/product/2.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 3,
		        'image' => "uploads/product/3.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 4,
		        'image' => "uploads/product/4.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 5,
		        'image' => "uploads/product/5.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 6,
		        'image' => "uploads/product/6.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 7,
		        'image' => "uploads/product/7.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 8,
		        'image' => "uploads/product/8.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 8,
		        'image' => "uploads/product/8a.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 9,
		        'image' => "uploads/product/9.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 10,
		        'image' => "uploads/product/10.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 11,
		        'image' => "uploads/product/11.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 12,
		        'image' => "uploads/product/12.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 13,
		        'image' => "uploads/product/13.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 14,
		        'image' => "uploads/product/14.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 15,
		        'image' => "uploads/product/15-a.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 15,
		        'image' => "uploads/product/15-b.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 16,
		        'image' => "uploads/product/16.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 17,
		        'image' => "uploads/product/17.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 18,
		        'image' => "uploads/product/18.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 19,
		        'image' => "uploads/product/19.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 20,
		        'image' => "uploads/product/20.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 21,
		        'image' => "uploads/product/21.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 22,
		        'image' => "uploads/product/22.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 23,
		        'image' => "uploads/product/23.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 24,
		        'image' => "uploads/product/24.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 25,
		        'image' => "uploads/product/25.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 26,
		        'image' => "uploads/product/26.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 27,
		        'image' => "uploads/product/27-a.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 27,
		        'image' => "uploads/product/27-b.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 28,
		        'image' => "uploads/product/28.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 29,
		        'image' => "uploads/product/29.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 30,
		        'image' => "uploads/product/30.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        	[
        		'product_id' => 31,
		        'image' => "uploads/product/31.jpg",
		        'alt' => null,
		        'creator' => 1,
		        'slug' => null,
		    ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
