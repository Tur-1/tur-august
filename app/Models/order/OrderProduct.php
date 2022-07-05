<?php

namespace App\Models\order;

use App\Models\product\SizeOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = "order_products";
    protected $fillable = [
        'order_id',
        'product_id',
        'size_id',
        'quantity',
        'total_price'
    ];
    public function size()
    {
        return $this->belongsTo(SizeOption::class, 'size_id');
    }
}