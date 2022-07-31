<?php

namespace App\Models\product\Traits;

trait ProductSearchTrait
{

    public function searchByBrand($query)
    {

        return  $query->select('id', 'name', 'slug')->where('name', 'like',  '%' . request()->input('search') . '%');
    }
    public function searchByColor($query)
    {

        return  $query->select('id', 'name', 'slug')->where('name', 'like', '%' . request()->input('search') . '%');
    }

    public function searchByCategories($query)
    {

        return $query->select('id', 'name', 'slug')->where('name', 'like', '%' . request()->input('search') . '%');
    }
}