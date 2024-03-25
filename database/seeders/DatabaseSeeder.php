<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\ProductImage;
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

        Schema::disableForeignKeyConstraints();

        Brand::flushEventListeners();
        Category::flushEventListeners();
        Tag::flushEventListeners();
        Product::flushEventListeners();
        ProductImage::flushEventListeners();

        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            CategoryProductSeeder::class,
            ProductTagSeeder::class,
            ProductVariantSeeder::class,
            ProductVariantValueSeeder::class,
            ProductVariantValueProductSeeder::class
        ]);



        // $categoriesQuantity = 30;
        // Category::factory()->count($categoriesQuantity)->create();

        Schema::enableForeignKeyConstraints();

    }
}









// \App\Models\User::factory(10)->create();
// $this->call([
//     UserSeeder::class,
//     ExtraUserSeeder::class,
//     ContactMessageSeeder::class,
// ]);

// $this->call(UserRoleTableSeeder::class);
// $this->call(UsersTableSeeder::class);
