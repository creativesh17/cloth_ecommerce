<?php

namespace App\Models\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuestion extends Model
{
    use HasFactory;

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id')->select('id', 'product_name');
    }
}
