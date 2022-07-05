<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\product\Traits\ProductAccessorsTrait;
use App\Models\product\Traits\ProductRelationshipsTrait;
use App\Models\product\Traits\ProductScopesTrait;


class Product extends Model
{
    use HasFactory,
        ProductScopesTrait,
        ProductAccessorsTrait,
        ProductRelationshipsTrait;

    protected $appends = ['main_image_url'];


    protected $fillable = [
        'stock',

    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}