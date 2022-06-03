<?php

namespace App\Models\product;

use App\Models\product\Product;
use App\Traits\HasProductsWithCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, HasProductsWithCount;


    protected $fillable = [
        'name',
        'image',
        'slug',
    ];


    public function getImageUrlAttribute()
    {
        return asset('storage/images/brands/' . $this->image);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}