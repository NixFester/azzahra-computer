<?php

namespace App\Traits;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait CompressesImages
{
    /**
     * Compress image and store as JPG with 75% quality
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $directory  Directory within storage/app/public
     * @param  int  $quality  Quality percentage (default: 75)
     * @return string Path to stored file
     */
    protected function compressAndStore($file, $directory = 'images', $quality = 75)
    {
        $filename = time().'_'.uniqid().'.jpg';
        $path = $directory.'/'.$filename;

        // Create image manager with GD driver
        $manager = new ImageManager(new Driver);

        // Read image, convert to JPG with specified quality, and save
        $image = $manager->read($file);
        $image->toJpeg($quality)->save(storage_path('app/public/'.$path));

        return $path;
    }
}
