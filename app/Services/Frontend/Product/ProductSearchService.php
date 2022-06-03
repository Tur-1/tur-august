<?php

namespace App\Services\Frontend\Product;

class ProductSearchService
{
    private $search;
    public function __construct()
    {
        $this->search =  request()->input('search');
    }
    public function searchByBrand($query)
    {
        $query->select('id', 'name', 'slug')->where('name', 'like',  '%' . $this->search . '%');
    }
    public function searchByColor($query)
    {

        $query->select('id', 'name', 'slug')->where('name', 'like', '%' . $this->search . '%');
    }

    public function searchByCategory($query)
    {

        $query->select('id', 'name', 'slug')->where('name', 'like', '%' . $this->search . '%');
    }
}