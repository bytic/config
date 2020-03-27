<?php

use Nip\Container\Container;

if (!function_exists('config')) {

    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param array|string $key
     * @param mixed $default
     * @return \Nip\Config\Config|mixed
     */
    function config($key = null, $default = null)
    {
        $container = function_exists('app') ? app() : Container::getInstance();
        if (!$container) {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new Exception("No container was found for config function");
        }

        $config = $container->get('config');
        if (!$config) {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new Exception("No Config was found in the container");
        }

        if (is_null($key)) {
            return $config;
        }
        if (is_array($key)) {
            return $config->set($key);
        }

        return $config->get($key, $default);
    }
}
