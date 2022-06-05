<?php

namespace App\Models\product;

use App\Traits\ActiveModel;
use App\Traits\ProductModelScopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, ActiveModel, ProductModelScopes;


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
    public function sizeOptions(): BelongsToMany
    {
        return $this->belongsToMany(SizeOption::class, 'product_size_options', 'product_id', 'size_id')->withPivot(['id', 'stock']);
    }

    public function stockSizeOptions(): BelongsToMany
    {
        return $this->belongsToMany(SizeOption::class, 'product_size_options', 'product_id', 'size_id')
            ->wherePivot('stock', '!=', 0)
            ->withPivot(['id', 'stock']);
    }
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}