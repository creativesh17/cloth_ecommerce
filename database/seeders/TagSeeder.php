<?php

namespace Database\Seeders;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();

        Tag::insert([
            // 1
        	[
        		'title' => 'Eid Collection',
        		'url' => Str::slug('Eid Collection'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 2
        	[
        		'title' => 'MensFashion',
        		'url' => Str::slug('MensFashion'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 3
        	[
        		'title' => 'WomensFashion',
        		'url' => Str::slug('WomensFashion'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 4
        	[
        		'title' => 'Trendy',
        		'url' => Str::slug('Trendy'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 5
        	[
        		'title' => 'Fashion',
        		'url' => Str::slug('Fashion'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 6
        	[
        		'title' => 'Shirts',
        		'url' => Str::slug('Shirts'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 7
        	[
        		'title' => 'T-shirts',
        		'url' => Str::slug('T-shirts'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 8
        	[
        		'title' => 'Saree',
        		'url' => Str::slug('Saree'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 9
        	[
        		'title' => 'Panjabi',
        		'url' => Str::slug('Panjabi'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 10
        	[
        		'title' => 'Pajama',
        		'url' => Str::slug('Pajama'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 11
        	[
        		'title' => 'EthnicWear',
        		'url' => Str::slug('EthnicWear'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 12
        	[
        		'title' => 'EthnicWear',
        		'url' => Str::slug('EthnicWear'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 13
        	[
        		'title' => 'Clothing',
        		'url' => Str::slug('Clothing'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 14
        	[
        		'title' => 'Outfit',
        		'url' => Str::slug('Outfit'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 15
        	[
        		'title' => 'Style',
        		'url' => Str::slug('Style'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 16
        	[
        		'title' => 'Stylish',
        		'url' => Str::slug('Stylish'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 17
        	[
        		'title' => 'NewArrivals',
        		'url' => Str::slug('NewArrivals'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 18
        	[
        		'title' => 'Formal wear',
        		'url' => Str::slug('Formal wear'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 19
        	[
        		'title' => 'Silk garments',
        		'url' => Str::slug('Silk garments'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
            // 20
        	[
        		'title' => 'Silk garments',
        		'url' => Str::slug('Silk garments'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        	],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
