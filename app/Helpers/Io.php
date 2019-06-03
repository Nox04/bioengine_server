<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Io
{
    public static function saveImageToCache($document, $base64Image)
    {
        return Storage::disk('local')->put(
            'cache/'.$document.'.bmp',
            base64_decode($base64Image)
        );
    }

    public static function deleteImageFromCache($document)
    {
        return Storage::delete('cache/'.$document.'.bmp');
    }
}
