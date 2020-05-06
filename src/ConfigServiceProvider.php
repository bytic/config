<?php

namespace Nip\Config;

use Bytic\Scheduler\Console\ListCommand;
use Bytic\Scheduler\Console\PublishCommand;
use Bytic\Scheduler\Console\RunEventCommand;
use Bytic\Scheduler\Drivers\CrontabDriver;
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
            ListCommand::class,
            PublishCommand::class,
            RunEventCommand::class
        );
    }
}
