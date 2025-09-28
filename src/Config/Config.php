<?php

declare(strict_types=1);

namespace CronMh\Config;

use Exception;

class Config
{
    private static $config = [];

    public static function load(string $filepath)
    {
        if (file_exists($filepath)) {
            self::$config = require $filepath;
        } else {
            throw new Exception("Config file not found");
        }

    }

    public static function get(string $key, $default = null)
    {
        $parts = explode('.', $key);
        $value = self::$config;

        foreach ($parts as $part) {
            if (is_array($value) && array_key_exists($part, $value)) {
                $value = $value[$part];
            } else {
                return $default;
            }
        }

        return $value;
    }
}
