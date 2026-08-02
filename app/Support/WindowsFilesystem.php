<?php

namespace App\Support;

use Illuminate\Filesystem\Filesystem;

class WindowsFilesystem extends Filesystem
{
    /**
     * Determine if a file or directory exists.
     *
     * @param  string  $path
     * @return bool
     */
    public function exists($path)
    {
        try {
            // Use error control operator to prevent open_basedir errors on Windows
            return @file_exists($path);
        } catch (\Throwable $e) {
            return false;
        }
    }
}
