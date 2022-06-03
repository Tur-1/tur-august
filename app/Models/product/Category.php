<?php

namespace App\Models\product;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

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

        $allCategories =  Category::HasProducts()->get();

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
}