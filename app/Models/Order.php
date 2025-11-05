<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'total',
        'order_status',
        'payment_status',
        'payment_method',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the stripe payments
     */
    public function stripePayments()
    {
        return $this->hasMany(StripePayment::class);
    }

    /**
     * Get the coupons associated with this order
     */
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class, 'order_coupons')
                    ->withPivot('discount_amount')
                    ->withTimestamps();
    }

    /**
     * Calculate total quantity of items in order
     */
    public function getTotalQuantityAttribute()
    {
        return $this->orderItems->sum('quantity');
    }

    /**
     * Get formatted order status
     */
    public function getFormattedStatusAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->order_status));
    }

    /**
     * Get formatted payment status
     */
    public function getFormattedPaymentStatusAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->payment_status));
    }
}
