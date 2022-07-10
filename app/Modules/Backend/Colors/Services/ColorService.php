<?php

namespace App\Modules\Backend\Colors\Services;

use Illuminate\Support\Str;
use App\Actions\Backend\StoreModelImageAction;

class ColorService
{

    private $imageFolder = 'colors';

    public function saveColor($color, $request)
    {


        $color->name = Str::title($request->name);
        $color->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $color->image = (new StoreModelImageAction)->saveImage($request, $this->getColorOldImagePath($color), $this->imageFolder);
        }
        $color->save();
    }
    public function getColorOldImagePath($color)
    {
        return $this->imageFolder . '/' . $color->image;
    }
}