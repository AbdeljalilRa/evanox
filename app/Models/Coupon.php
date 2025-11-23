<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Coupon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'slug',
        'email',
        'type',              // fixed | percent
        'value',
        'usage_limit',
        'used_count',
        'min_order_amount',
        'starts_at',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Use slug instead of ID in routes
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Auto-generate slug from code
     */
    protected static function booted()
    {
        static::creating(function ($coupon) {
            if (empty($coupon->slug)) {
                $coupon->slug = static::generateUniqueSlug($coupon->code);
            }
        });

        static::updating(function ($coupon) {
            if ($coupon->isDirty('code')) {  
                // regenerate only if code changed
                $coupon->slug = static::generateUniqueSlug($coupon->code);
            }
        });
    }

    /**
     * Generate unique slug
     */
    public static function generateUniqueSlug($code)
    {
        $slug = Str::slug($code);
        $original = $slug;

        $count = 1;
        while (static::where('slug', $slug)->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }

    // Check if coupon is expired
    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    // Check if coupon is active
    public function isActive()
    {
        return $this->is_active === true;
    }

    // Check if usage limit reached
    public function isUsedUp()
    {
        return $this->usage_limit !== null &&
               $this->used_count >= $this->usage_limit;
    }

    // Check if coupon has started
    public function hasStarted()
    {
        return !$this->starts_at || $this->starts_at->isPast();
    }

    // Validate coupon for a specific user
    public function isValidForUser($user)
    {
        if (!$this->isActive()) return false;
        if ($this->isExpired()) return false;
        if ($this->isUsedUp()) return false;
        if (!$this->hasStarted()) return false;

        if ($this->email && $this->email !== $user->email) {
            return false;
        }

        return true;
    }

    // Apply coupon to amount
    public function applyDiscount($amount)
    {
        if ($this->type === 'percent') {
            return $amount - ($amount * ($this->value / 100));
        }

        if ($this->type === 'fixed') {
            return max(0, $amount - $this->value);
        }

        return $amount;
    }
}
