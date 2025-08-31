<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'discount_percentage',
        'stock',
        'file_path',
        'is_active',
        'category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Generate slug before saving
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Helper methods
    public function getDiscountedPrice()
    {
        if ($this->discount_percentage > 0) {
            return $this->price * (1 - $this->discount_percentage / 100);
        }
        return $this->price;
    }
}