<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeOption extends Model
{
    use HasFactory;
    protected $table = "product_size_option";
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'size_id',
        'stock',
    ];
}