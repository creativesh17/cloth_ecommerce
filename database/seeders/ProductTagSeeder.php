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

        DB::table('product_tag')->insert([            
            'product_id' => 1,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 1,
            'tag_id' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 1,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 1,
            'tag_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 2,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 2,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 2,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 2,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 3,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 3,
            'tag_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 3,
            'tag_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 4,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 4,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 4,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 4,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 5,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 5,
            'tag_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 5,
            'tag_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 5,
            'tag_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 6,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        DB::table('product_tag')->insert([            
            'product_id' => 6,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('product_tag')->insert([            
            'product_id' => 6,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 6,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 7,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 7,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 7,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 8,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 8,
            'tag_id' => 23,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 8,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 8,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 9,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 9,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 9,
            'tag_id' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 9,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 9,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 9,
            'tag_id' => 23,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 10,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 10,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 10,
            'tag_id' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 10,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 10,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 10,
            'tag_id' => 23,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 11,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 11,
            'tag_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 11,
            'tag_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 11,
            'tag_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////
        
        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 12,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        
        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 13,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 13,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 13,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 13,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 14,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 14,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 14,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 14,
            'tag_id' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 15,
            'tag_id' => 23,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 15,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 15,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 15,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 15,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 15,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 24,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 16,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 24,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 17,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 18,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 18,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 18,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 18,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 18,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 18,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 19,
            'tag_id' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 26,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 20,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 27,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 21,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 27,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 22,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 23,
            'tag_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('product_tag')->insert([            
            'product_id' => 23,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 23,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 23,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 23,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 24,
            'tag_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 24,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 24,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 24,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 24,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 24,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 25,
            'tag_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       

        DB::table('product_tag')->insert([            
            'product_id' => 25,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 25,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 25,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 25,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 26,
            'tag_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 26,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 26,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 26,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 26,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 26,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 27,
            'tag_id' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('product_tag')->insert([            
            'product_id' => 27,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 27,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 27,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 27,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 27,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 28,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 28,
            'tag_id' => 29,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 18,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 28,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 29,
            'tag_id' => 29,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 30,
            'tag_id' => 19,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //////////////////////

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 17,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_tag')->insert([            
            'product_id' => 31,
            'tag_id' => 19,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Schema::enableForeignKeyConstraints();

    }
}
