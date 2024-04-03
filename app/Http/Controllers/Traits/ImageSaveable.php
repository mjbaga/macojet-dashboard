<?php

namespace App\Http\Controllers\Traits;

trait ImageSaveable
{
    public function saveImage($request, $validatedData, $imageFieldName, $imageDb)
    {
        if($request->file($imageFieldName)) {
            $file = $request->file($imageFieldName);
            $path = $file->store($imageDb, 'private');

            $validatedData[$imageDb] = $path;
        }

        return $validatedData;
    }
}