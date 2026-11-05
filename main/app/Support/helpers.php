<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Read a site setting (company details, SEO, social links...).
     */
    function setting($key, $default = '')
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('asset_url')) {
    /**
     * Build a public URL for a stored asset path (uploads, theme images).
     */
    function asset_url($path)
    {
        if (!$path) {
            return null;
        }

        if (preg_match('~^(https?:)?//~i', $path) || str_starts_with($path, 'data:')) {
            return $path;
        }

        return asset(ltrim($path, '/'));
    }
}
