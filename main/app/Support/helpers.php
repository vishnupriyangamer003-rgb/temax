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

if (!function_exists('format_phone')) {
    /**
     * Format Indian phone/mobile numbers with standard spacing and country code (+91 XXXXX XXXXX).
     */
    function format_phone($phone)
    {
        $trimmed = trim((string) $phone);
        if ($trimmed === '') {
            return '';
        }

        if (str_contains($trimmed, ',')) {
            return implode(', ', array_map('format_phone', explode(',', $trimmed)));
        }

        $digits = preg_replace('/\D/', '', $trimmed);

        if (str_starts_with($digits, '91') && strlen($digits) === 12) {
            $sub = substr($digits, 2);
            if (preg_match('/^[6-9]/', $sub)) {
                return '+91 ' . substr($sub, 0, 5) . ' ' . substr($sub, 5);
            }
            return '+91 ' . substr($sub, 0, 4) . ' ' . substr($sub, 4);
        }

        if (str_starts_with($digits, '0') && strlen($digits) === 11) {
            $sub = substr($digits, 1);
            if (preg_match('/^[6-9]/', $sub)) {
                return '+91 ' . substr($sub, 0, 5) . ' ' . substr($sub, 5);
            }
            return '+91 ' . substr($sub, 0, 4) . ' ' . substr($sub, 4);
        }

        if (strlen($digits) === 10) {
            if (preg_match('/^[6-9]/', $digits)) {
                return '+91 ' . substr($digits, 0, 5) . ' ' . substr($digits, 5);
            }
            return '+91 ' . substr($digits, 0, 4) . ' ' . substr($digits, 4);
        }

        return $trimmed;
    }
}
