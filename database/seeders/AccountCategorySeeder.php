<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AccountCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('account_categories')->truncate();

        DB::table('account_categories')->insert([
            'title' => 'Product Sale',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('account_categories')->insert([
            'title' => 'Snacks',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('account_categories')->insert([
            'title' => 'Charity',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('account_categories')->insert([
            'title' => 'Guest',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('account_categories')->insert([
            'title' => 'Canceled Order',
            'slug' => 'canceled-order',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Schema::enableForeignKeyConstraints();

    }
}
