<?php

namespace App\Models\product\Traits;

trait ProductSearchTrait
{
    private $search;
    public function __construct()
    {
        $this->search =  request()->input('search');
    }
    public function searchByBrand($query)
    {
        return  $query->select('id', 'name', 'slug')->where('name', 'like',  '%' . $this->search . '%');
    }
    public function searchByColor($query)
    {

        return  $query->select('id', 'name', 'slug')->where('name', 'like', '%' . $this->search . '%');
    }

    public function searchByCategories($query)
    {

        return $query->select('id', 'name', 'slug')->where('name', 'like', '%' . $this->search . '%');
    }
}