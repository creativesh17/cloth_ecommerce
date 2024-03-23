<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Schema::disableForeignKeyConstraints();
        DB::table('product_tag')->truncate();

        Tag::factory()->count(100)->create()->each(
            function($product) {
                $tags = Tag::all()->random(mt_rand(1, 5))->pluck('id');

                $product->tags()->attach($tags);
        });

        Schema::enableForeignKeyConstraints();
    }
}
