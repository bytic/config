<?php

namespace Nip\Config\Tests;

use Nip\Config\Config;

/**
 * Class ApplicationTest
 */
class ConfigTest extends AbstractTest
{

    /**
     * @var Config
     */
    protected $config;

    /**
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->config = new Config();
    }

    public function testMergeFile()
    {
        static::assertInstanceOf(Config::class, $this->config);
        static::assertEquals([], $this->config->toArray());

        $this->config->mergeFile(TEST_FIXTURE_PATH.'/general.ini');

        static::assertInstanceOf(Config::class, $this->config);
        static::assertCount(6, $this->config->toArray());
        static::assertInstanceOf(Config::class, $this->config->get('SITE'));
        static::assertTrue($this->config->has('META'));
        static::assertTrue($this->config->has('META.title'));
        static::assertEquals('My Site', $this->config->get('META')->get('title'));
        static::assertEquals('My Site', $this->config->get('META.title'));
        static::assertFalse($this->config->has('META.title1'));
    }
}
