<?php

namespace App\Modules\Backend\SizeOptions\Services;

use Illuminate\Support\Str;

class SizeOptionsService
{


    public function saveSizeOption($sizeOption, $request)
    {
        $sizeOption->name = Str::upper($request->name);
        $sizeOption->slug =  str::slug($request->name);
        $sizeOption->save();
    }
}