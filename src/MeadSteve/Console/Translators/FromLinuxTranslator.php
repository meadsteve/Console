<?php

namespace MeadSteve\Console\Translators;


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

} 