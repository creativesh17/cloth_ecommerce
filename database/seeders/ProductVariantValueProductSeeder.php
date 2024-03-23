<?php

namespace Database\Seeders;

use App\Models\Product\ProductVariantValueProduct;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductVariantValueProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        ProductVariantValueProduct::truncate();

        ProductVariantValueProduct::insert([

            // 1
            // 1
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 1,
            ],
            // 2
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 1,
            ],
            // 3
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 1,
            ],
            // 4
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 1,
            ],
            // 5
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 1,
            ],
            // 6
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 1,
            ],
            // 7
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 1,
            ],
            // 8
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 1,
            ],
            // 9
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 1,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 2
            // 10
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 2,
            ],
            // 11
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 2,
            ],
            // 12
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 2,
            ],
            // 13
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 2,
            ],
            // 14
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 2,
            ],
            // 15
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 2,
            ],
            // 16
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 2,
            ],
            // 17
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 2,
            ],
            // 18
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 2,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 3
            // 19
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 3,
            ],
            // 20
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 3,
            ],
            // 21
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 3,
            ],
            // 22
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 3,
            ],
            // 23
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 3,
            ],
            // 24
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 3,
            ],
            // 25
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 3,
            ],
            // 26
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 3,
            ],
            // 27
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 3,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 4
            // 28
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 5,
            ],
            // 29
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 5,
            ],
            // 30
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 5,
            ],
            // 31
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 5,
            ],
            // 32
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 5,
            ],
            // 33
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 5,
            ],
            // 34
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 5,
            ],
            // 35
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 5,
            ],
            // 36
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 5,
            ],
            // 37
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 5,
            ],
            // 38
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 5,
            ],
            // 39
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 5,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 5
            // 40
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 6,
            ],
            // 41
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 6,
            ],
            // 42
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 6,
            ],
            // 43
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 6,
            ],
            // 44
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 6,
            ],
            // 45
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 6,
            ],
            // 46
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 6,
            ],
            // 47
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 6,
            ],
            // 48
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 6,
            ],
            // 49
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 6,
            ],
            // 50
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 6,
            ],
            // 51
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 6,
            ],
            // 52
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 6,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 6
            // 53
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 7,
            ],
            // 54
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 7,
            ],
            // 55
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 7,
            ],
            // 56
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 7,
            ],
            // 57
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 7,
            ],
            // 58
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 7,
            ],
            // 59
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 7,
            ],
            // 60
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 7,
            ],
            // 61
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 7,
            ],
            // 62
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 7,
            ],
            // 63
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 7,
            ],
            // 64
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 7,
            ],
            // 65
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 7,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 7
            // 66
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 8,
            ],
            // 67
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 8,
            ],
            // 68
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 8,
            ],
            // 69
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 8,
            ],
            // 70
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 8,
            ],
            // 71
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 8,
            ],
            // 72
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 8,
            ],
            // 73
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 8,
            ],
            // 74
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 8,
            ],
            // 75
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 8,
            ],
            // 76
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 8,
            ],
            // 77
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 8,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 8
            // 78
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 9,
            ],
            // 79
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 9,
            ],
            // 80
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 9,
            ],
            // 81
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 9,
            ],
            // 82
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 9,
            ],
            // 83
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 9,
            ],
            // 84
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 9,
            ],
            // 85
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 9,
            ],
            // 86
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 9,
            ],
            // 87
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 9,
            ],
            // 88
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 9,
            ],
            // 89
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 9,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 9
            // 90
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 10,
            ],
            // 91
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 10,
            ],
            // 92
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 10,
            ],
            // 93
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 10,
            ],
            // 94
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 10,
            ],
            // 95
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 10,
            ],
            // 96
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 10,
            ],
            // 97
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 10,
            ],
            // 98
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 10,
            ],
            // 99
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 10,
            ],
            // 100
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 10,
            ],
            // 101
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 10,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            // 10
            // 102
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 11,
            ],
            // 103
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 11,
            ],
            // 104
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 11,
            ],
            // 105
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 11,
            ],
            // 106
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 11,
            ],
            // 107
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 11,
            ],
            // 108
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 11,
            ],
            // 109
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 11,
            ],
            // 110
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 11,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            // 11
            // 111
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 12,
            ],
            // 112
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 12,
            ],
            // 113
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 12,
            ],
            // 114
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 12,
            ],
            // 115
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 12,
            ],
            // 116
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 12,
            ],
            // 117
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 12,
            ],
            // 118
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 12,
            ],
            // 119
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 12,
            ],
            // 120
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 21,
                'product_id' => 12,
            ],
            // 121
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 12,
            ],
            // 122
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 12,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            // 12
            // 123
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 13,
            ],
            // 124
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 13,
            ],
            // 125
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 13,
            ],
            // 126
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 13,
            ],
            // 127
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 13,
            ],
            // 128
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 13,
            ],
            // 129
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 13,
            ],
            // 130
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 13,
            ],
            // 131
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 13,
            ],
            // 132
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 21,
                'product_id' => 13,
            ],
            // 133
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 13,
            ],
            // 134
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 13,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            // 13
            // 135
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 14,
            ],
            // 136
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 14,
            ],
            // 137
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 14,
            ],
            // 138
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 14,
            ],
            // 139
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 14,
            ],
            // 140
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 14,
            ],
            // 141
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 14,
            ],
            // 142
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 14,
            ],
            // 143
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 14,
            ],
            // 144
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 21,
                'product_id' => 14,
            ],
            // 145
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 14,
            ],
            // 146
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 14,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 14
            // 147
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 15,
            ],
            // 148
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 15,
            ],
            // 149
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 15,
            ],
            // 150
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 15,
            ],
            // 151
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 15,
            ],
            // 152
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 15,
            ],
            // 153
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 15,
            ],
            // 154
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 15,
            ],
            // 155
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 15,
            ],
            // 156
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 15,
            ],
            // 157
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 15,
            ],
            // 158
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 15,
            ],
            // 159
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 15,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 15
            // 160
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 16,
            ],
            // 161
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 16,
            ],
            // 162
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 16,
            ],
            // 163
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 16,
            ],
            // 164
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 16,
            ],
            // 165
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 16,
            ],
            // 166
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 16,
            ],
            // 167
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 16,
            ],
            // 168
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 16,
            ],
            // 169
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 16,
            ],
            // 170
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 16,
            ],
            // 171
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 16,
            ],
            // 172
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 16,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 16
            // 173
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 4,
            ],
            // 174
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 4,
            ],
            // 175
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 4,
            ],
            // 176
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 4,
            ],
            // 177
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 4,
            ],
            // 178
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 4,
            ],
            // 179
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 4,
            ],
            // 180
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 4,
            ],
            // 181
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 4,
            ],
            // 182
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 4,
            ],
            // 183
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 4,
            ],
            // 184
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 4,
            ],
            // 185
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 4,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 17
            // 186
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 17,
            ],
            // 187
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 17,
            ],
            // 188
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 17,
            ],
            // 189
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 17,
            ],
            // 190
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 17,
            ],
            // 191
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 17,
            ],
            // 192
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 17,
            ],
            // 193
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 17,
            ],
            // 194
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 17,
            ],
            // 195
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 17,
            ],
            // 196
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 17,
            ],
            // 197
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 17,
            ],
            // 198
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 17,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 18
            // 199
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 18,
            ],
            // 187
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 18,
            ],
            // 188
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 18,
            ],
            // 189
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 18,
            ],
            // 190
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 18,
            ],
            // 191
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 18,
            ],
            // 192
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 18,
            ],
            // 193
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 18,
            ],
            // 194
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 18,
            ],
            // 195
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 18,
            ],
            // 196
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 18,
            ],
            // 197
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 18,
            ],
            // 198
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 18,
            ],
            // 199
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 18,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 19
            // 200
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 19,
            ],
            // 201
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 19,
            ],
            // 202
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 19,
            ],
            // 203
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 19,
            ],
            // 204
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 19,
            ],
            // 205
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 19,
            ],
            // 206
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 19,
            ],
            // 207
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 19,
            ],
            // 208
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 19,
            ],
            // 209
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 19,
            ],
            // 210
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 19,
            ],
            // 211
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 19,
            ],
            // 212
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 19,
            ],
            // 213
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 19,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 20
            // 214
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 20,
            ],
            // 215
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 20,
            ],
            // 216
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 20,
            ],
            // 217
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 20,
            ],
            // 218
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 20,
            ],
            // 219
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 20,
            ],
            // 220
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 20,
            ],
            // 221
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 20,
            ],
            // 222
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 20,
            ],
            // 223
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 20,
            ],
            // 224
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 20,
            ],
            // 225
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 20,
            ],
            // 226
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 20,
            ],
            // 227
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 20,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 21
            // 228
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 21,
            ],
            // 229
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 21,
            ],
            // 230
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 21,
            ],
            // 231
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 21,
            ],
            // 232
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 21,
            ],
            // 233
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 21,
            ],
            // 234
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 21,
            ],
            // 235
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 21,
            ],
            // 236
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 21,
            ],
            // 237
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 21,
            ],
            // 238
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 21,
            ],
            // 239
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 21,
            ],
            // 240
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 21,
            ],
            // 241
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 21,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 22
            // 242
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 6,
                'product_id' => 22,
            ],
            // 243
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 7,
                'product_id' => 22,
            ],
            // 244
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 8,
                'product_id' => 22,
            ],
            // 245
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 9,
                'product_id' => 22,
            ],
            // 246
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 10,
                'product_id' => 22,
            ],
            // 247
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 11,
                'product_id' => 22,
            ],
            // 248
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 12,
                'product_id' => 22,
            ],
            // 249
            [
                'product_variant_id' => 2,
                'product_variant_value_id' => 13,
                'product_id' => 22,
            ],
            // 250
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 22,
            ],
            // 251
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 22,
            ],
            // 252
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 22,
            ],
            // 253
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 18,
                'product_id' => 22,
            ],
            // 254
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 19,
                'product_id' => 22,
            ],
            // 255
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 25,
                'product_id' => 22,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 23
            // 256
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 23,
            ],
            // 257
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 23,
            ],
            // 258
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 23,
            ],
            // 259
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 23,
            ],
            // 260
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 23,
            ],
            // 261
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 23,
            ],
            // 262
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 23,
            ],
            // 263
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 23,
            ],
            // 264
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 23,
            ],
            // 265
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 23,
            ],
            // 266
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 23,
            ],
            // 267
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 26,
                'product_id' => 23,
            ],
            // 268
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 27,
                'product_id' => 23,
            ],
            // 269
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 28,
                'product_id' => 23,
            ],
            // 270
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 29,
                'product_id' => 23,
            ],
            // 271
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 30,
                'product_id' => 23,
            ],
            // 272
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 31,
                'product_id' => 23,
            ],


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 24
            // 272
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 24,
            ],
            // 273
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 24,
            ],
            // 274
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 24,
            ],
            // 275
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 24,
            ],
            // 276
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 24,
            ],
            // 277
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 24,
            ],
            // 278
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 24,
            ],
            // 279
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 24,
            ],
            // 280
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 24,
            ],
            // 281
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 24,
            ],
            // 282
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 24,
            ],
            // 283
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 26,
                'product_id' => 24,
            ],
            // 284
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 27,
                'product_id' => 24,
            ],
            // 285
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 28,
                'product_id' => 24,
            ],
            // 286
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 29,
                'product_id' => 24,
            ],
            // 287
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 30,
                'product_id' => 24,
            ],
            // 288
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 31,
                'product_id' => 24,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 25
            // 289
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 25,
            ],
            // 290
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 25,
            ],
            // 291
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 25,
            ],
            // 292
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 25,
            ],
            // 293
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 25,
            ],
            // 294
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 25,
            ],
            // 295
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 25,
            ],
            // 296
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 25,
            ],
            // 297
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 25,
            ],
            // 298
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 25,
            ],
            // 299
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 25,
            ],
            // 300
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 26,
                'product_id' => 25,
            ],
            // 301
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 27,
                'product_id' => 25,
            ],
            // 302
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 28,
                'product_id' => 25,
            ],
            // 303
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 29,
                'product_id' => 25,
            ],
            // 304
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 30,
                'product_id' => 25,
            ],
            // 305
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 31,
                'product_id' => 25,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


             ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 26
            // 306
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 26,
            ],
            // 307
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 26,
            ],
            // 308
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 26,
            ],
            // 309
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 26,
            ],
            // 310
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 26,
            ],
            // 314
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 26,
            ],
            // 315
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 26,
            ],
            // 316
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 26,
            ],
            // 317
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 26,
                'product_id' => 26,
            ],
            // 318
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 27,
                'product_id' => 26,
            ],
            // 319
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 28,
                'product_id' => 26,
            ],
            // 320
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 29,
                'product_id' => 26,
            ],
            // 321
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 30,
                'product_id' => 26,
            ],
            // 322
            [
                'product_variant_id' => 5,
                'product_variant_value_id' => 31,
                'product_id' => 26,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 27
            // 323
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 27,
            ],
            // 324
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 27,
            ],
            // 325
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 27,
            ],
            // 326
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 27,
            ],
            // 327
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 27,
            ],
            // 328
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 27,
            ],
            // 329
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 27,
            ],
            // 330
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 27,
            ],
            // 331
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 27,
            ],
            // 332
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 27,
            ],
            // 333
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 27,
            ],
            // 334
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 27,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 28
            // 335
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 28,
            ],
            // 336
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 28,
            ],
            // 337
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 28,
            ],
            // 338
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 28,
            ],
            // 339
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 28,
            ],
            // 340
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 28,
            ],
            // 341
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 28,
            ],
            // 342
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 28,
            ],
            // 343
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 28,
            ],
            // 344
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 28,
            ],
            // 345
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 28,
            ],
            // 346
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 28,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////



            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 29
            // 347
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 1,
                'product_id' => 29,
            ],
            // 348
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 2,
                'product_id' => 29,
            ],
            // 349
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 3,
                'product_id' => 29,
            ],
            // 350
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 4,
                'product_id' => 29,
            ],
            // 351
            [
                'product_variant_id' => 1,
                'product_variant_value_id' => 5,
                'product_id' => 29,
            ],
            // 352
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 14,
                'product_id' => 29,
            ],
            // 353
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 15,
                'product_id' => 29,
            ],
            // 354
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 29,
            ],
            // 355
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 29,
            ],
            // 356
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 29,
            ],
            // 357
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 29,
            ],
            // 358
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 29,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////


            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 30
            // 359
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 30,
            ],
            // 360
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 30,
            ],
            // 361
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 20,
                'product_id' => 30,
            ],
            // 362
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 22,
                'product_id' => 30,
            ],
            // 363
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 30,
            ],
            // 364
            [
                'product_variant_id' => 6,
                'product_variant_value_id' => 32,
                'product_id' => 30,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////



             ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            // 31
            // 365
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 16,
                'product_id' => 31,
            ],
            // 366
            [
                'product_variant_id' => 3,
                'product_variant_value_id' => 17,
                'product_id' => 31,
            ],
            // 367
            [
                'product_variant_id' => 4,
                'product_variant_value_id' => 23,
                'product_id' => 31,
            ],
            // 368
            [
                'product_variant_id' => 6,
                'product_variant_value_id' => 33,
                'product_id' => 31,
            ],

            ///////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////

        ]);


        Schema::enableForeignKeyConstraints();
    }
}
