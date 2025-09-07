<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Filesystem\FilesystemAdapter;

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
    protected $appends = ['image_url', 'gallery_urls'];
    // Generate slug before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // Helper methods
    public function getDiscountedPrice()
    {
        if ($this->discount_percentage > 0) {
            return $this->price * (1 - $this->discount_percentage / 100);
        }
        return $this->price;
    }



   
    // Accessor for gallery images URLs
    public function getGalleryUrlsAttribute()
{
    return $this->images->map(function ($image) {
        $cacheKey = 'product_image_temp_url_' . $image->id;
        return Cache::remember($cacheKey, 60, function () use ($image) {
            if ($image->image_path && strlen($image->image_path) > 0) {
                try {
                    $disk = Storage::disk('s3');
                    return $disk->temporaryUrl($image->image_path, now()->addMinutes(5));
                } catch (\Exception $e) {
                    return asset('images/no-image.png');
                }
            }
            return asset('images/no-image.png');
        });
    });
}
}
