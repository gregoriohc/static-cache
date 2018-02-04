<?php

namespace Gregoriohc\StaticCache;

class Cache
{
    protected static $data = [];

    /**
     * @param string $key
     * @param null|\Closure|mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        if (!static::has($key)) {
            if (is_null($default)) {
                throw new \OutOfBoundsException("Cache key {$key} does not exists");
            }

            return $default instanceof \Closure ? $default() : $default;
        }

        return static::$data[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        static::$data[$key] = $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function has($key)
    {
        return array_key_exists($key, static::$data);
    }

    /**
     * @param string $key
     */
    public static function forget($key)
    {
        if (static::has($key)) {
            unset(static::$data[$key]);
        }
    }

    /**
     * @param string $key
     * @param \Closure $callback
     * @return mixed
     */
    public static function remember($key, $callback)
    {
        if (!static::has($key)) {
            static::set($key, $callback());
        }

        return static::$data[$key];
    }
}
