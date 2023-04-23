<?php

namespace App\Repository;

use File;
use Image;

class ImageRepository
{
    public function saveImage($request,$name,$path)
    {
       // dd($name);
        if ($request->hasFile($name)) {
            $this->createDirectory($path);
            $file = $request[$name];
           // dd($file);
            $image = Image::make($file);
           // dd($image);
           $imagename = time().rand(100000,999999).'.' . $file->getClientOriginalExtension();
            $image->save($this->imagePath . $imagename);
            $image->resize(400, 400);
            $image->save($this->thumbnailPath . $imagename);
            return $imagename;
        }
    }

    public function createDirectory($path)
    {
        // dd($path);
        $paths = [
            'image_path' => "uploads/images/".$path."/",
            'thumbnail_path' =>"uploads/images/".$path."/thumbnail/",
        ];
        foreach ($paths as $path) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $this->imagePath = $paths['image_path'];
            $this->thumbnailPath = $paths['thumbnail_path'];
        }
    }

    public function removeImage($image,$name,$path)
    {
        $paths = [
            'image_path' => "uploads/images/".$path."/",
            'thumbnail_image_path' => "uploads/images/".$path."/thumbnail/",
        ];

        foreach ($paths as $path) {
            if (file_exists($path . $image[$name])) {
                unlink($path . $image[$name]);
            }
        }

    }

}
