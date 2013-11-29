<?php

namespace MeadSteve\Console\Translators;


use MeadSteve\Console\Command;

class BasicTranslator implements CommandTranslator
{
    /**
     * @param \MeadSteve\Console\Command $command
     * @return string
     */
    public function translate(Command $command)
    {
        $parts = $command->getArgs();
        array_unshift($parts, $command->getCommand());
        return implode(' ',$parts);
    }

} 