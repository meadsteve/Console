<?php

namespace MeadSteve\Console;


use MeadSteve\Console\Translators\BasicTranslator;

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

    /**
     * @var Translators\CommandTranslator
     */
    protected $translator;

    function __construct(
        Translators\CommandTranslator $translator = null,
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

    public function newCommand($command)
    {
        return new Command($command, $this->executor, $this->translator);
    }
} 