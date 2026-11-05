<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    protected static $cache = null;

    public static function allCached()
    {
        if (static::$cache === null) {
            try {
                static::$cache = static::query()->pluck('value', 'key')->all();
            } catch (\Throwable $e) {
                static::$cache = [];
            }
        }

        return static::$cache;
    }

    public static function get($key, $default = '')
    {
        $all = static::allCached();

        if (array_key_exists($key, $all) && $all[$key] !== null && $all[$key] !== '') {
            return $all[$key];
        }

        return $default;
    }

    public static function put($key, $value)
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        static::$cache = null;
    }

    public static function flush()
    {
        static::$cache = null;
    }
}
