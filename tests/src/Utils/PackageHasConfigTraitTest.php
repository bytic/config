<?php

namespace Nip\Config\Tests\Utils;

use Nip\Config\Tests\AbstractTest;
use Nip\Config\Tests\Fixtures\PackageWithConfig;

/**
 * Class PackageHasConfigTraitTest
 * @package Nip\Config\Tests\Utils
 */
class PackageHasConfigTraitTest extends AbstractTest
{
    public function test_getPackageConfig()
    {
        $package = new PackageWithConfig();
        $package::setConfig([
            'demo' => ['option1' => 1],
        ]);

        self::assertSame(1, $package->testConfig('option1'));
        self::assertSame('default', $package->testConfig('option2', 'default'));
    }
}
