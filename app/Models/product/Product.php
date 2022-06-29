<?php

namespace App\Models\product;

use App\Traits\ActiveModel;
use App\Traits\Product\ProductRelationshipsTrait;
use App\Traits\Product\ProductTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,
        ActiveModel,
        ProductTrait,
        ProductRelationshipsTrait;

    protected $appends = ['main_image_url'];


    protected $fillable = [
        'stock',

    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}