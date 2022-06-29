<?php

namespace App\Traits\Product;

use App\Models\product\Brand;
use App\Models\product\Color;
use App\Models\product\Category;
use App\Models\product\SizeOption;
use App\Models\product\ProductImage;
use App\Models\product\ProductReview;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ProductRelationshipsTrait
{
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

    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }
}