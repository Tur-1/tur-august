<?php

namespace App\Actions\Backend;

use App\Traits\FileUpload;

class StoreModelImageAction
{
    use FileUpload;

    public function saveImage($request, $oldPath, $imageFolder): string
    {
        if ($request->hasFile('image')) {

            $this->deletePreviousImage($oldPath);
            $newImageName = $this->uploadImageInStorage($request->file('image'), $imageFolder);
        }

        return $newImageName;
    }
}