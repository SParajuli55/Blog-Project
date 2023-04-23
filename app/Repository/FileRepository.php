<?php

namespace App\Repository;

use File;
class FileRepository
{
    public function saveFile($request,$name,$path)
    {
        if ($request->hasFile($name)) {
            $this->createDirectory($path);
            $file = $request[$name];
            $filename = time() .rand(10000,99999). '.' . $file->getClientOriginalExtension();
            $file->move($this->filePath, $filename);
            return $filename;
        }
    }

    public function createDirectory($path)
    {
        $paths = [
            'file_path' =>"uploads/files/".$path."/",
        ];
        foreach ($paths as $path) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $this->filePath = $paths['file_path'];
        }
    }

    public function removeFile($file,$name,$path)
    {
        $paths = [
            'file_path' =>"uploads/files/".$path."/",
        ];

        foreach ($paths as $path) {
            if (file_exists($path . $file[$name])) {
                unlink($path . $file[$name]);
            }
        }

    }

}
