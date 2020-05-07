<?php

namespace Nip\Config;

use Nip\Config\Console\CacheCommand;
use Nip\Config\Console\ClearCommand;
use Nip\Container\ServiceProviders\Providers\AbstractSignatureServiceProvider;

/**
 * Class ConfigServiceProvider
 * @package g
 */
class ConfigServiceProvider extends AbstractSignatureServiceProvider
{
    /**
     * @inheritdoc
     */
    public function provides()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function register()
    {
    }

    protected function registerCommands()
    {
        $this->commands(
            CacheCommand::class,
            ClearCommand::class
        );
    }
}
