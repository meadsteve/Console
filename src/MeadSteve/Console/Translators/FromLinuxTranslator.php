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
        if ($this->environment->isWindows()) {
            $command = $this->toWindows($command);
        }
        return parent::translate($command);
    }

    protected function toWindows(Command $command) {
        $translatedCommand = clone $command;
        switch($command->getCommand()) {
            case 'ls':
                $translatedCommand->setCommand('dir');
                break;
            case 'which':
                $translatedCommand->setCommand('where');
                break;
        }

        return $translatedCommand;
    }
} 