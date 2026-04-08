<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_active',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
}
