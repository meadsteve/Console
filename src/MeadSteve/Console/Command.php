<?php

namespace MeadSteve\Console;


class Command
{
    /**
     * @var Executor
     */
    protected $executor;

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
     */
    function __construct($command, Executor $executor)
    {
        $this->command = $command;
        $this->executor = $executor;
    }

    /**
     * @param string $arg
     * @return $this
     */
    function addArg($arg) {
        $this->args[] = $arg;
        return $this;
    }

    /**
     * @return array
     */
    function execute() {
        $parts = $this->args;
        array_unshift($parts, $this->command);
        return $this->executor->execute(implode(' ',$parts));
    }
} 