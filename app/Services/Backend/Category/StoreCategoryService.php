<?php

namespace App\Services\Backend\Category;

use Illuminate\Support\Str;
use App\Actions\Backend\StoreModelImageAction;

class StoreCategoryService
{
    private $imageFolder = 'categories';
    public function saveCategory($category, $request)
    {
        if (is_null($request['category_id']) || empty($request['category_id'])) {
            $parentId = $request['section_id'];
        } else {

            $parentId = $request['category_id'];
        }
        $parentCategory = app('allCategories')->where("id",  $parentId)->first();
        $ids = $parentCategory['parents_ids'] ?? [intval($parentId)];

        $ids[] = $parentCategory['id'];


        $categorySlug = $parentCategory['slug'];

        $category->parents_ids = array_unique($ids);
        $category->section_id = $request['section_id'];
        $category->parent_id = $parentId;
        $category->name = Str::title($request['name']);
        $category->slug =  $categorySlug . '-' . Str::slug($request['name'], '_');
        $category->meta_keywords = $request['meta_keywords'];
        $category->meta_title = $request['meta_title'];
        $category->meta_description = $request['meta_description'];


        $category->image =  (new StoreModelImageAction)->saveImage($request, $this->getCategoryOldImagePath($category), $this->imageFolder);
        $category->save();
    }
    public function getCategoryOldImagePath($category)
    {
        return $this->imageFolder . '/' . $category->image;
    }
}