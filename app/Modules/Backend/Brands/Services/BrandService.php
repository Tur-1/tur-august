<?php

namespace App\Modules\Backend\Brands\Services;

use Illuminate\Support\Str;
use App\Actions\Backend\StoreModelImageAction;

class BrandService
{

    private $imageFolder = 'brands';


    public function saveBrand($brand, $request)
    {

        $brand->name = Str::title($request->name);
        $brand->slug = Str::slug($request->name);
        $brand->image = (new StoreModelImageAction)->saveImage($request, $this->getBrandOldImagePath($brand), $this->imageFolder);
        $brand->save();
    }
    public function getBrandOldImagePath($brand)
    {
        return $this->imageFolder . '/' . $brand->image;
    }
}