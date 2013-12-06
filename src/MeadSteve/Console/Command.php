<?php

namespace MeadSteve\Console;

use MeadSteve\Console\Translators\CommandTranslator;

class Command
{
    /**
     * @var Executor
     */
    protected $executor;

    /**
     * @var \MeadSteve\Console\Translators\CommandTranslator
     */
    protected $translator;

    /**
     * @var string
     */
    protected $command;

    /**
     * @var array
     */
    protected $args = array();

    /**
     * @param string $command
     * @param Executor $executor
     * @param Translators\CommandTranslator $translator
     */
    function __construct(
        $command,
        Executor $executor,
        CommandTranslator $translator
    )
    {
        $this->command = $command;
        $this->executor = $executor;
        $this->translator = $translator;
    }

    /**
     * @param string $arg
     * @return $this
     */
    function addArg($arg) {
        $this->args[] = $arg;
        return $this;
    }

    function getArgs() {
        return $this->args;
    }

    function getCommand() {
        return $this->command;
    }

    /**
     * @return array
     */
    function execute() {
        return $this->executor->execute(
            $this->translator->translate($this)
        );
    }
} 