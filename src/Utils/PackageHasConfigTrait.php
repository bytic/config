<?php

namespace Nip\Config\Utils;

use Nip\Config\Config;

/**
 * Trait PackageHasConfigTrait
 * @package Nip\Config\Utils
 */
trait PackageHasConfigTrait
{
    protected static $config = null;

    /**
     * @param null $name
     * @param null $default
     * @return mixed|Config|string|null
     */
    protected static function getPackageConfig($name = null, $default = null)
    {
        $config = static::getConfig();
        $name = static::getPackageConfigName().($name ? '.'.$name : '');

        return $config->get($name, $default);
    }

    /**
     * @return string
     */
    abstract protected static function getPackageConfigName();

    /**
     * @return Config
     */
    protected static function getConfig()
    {
        if (static::$config === null) {
            static::setConfig(static::generateConfig());
        }

        return static::$config;
    }

    /**
     * @return Config
     */
    protected static function generateConfig()
    {
        if (function_exists('config')) {
            try {
                return \config();
            } catch (\Exception $e) {
            }
        }

        return new Config();
    }

    /**
     * @param Config|array $config
     */
    public static function setConfig($config)
    {
        if (is_array($config)) {
            $config = new Config($config);
        }
        self::$config = $config;
    }

    public static function resetConfig()
    {
        static::$config = null;
    }
}
