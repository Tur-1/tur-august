<?php

namespace App\Models\product;

use App\Models\product\Product;
use App\Traits\HasProductsWithCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SizeOption extends Model
{
    use HasFactory, HasProductsWithCount;
    public $timestamps = false;


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size_options', 'size_id', 'product_id')
            ->wherePivot('stock', '!=', 0)
            ->withPivot(['id', 'stock']);
    }
}