<?php

namespace MeadSteve\Console\Shells;

interface Shell
{
    /**
     * @param string $command
     * @return \MeadSteve\Console\Command
     */
    public function newCommand($command);

    /**
     * @param string $command
     * @param array $args
     * @return array
     */
    public function executeCommand($command, $args = array());
}