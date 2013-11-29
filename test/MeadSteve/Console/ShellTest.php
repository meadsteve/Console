<?php

use \MeadSteve\Console\Shell;

class ShellTest extends \Prophecy\PhpUnit\ProphecyTestCase
{
    /**
     * @var \MeadSteve\Console\Shell
     */
    protected $testedShell;

    protected function setUp()
    {
        parent::setUp();
    }

    public function testNewCommand_ReturnsCommandObject()
    {
        $this->testedShell = new Shell();
        $command = $this->testedShell->newCommand("git");
        $this->assertInstanceOf('\MeadSteve\Console\Command', $command);
    }

    public function testExecuteCommand_CallsExecuteUsingExecutor()
    {
        $expectedCommand = "hello";
        $expectedOutput = array("world");

        $mockedExecutor = $this->prophesize('\MeadSteve\Console\Executor');
        $mockedExecutor->execute($expectedCommand)->willReturn($expectedOutput);

        $this->testedShell = new Shell(null, null, $mockedExecutor->reveal());

        $output = $this->testedShell->executeCommand($expectedCommand);

        $this->assertEquals($expectedOutput, $output);
    }
}
 