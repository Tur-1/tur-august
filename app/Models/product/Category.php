<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $casts = [
        'parents_ids' => 'array',
        'is_section' => 'boolean',
        'is_active' => 'boolean'

    ];

    public static function tree()
    {

        $allCategories =  Category::get();

        $sections =  $allCategories->where('is_section', true);

        self::formatTree($sections, $allCategories);
        return $allCategories;
    }
    public static function formatTree($sections, $allCategories)
    {
        foreach ($sections as $key => $section) {

            $section['children'] =  $allCategories->where('parent_id', $section['id'])->values();

            if (!empty($section['children'])) {
                self::formatTree($section['children'], $allCategories);
            }
        }
    }


    public function scopeHasProducts($query)
    {
        return $query->whereHas('products', fn ($q) => $q->select('id'));
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category',  'category_id', 'product_id');
    }
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/images/categories/' . $this->image) : asset('assets/images/defult-input-image.png');
    }
}