<?php

namespace App\Modules\Backend\Banners\Services;

use Illuminate\Support\Str;
use App\Actions\Backend\StoreModelImageAction;

class BannerService
{

    private $imageFolder = 'banners';


    public function saveBanner($banner, $request)
    {

        $banner->title = Str::title($request->title);
        $banner->type = $request->type;
        $banner->link =  $request->link;
        $banner->is_active = isset($request->publich) ? true : false;
        if ($request->hasFile('image')) {
            $banner->image = (new StoreModelImageAction)->saveImage($request, $this->getBannerOldImagePath($banner), $this->imageFolder);
        }

        $banner->save();
    }
    public function getBannerOldImagePath($banner)
    {
        return $this->imageFolder . '/' . $banner->image;
    }
}