<?php

namespace MeadSteve\Console\Shells;

use MeadSteve\Console\Environment;
use MeadSteve\Console\Executor;
use MeadSteve\Console\Translators\BasicTranslator;
use MeadSteve\Console\Translators\FromLinuxTranslator;

class LinuxShell extends BasicShell implements Shell
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

    function __construct(Environment $environment = null, Executor $executor = null)
    {
        if ($environment) {
            $this->environment = $environment;
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

        // If the environment is linux then we don't need to do anything
        // special to the commands.
        if ($this->environment->isLinux()) {
            $this->translator = new BasicTranslator();
        }
        else {
            $this->translator = new FromLinuxTranslator();
        }
    }


} 