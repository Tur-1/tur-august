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

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/images/order_status/' . $this->image) : null;
    }
}