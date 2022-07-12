<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

trait FileUpload
{

    public function uploadImageInStorage($ImageRequest, $Folder): string
    {
        $newImageName = $this->generateUniqueImageName($ImageRequest);

        $path =    $ImageRequest->storeAs('images/' . $Folder, $newImageName, 's3');
        Storage::disk('s3')->setVisibility($path, 'public');


        return $newImageName;
    }

    public function generateUniqueImageName($ImageRequest): string
    {
        $time = time();
        $NewImageName =   $time . '-' . str_replace(' ', '-',  $ImageRequest->getClientOriginalName());
        return $NewImageName;
    }

    public function deletePreviousImage($imagePath)
    {

        if ($this->isImageExists('images/' . $imagePath)) {

            Storage::disk('s3')->delete('images/' . $imagePath);
        }
    }
    public function isImageExists($imagePath)
    {
        return Storage::disk('s3')->exists($imagePath);
    }
    public function destroyModelWithImage($model, $imagePath)
    {
        $model->delete();
        if (isEmpty($model)) {
            Storage::disk('s3')->delete('images/' . $imagePath);
        }
    }
}