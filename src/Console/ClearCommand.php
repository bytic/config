<?php

namespace Nip\Config\Console;

use ByTIC\Console\Command;

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
        $app = $this->getByticApp();
        if ($app->configurationIsCached()) {
            $path = $app->getCachedConfigPath();
            unlink($path);

            $this->info('Configuration cache cleared!');
            return;
        }
    }
}
