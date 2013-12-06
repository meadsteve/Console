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
        return $this->buildString($command->getCommand(), $command->getArgs());
    }

    protected function buildString($commandString, array $args)
    {
        array_unshift($args, $commandString);
        return implode(' ', $args);
    }

} 