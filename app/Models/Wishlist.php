<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $guarded = [];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function product(){
        return $this->hasOne(Product::class, "id", "product_id");
    }


}