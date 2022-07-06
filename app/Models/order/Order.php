<?php

namespace App\Models\order;

use App\Models\user\User;
use App\Models\product\Product;
use App\Models\order\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'coupon_id',
        'order_status_id',
        'shipping_fees',
        'subtotal',
        'total',

    ];


    public function address()
    {
        return $this->hasOne(OrderAddress::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id')->withDefault(['status' => 'pending']);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
            ->withPivot(['size_id', 'quantity', 'id', 'total_price'])
            ->WithMainProductImage()
            ->WithBrandName()
            ->with('sizeOptions');
    }
}