<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'details',
        'image',
        'price',
        'original_price',
        'featured',
        'is_active',
        'stock',
        'sku',
        'category_id',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    /**
     * Get the discount percentage
     */
    public function getDiscountPercentAttribute()
    {
        if ($this->original_price) {
            return round((($this->original_price - $this->price) / $this->original_price) * 100);
        }
        return 0;
    }

    /**
     * Format price with currency
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0) . 'đ';
    }

    /**
     * Format original price with currency
     */
    public function getFormattedOriginalPriceAttribute()
    {
        if ($this->original_price) {
            return number_format($this->original_price, 0) . 'đ';
        }
        return null;
    }
}

