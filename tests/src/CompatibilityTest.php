<?php

namespace Nip\Config\Tests;

use Nip\Config\Config;
use Nip\Config\Console\CacheCommand;
use Nip\Config\Console\ClearCommand;
use Nip\Config\Exception\RuntimeException;
use Nip\Config\Factory;

class CompatibilityTest extends AbstractTest
{
    public function testLoadsPhpFileAsArrayAndConfig()
    {
        $path = TEST_FIXTURE_PATH.'/config.php';
        $data = ['database' => ['host' => 'localhost', 'port' => 3306]];

        self::assertSame($data, Factory::fromFile($path));
        $config = Factory::fromFile($path, true);
        self::assertInstanceOf(Config::class, $config);
        self::assertSame('localhost', $config->get('database.host'));
        self::assertSame(3306, $config['database.port']);
        self::assertSame('fallback', $config->get('database.missing', 'fallback'));
        self::assertSame($data, $config->toArray());
    }

    public function testReadOnlyConfigRejectsChanges()
    {
        $config = new Config(['key' => 'value']);

        $this->expectException(RuntimeException::class);
        $config->set('key', 'changed');
    }

    public function testMutableConfigMergesNestedValues()
    {
        $config = new Config(['database' => ['host' => 'localhost']], true);
        $config->merge(new Config(['database' => ['port' => 3306]]));
        $config->set('enabled', true);

        self::assertSame([
            'database' => ['host' => 'localhost', 'port' => 3306],
            'enabled' => true,
        ], $config->toArray());
    }

    public function testConsoleCommandsCanBeConstructed()
    {
        self::assertSame('config:cache', (new CacheCommand())->getName());
        self::assertSame('config:clear', (new ClearCommand())->getName());
    }
}
