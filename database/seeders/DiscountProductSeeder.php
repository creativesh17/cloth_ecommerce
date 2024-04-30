<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DiscountProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Schema::disableForeignKeyConstraints();
        DB::table('discount_products')->truncate();

        DB::table('discount_products')->insert([
            'product_id' => 1,
            'main_price' => 2139.90,
            'discount_percent' => 10.00,
            'discount_amount' => 213.99,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 2,
            'main_price' => 1611.75,
            'discount_percent' => 10.00,
            'discount_amount' => 161.17,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('discount_products')->insert([
            'product_id' => 3,
            'main_price' => 2921.10,
            'discount_percent' => 10.00,
            'discount_amount' => 292.11,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 4,
            'main_price' => 2783.55,
            'discount_percent' => 10.00,
            'discount_amount' => 278.35,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 5,
            'main_price' => 928.00,
            'discount_percent' => 10.00,
            'discount_amount' => 92.80,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 6,
            'main_price' => 3409.00,
            'discount_percent' => 10.00,
            'discount_amount' => 340.90,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 7,
            'main_price' => 2588.00,
            'discount_percent' => 10.00,
            'discount_amount' => 258.80,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 8,
            'main_price' => 6827.00,
            'discount_percent' => 10.00,
            'discount_amount' => 682.70,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 9,
            'main_price' => 7472.09,
            'discount_percent' => 10.00,
            'discount_amount' => 747.20,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 10,
            'main_price' => 7472.09,
            'discount_percent' => 10.00,
            'discount_amount' => 747.20,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('discount_products')->insert([
            'product_id' => 11,
            'main_price' => 50.00,
            'discount_percent' => 10.00,
            'discount_amount' => 5.00,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 
        DB::table('discount_products')->insert([
            'product_id' => 24,
            'main_price' => 7032.00,
            'discount_percent' => 10.00,
            'discount_amount' => 703.20,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 25,
            'main_price' => 12924.00,
            'discount_percent' => 10.00,
            'discount_amount' => 1292.40,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 26,
            'main_price' => 3564.00,
            'discount_percent' => 10.00,
            'discount_amount' => 356.40,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 27,
            'main_price' => 1260.00,
            'discount_percent' => 10.00,
            'discount_amount' => 126.00,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 28,
            'main_price' => 21976.00,
            'discount_percent' => 10.00,
            'discount_amount' => 2197.6,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 29,
            'main_price' => 11671.00,
            'discount_percent' => 10.00,
            'discount_amount' => 1167.10,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 30,
            'main_price' => 1970.00,
            'discount_percent' => 10.00,
            'discount_amount' => 197.00,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 

        DB::table('discount_products')->insert([
            'product_id' => 31,
            'main_price' => 19995.00,
            'discount_percent' => 10.00,
            'discount_amount' => 1999.50,
            'discount_last_date' => now()->addYears(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Schema::enableForeignKeyConstraints();
    }
}
