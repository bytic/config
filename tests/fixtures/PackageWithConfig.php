<?php

namespace Nip\Config\Tests\Fixtures;

use Nip\Config\Utils\PackageHasConfigTrait;

/**
 * Class PackageWithConfig
 * @package Nip\Config\Tests\Fixtures
 */
class PackageWithConfig
{
    use PackageHasConfigTrait;

    /**
     * @param $name
     * @param null $default
     * @return mixed|\Nip\Config\Config|string|null
     */
    public function testConfig($name, $default = null)
    {
        return static::getPackageConfig($name, $default);
    }

    /**
     * @inheritDoc
     */
    protected static function getPackageConfigName()
    {
        return 'demo';
    }
}
