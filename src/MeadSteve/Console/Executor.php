<?php

namespace MeadSteve\Console;

use MeadSteve\Console\Exceptions\ExecutionError;

class Executor
{
    /**
     * Calls command using exec(). On less than zero response code an
     * exception will be thrown.
     *
     * @param $command
     * @return array output of command.
     * @throws Exceptions\ExecutionError
     */
    function execute($command) {
        $output = array();
        $result = null;

        // Redirect standard error to stdout so we can do something with
        // it.
        $command .= " 2>&1";

        exec($command, $output, $result);

        if ($result !== 0) {
            throw new ExecutionError(implode("\t", $output));
        }
        return $output;
    }
} 