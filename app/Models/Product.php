<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\ProductQuestion;
use App\Models\Product\ProductVariant;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [
        'related_categories',
        'related_images',
        'active_price',
        'photo_url',
        'rating_count',
    ];

    public function getRelatedCategoriesAttribute()
    {
        if (strlen($this->selected_categories)) {
            $json_categories_id = json_decode($this->selected_categories);
            $category = [];

            if ($json_categories_id) {
                foreach ($json_categories_id as $id) {
                    if (Category::where('id', $id)->exists()) {
                        array_push($category, Category::where('id', $id)->select('id', 'name')->first());
                    }
                }
                return $category;
            }
        }
        return [];
    }

    public function getRelatedImagesAttribute()
    {
        return ProductImage::where('product_id', $this->id)->get();
    }

    public function getPhotoUrlAttribute()
    {
        if ($this->related_images->count()) {
            return asset($this->related_images[0]['image_link'], true);
        }
        return '';
    }

    public function getActivePriceAttribute()
    {
        if ($this->discount && $this->discount['discount_last_date'] > Carbon::now()) {
            return $this->sales_price - $this->discount['discount_amount'];
        } else {
            return $this->sales_price;
        }
    }
    public function getRatingCountAttribute()
    {
        $totalRatingUser = $this->reviews()->count();
        $totalRating =  $this->reviews()->sum('star');
        if ($totalRatingUser > 0) {
            $rating = $totalRating / $totalRatingUser;
            return $rating;
        } else {
            return 0;
        }
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function questions()
    {
        return $this->hasMany(ProductQuestion::class, 'product_id');
    }

    public function related_image()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function discount()
    {
        return $this->hasOne(DiscountProduct::class)
            ->whereDate('discount_last_date', '>=', Carbon::now()->toDateTimeString())
            ->orderBy('id', 'DESC');
    }

    public function discounts()
    {
        return $this->hasMany(DiscountProduct::class, 'product_id')
            ->whereDate('discount_last_date', '>=', Carbon::now()->toDateTimeString())
            ->orderBy('id', 'DESC');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function product_brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function stocks()
    {
        return $this->hasMany(ProductStockLog::class, 'product_id')->where('type', '!=', 'sell');
    }

    public function product_tag()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'tag_id', 'product_id', 'id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(ProductStockLog::class, 'product_id')->where('type', 'sell');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productvariants()
    {
        return $this->belongsToMany(ProductVariant::class, 'product_variant_value_products', 'product_id', 'product_variant_id', 'id', 'id');
    }
}
