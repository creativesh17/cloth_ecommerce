<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        Brand::truncate();

        Brand::insert([
            // 1
        	[
        		'name' => 'Richman',
		        'url' => Str::slug('Richman'),
		        'creator' => '1',
		        'slug' => Str::slug('Richman'),
		    ],
            // 2
        	[
        		'name' => 'Lubnan',
		        'url' => Str::slug('Lubnan'),
		        'creator' => '1',
		        'slug' => Str::slug('Lubnan'),
		    ],
            // 3
        	[
        		'name' => 'Kaykraft',
		        'url' => Str::slug('Kaykraft'),
		        'creator' => '1',
		        'slug' => Str::slug('Kaykraft'),
		    ],
            // 4
        	[
        		'name' => 'Yellow',
		        'url' => Str::slug('Yellow'),
		        'creator' => '1',
		        'slug' => Str::slug('Yellow'),
		    ],
            // 5
        	[
        		'name' => 'Country Boy',
		        'url' => Str::slug('Country Boy'),
		        'creator' => '1',
		        'slug' => Str::slug('Country Boy'),
		    ],
            // 6
        	[
        		'name' => 'Infinity',
		        'url' => Str::slug('Infinity'),
		        'creator' => '1',
		        'slug' => Str::slug('Infinity'),
		    ],
            // 7
        	[
        		'name' => 'Twelve',
		        'url' => Str::slug('Twelve'),
		        'creator' => '1',
		        'slug' => Str::slug('Twelve'),
		    ],
            // 8
        	[
        		'name' => 'Rise',
		        'url' => Str::slug('Rise'),
		        'creator' => '1',
		        'slug' => Str::slug('Rise'),
		    ],
            // 9
        	[
        		'name' => 'Gucci',
		        'url' => Str::slug('Gucci'),
		        'creator' => '1',
		        'slug' => Str::slug('Gucci'),
		    ],
            // 10
        	[
        		'name' => 'Grameen Check',
		        'url' => Str::slug('Grameen Check'),
		        'creator' => '1',
		        'slug' => Str::slug('Grameen Check'),
		    ],
        ]);


        Schema::enableForeignKeyConstraints();
    }
}
