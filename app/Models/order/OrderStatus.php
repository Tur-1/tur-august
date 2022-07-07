<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_status_id')->withCount('products');
    }
    public function scopeWithOrders($query)
    {
        return $query->with(
            [
                'orders' => fn ($query) => $query->with('status:id,name', 'user:id,name')
            ]
        )
            ->WithOrdersCount();
    }
    public function scopeWithOrdersCount($query)
    {
        return $query->withCount('orders');
    }
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/images/order_status/' . $this->image) : null;
    }
}