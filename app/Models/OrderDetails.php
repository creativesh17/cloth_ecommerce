<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user associated with the OrderDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function product_selected_column()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')
            ->select('id', 'sales_price', 'purchase_price');
    }
}
