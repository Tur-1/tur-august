<?php

namespace App\Actions\Backend;

use App\Traits\FileUpload;

class StoreModelImageAction
{
    use FileUpload;

    public function saveImage($request, $oldPath, $imageFolder)
    {

        $this->deletePreviousImage($oldPath);
        return  $this->uploadImageInStorage($request->file('image'), $imageFolder);
    }
}