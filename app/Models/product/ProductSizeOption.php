<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeOption extends Model
{
    use HasFactory;
    protected $table = "product_size_options";
    public $timestamps = false;
    protected  $keyType = 'string';
    protected $fillable = [
        'product_id',
        'size_id',
        'stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function size()
    {
        return $this->belongsTo(SizeOption::class);
    }
}