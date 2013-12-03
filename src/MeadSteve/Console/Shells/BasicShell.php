<?php

namespace MeadSteve\Console\Shells;

use MeadSteve\Console\Command;
use MeadSteve\Console\Environment;
use MeadSteve\Console\Executor;
use MeadSteve\Console\Translators\CommandTranslator;
use MeadSteve\Console\Translators\BasicTranslator;

class BasicShell
{
    /**
     * @var Executor
     */
    protected $executor;

    /**
     * @var Environment
     */
    protected $environment;

    /**
     * @var \MeadSteve\Console\Translators\CommandTranslator
     */
    protected $translator;

    function __construct(
        CommandTranslator $translator = null,
        Environment $env = null,
        Executor $executor = null
    )
    {
        if ($translator) {
            $this->translator = $translator;
        }
        else {
            $this->translator = new BasicTranslator();
        }

        if ($env) {
            $this->environment = $env;
        }
        else {
            $this->environment = new Environment();
        }

        if ($executor) {
            $this->executor = $executor;
        }
        else {
            $this->executor = new Executor();
        }
    }

    /**
     * @param string $command
     * @return Command
     */
    public function newCommand($command)
    {
        return new Command($command, $this->executor, $this->translator);
    }

    /**
     * @param string $command
     * @param array $args
     * @return array
     */
    public function executeCommand($command, $args = array())
    {
        $command = $this->newCommand($command);
        foreach($args as $arg) {
            $command->addArg($arg);
        }

        return $command->execute();
    }
} 