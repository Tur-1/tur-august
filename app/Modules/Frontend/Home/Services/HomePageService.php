<?php

namespace App\Modules\Frontend\Home\Services;

use App\Models\Banner\Banner;
use App\Models\product\Brand;
use App\Models\product\Product;
use App\Modules\Frontend\Home\Http\Resources\HomeBannerResource;
use App\Modules\Frontend\Shop\Http\Resources\ShopProductsResource;

class HomePageService
{
    public  $brands;
    public  $banners;

    public function getLatestProducts()
    {
        $products =   Product::WithShopPageFields()
            ->WithMainProductImage()
            ->Active()
            ->take(20)
            ->latest()
            ->get();


        $products->each(function ($product) {
            $product->brand_name = $this->brands[$product->brand_id];
        });


        return  ShopProductsResource::collection($products)->resolve();
    }
    public function getBanners()
    {
        return  Banner::where('is_active', true)->get();
    }

    public function getSmallBanners($banners)
    {
        return $banners->where('type', 'small');
    }
    public function getMediumBanners($banners)
    {
        return  HomeBannerResource::collection($banners->where('type', 'medium'));
    }
    public function getLargeBanners($banners)
    {

        return  HomeBannerResource::collection($banners->where('type', 'large'));
    }
    public function getBrands()
    {
        $brands =  Brand::get();

        $this->brands  = $brands->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->name];
        });

        return $brands;
    }
}