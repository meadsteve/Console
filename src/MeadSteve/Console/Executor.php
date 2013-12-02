<?php

namespace MeadSteve\Console;

use MeadSteve\Console\Exceptions\ExecutionError;
use MeadSteve\Console\Exceptions\CommandNotFoundError;

class Executor
{
    const RESULT_CODE_COMMAND_NOT_FOUND = 127;

    /**
     * Calls command using exec(). On less than zero response code an
     * exception will be thrown.
     *
     * @param $command
     * @return array output of command.
     * @throws Exceptions\ExecutionError|Exceptions\CommandNotFoundError
     */
    function execute($command) {
        $output = array();
        $result = null;

        // Redirect standard error to stdout so we can do something with
        // it.
        $command .= " 2>&1";

        exec($command, $output, $result);

        if ($result !== 0) {
            if ($result === self::RESULT_CODE_COMMAND_NOT_FOUND) {
                throw new CommandNotFoundError(implode("\t", $output));
            }
            else {
                throw new ExecutionError(implode("\t", $output));
            }
        }
        return $output;
    }
} 