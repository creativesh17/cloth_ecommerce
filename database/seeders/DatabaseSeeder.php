<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     UserSeeder::class,
        //     ExtraUserSeeder::class,
        //     ContactMessageSeeder::class,
        // ]);

        // $this->call(UsersTableSeeder::class);
        // $this->call(UserRoleTableSeeder::class);

        Schema::disableForeignKeyConstraints();

        Brand::truncate();
        Tag::truncate();
        Product::truncate();
        DB::table('category_product')->truncate();
        DB::table('category_tag')->truncate();
        DB::table('product_tag')->truncate();

        Category::flushEventListeners();
        Product::flushEventListeners();

        $categoriesQuantity = 30;
        $productsQuantity = 1000;

        
        Category::factory()->count($categoriesQuantity)->create();

        Schema::enableForeignKeyConstraints();

    }
}
