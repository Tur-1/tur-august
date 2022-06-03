<?php

namespace App\Traits;

trait HasProductsWithCount
{
    private $category_id;
    private $firstParamKey;
    private $firstParamValues;
    public function scopeCountProducts($query, $category_id)
    {
        return $query->withCount(['products' => fn ($query) => $query->WhereCategory($category_id)]);
    }

    public function scopeHasProducts($query, $category_id)
    {
        return $query->whereHas('products', fn ($query) => $query->WhereCategory($category_id));
    }

    public function scopeWhereHasProductsWithCount($query, $category_id)
    {
        return $query->HasProducts($category_id)->CountProducts($category_id);
    }



    public function scopeWhere_Has_Products_Based_On_First_Param_Key($query, $category_id, $firstParamKey, $firstParamValues)
    {
        $this->category_id = $category_id;
        $this->firstParamKey = $firstParamKey;
        $this->firstParamValues = $firstParamValues;


        return $query->WhereHasRequestParam()->WithCountRequestParam();
    }
    public function scopeWhereHasRequestParam($query)
    {
        return $query->whereHas('products', function ($product) {
            $product->whereHas($this->firstParamKey, function ($query) {
                $query->whereIn('slug', $this->firstParamValues);
            })->WhereCategory($this->category_id);
        });
    }
    public function scopeWithCountRequestParam($query)
    {
        return $query->withCount(['products' =>  function ($product) {
            $product->whereHas($this->firstParamKey, function ($query) {
                $query->whereIn('slug', $this->firstParamValues);
            })->WhereCategory($this->category_id);
        }]);
    }
}