<?php

namespace Nip\Config\Console;

use ByTIC\Console\Command;
use Nip\Container\Container;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ClearCommand
 * @package Nip\Config\Console
 */
class ClearCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('config:clear');
    }

    /**
     * @inheritDoc
     */
    protected function handle()
    {
        $app = Container::getInstance()->get('app');
        if ($app->configurationIsCached()) {
            $path = $app->getCachedConfigPath();

            $this->info('Configuration cache cleared!');
            return;
        }
    }
}
