<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Handles media uploads for both deployment layouts this project supports:
 *  - document root at the project root (assets live in <root>/assets)
 *  - document root at <app>/public (assets live in public/uploads)
 */
class Uploader
{
    public static function assetsRoot()
    {
        $rootAssets = dirname(base_path()) . DIRECTORY_SEPARATOR . 'assets';

        if (is_dir($rootAssets)) {
            return $rootAssets;
        }

        return public_path();
    }

    public static function prefix()
    {
        return self::assetsRoot() === public_path() ? '' : 'assets/';
    }

    /**
     * Store an uploaded image and return its relative public path.
     */
    public static function store(UploadedFile $file = null, $folder = 'general')
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $directory = self::assetsRoot() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $folder;

        if (!is_dir($directory)) {
            @mkdir($directory, 0775, true);
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: 'jpg');
        $name = date('YmdHis') . '_' . Str::random(8) . '.' . $extension;

        $file->move($directory, $name);

        return self::prefix() . 'uploads/' . $folder . '/' . $name;
    }

    /**
     * Delete a previously uploaded file. Original template images are never touched.
     */
    public static function delete($path)
    {
        if (!$path || preg_match('~^(https?:)?//~i', $path)) {
            return;
        }

        $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);

        if (strpos($path, 'uploads' . DIRECTORY_SEPARATOR) === false) {
            return;
        }

        $full = dirname(base_path()) . DIRECTORY_SEPARATOR . $path;

        if (is_file($full)) {
            @unlink($full);
        }
    }
}
