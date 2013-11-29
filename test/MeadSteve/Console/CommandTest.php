<?php

use MeadSteve\Console\Command;

class CommandTest extends \Prophecy\PhpUnit\ProphecyTestCase
{

        public function testExecute_CallsExecutor()
    {
        $mockExecutor = $this->prophesize('MeadSteve\Console\Executor');
        $executeMethod = $mockExecutor->execute("git");

        $testedCommmand = new Command("git", $mockExecutor->reveal());
        $testedCommmand->execute();

        $executeMethod->shouldHaveBeenCalledTimes(1);
    }

    public function testaddArg_SingleArgAppendsToExecutedCommandWithSpaces()
    {
        $mockExecutor = $this->prophesize('MeadSteve\Console\Executor');
        $executeMethod = $mockExecutor->execute("git status");

        $testedCommmand = new Command("git", $mockExecutor->reveal());
        $testedCommmand->addArg('status')->execute();

        $executeMethod->shouldHaveBeenCalledTimes(1);
    }

        public function testaddArg_MultipleArgsAppendedToExecutedCommandWithSpaces()
    {
        $mockExecutor = $this->prophesize('MeadSteve\Console\Executor');
        $executeMethod = $mockExecutor->execute("testing 1 2");

        $testedCommmand = new Command("testing", $mockExecutor->reveal());
        $testedCommmand->addArg('1')->addArg('2')->execute();

        $executeMethod->shouldHaveBeenCalledTimes(1);
    }
}
 