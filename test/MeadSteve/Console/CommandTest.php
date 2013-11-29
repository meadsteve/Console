<?php

use MeadSteve\Console\Command;
use \Prophecy\Argument;

class CommandTest extends \Prophecy\PhpUnit\ProphecyTestCase
{

    public function testExecute_CallsExecutorWithTranslatorResult()
    {
        $commandToRun = "git";
        $commandAfterTranslation = "git-";

        $mockTranslator = $this->prophesize('MeadSteve\Console\Translators\BasicTranslator');
        $translateMethod = $mockTranslator->translate(Argument::type('MeadSteve\Console\Command'))
                                          ->willReturn($commandAfterTranslation);

        $mockExecutor = $this->prophesize('MeadSteve\Console\Executor');
        $executeMethod = $mockExecutor->execute($commandAfterTranslation);

        $testedCommmand = new Command(
            $commandToRun,
            $mockExecutor->reveal(),
            $mockTranslator->reveal()
        );

        $testedCommmand->execute();

        $executeMethod->shouldHaveBeenCalledTimes(1);
        $translateMethod->shouldHaveBeenCalledTimes(1);
    }
}
 