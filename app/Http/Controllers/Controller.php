<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Generate new filename
     */
    public function getNewFileName($file)
    {
        $extension  = $file->extension();
        $name       = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $rand_num   = substr(rand(), 0, 5);
        $filename   = $name . '-' . $rand_num . '.' . $extension;

        return $filename;
    }

    /**
     * Upload file using new optional storage disk
     *
     * @param string $path   To specify the directory that file have been uploaded in public/uploads, ex: 'posts'
     * @param string $file   Pass the file that have been uploaded
     * @param string $filename  (optional) creating a filename to file, if isn't passed then automatic generate filename
     */
    public function uploadFile($path, $file, $filename = null)
    {
        if(is_null($filename)) {
            $filename = $this->getNewFileName($file);
        }
        $uploaded = Storage::disk('upload')->putFileAs($path, $file, $filename);
        return $filename; 
    }
}
