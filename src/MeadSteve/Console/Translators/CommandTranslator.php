<?php

namespace MeadSteve\Console\Translators;

use MeadSteve\Console\Command;

interface CommandTranslator {

    /**
     * @param \MeadSteve\Console\Command $command
     * @return string
     */
    public function translate(Command $command);
} 