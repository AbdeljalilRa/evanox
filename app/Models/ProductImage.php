<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'image_path',
    ];
    
    protected $appends = ['image_url'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->image_path && strlen($this->image_path) > 0) {
            try {
                /** @var FilesystemAdapter $disk */
                $disk = Storage::disk('s3');
                return $disk->temporaryUrl($this->image_path, now()->addMinutes(5));
            } catch (\Exception $e) {
                return asset('images/no-image.png');
            }
        }
        return asset('images/no-image.png');
    }
}