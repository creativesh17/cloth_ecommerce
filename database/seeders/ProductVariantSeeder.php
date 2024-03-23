<?php

namespace Database\Seeders;

use App\Models\Product\ProductVariant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        ProductVariant::truncate();

        ProductVariant::insert([
            // 1
            [
                'title' => 'Size',
                'creator' => 2,
                'slug' => Carbon::now()->format('Ymds') . uniqid(5),
            ],
            // 2
            [
                'title' => 'Waist Size',
                'creator' => 2,
                'slug' => Carbon::now()->format('Ymds') . uniqid(5),
            ],
            // 3
            [
                'title' => 'Color',
                'creator' => 2,
                'slug' => Carbon::now()->format('Ymd') . uniqid(5),
            ],
            // 4
            [
                'title' => 'Fabric',
                'creator' => 2,
                'slug' => Carbon::now()->format('Ymd') . uniqid(5),
            ],
            // 5
            [
                'title' => 'Chest Size',
                'creator' => 2,
                'slug' => Carbon::now()->format('Ymds') . uniqid(5),
            ],
            // 6
            [
                'title' => 'Embellishment',
                'creator' => 2,
                'slug' => Carbon::now()->format('Ymds') . uniqid(5),
            ],
        ]);


        Schema::enableForeignKeyConstraints();
    }
}
