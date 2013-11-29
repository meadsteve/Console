<?php

namespace MeadSteve\Console;


class Shell
{
    /**
     * @var Executor
     */
    protected $executor;

    /**
     * @var Environment
     */
    protected $environment;

    function __construct(Environment $env = null, Executor $executor = null)
    {
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

    public function newCommand($command)
    {
        return new Command($command, $this->executor);
    }
} 