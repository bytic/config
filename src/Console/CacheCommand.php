<?php

namespace Nip\Config\Console;

use ByTIC\Console\Command;
use Exception;
use LogicException;
use Nip\Container\Container;
use Symfony\Component\Console\Input\ArrayInput;
use Throwable;

/**
 * Class CacheCommand
 * @package Nip\Config\Console
 */
class CacheCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName('config:cache');
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function handle()
    {
        $command = $this->getApplication()->find('config:clear');
        $returnCode = $command->run((new ArrayInput([])), $this->output);

        $config = $this->getFreshConfiguration();

        $app = Container::getInstance()->get('app');
        $configPath = $app->getCachedConfigPath();

        file_put_contents(
            $configPath,
            '<?php return '.var_export($config, true).';'.PHP_EOL
        );

        try {
            $data = require $configPath;
            if (!is_array($data) || count($data) < 1) {
                throw new Exception();
            }
        } catch (Throwable $e) {
            unlink($configPath);

            throw new LogicException('Your configuration files are not serializable.', 0, $e);
        }

        $this->info('Configuration cached successfully!');

        return 0;
    }

    /**
     * Boot a fresh copy of the application configuration.
     *
     * @return array
     */
    protected function getFreshConfiguration()
    {
        $app = Container::getInstance()->get('app');
        $app->bootstrap();

        return config()->toArray();
    }
}
