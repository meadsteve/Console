<?php

namespace MeadSteve\Console\Translators;


use MeadSteve\Console\Command;
use MeadSteve\Console\Environment;

class FromLinuxTranslator extends BasicTranslator implements CommandTranslator
{
    /**
     * @var Environment
     */
    protected $environment;

    function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function translate(Command $command)
    {
        $commandString = $command->getCommand();
        $args = $command->getArgs();

        if ($this->environment->isWindows()) {
            return $this->buildWindowsString($commandString, $args);
        }
        else {
            return $this->buildString($commandString, $args);
        }
    }

    protected function buildWindowsString($commandString, array $args) {
        switch($commandString) {
            case 'ls':
                $commandString = 'dir';
                break;
            case 'which':
                $commandString = 'where';
                break;
        }

        return $this->buildString($commandString, $args);
    }
} 