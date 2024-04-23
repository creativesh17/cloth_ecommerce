<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('order_details')->truncate();

        DB::table('order_details')->insert([
            'order_id' => 1,
            'user_id' => 129,
            'product_id' => 1,
            'product_price' => 1925.91,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 1,
            'user_id' => 129,
            'product_id' => 2,
            'product_price' => 1450.58,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 2,
            'user_id' => 126,
            'product_id' => 3,
            'product_price' => 2628.99,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 2,
            'user_id' => 126,
            'product_id' => 4,
            'product_price' => 2505.20,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 3,
            'user_id' => 129,
            'product_id' => 5,
            'product_price' => 835.20,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 3,
            'user_id' => 129,
            'product_id' => 6,
            'product_price' => 3068.10,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 4,
            'user_id' => 126,
            'product_id' => 7,
            'product_price' => 2329.20,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 4,
            'user_id' => 126,
            'product_id' => 8,
            'product_price' => 6144.40,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 5,
            'user_id' => 129,
            'product_id' => 9,
            'product_price' => 6724.89,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_details')->insert([
            'order_id' => 5,
            'user_id' => 129,
            'product_id' => 10,
            'product_price' => 6724.89,
            'qty' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Schema::enableForeignKeyConstraints();
        
    }


    
}
