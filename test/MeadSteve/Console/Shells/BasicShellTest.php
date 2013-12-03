<?php

use \MeadSteve\Console\Shells\BasicShell;

class BasicShellTest extends \Prophecy\PhpUnit\ProphecyTestCase
{
    /**
     * @var \MeadSteve\Console\BasicShell
     */
    protected $testedShell;

    protected function setUp()
    {
        parent::setUp();
    }

    public function testNewCommand_ReturnsCommandObject()
    {
        $this->testedShell = new BasicShell();
        $command = $this->testedShell->newCommand("git");
        $this->assertInstanceOf('\MeadSteve\Console\Command', $command);
    }

    public function testExecuteCommand_CallsExecuteUsingExecutor()
    {
        $expectedCommand = "hello";
        $expectedOutput = array("world");

        $mockedExecutor = $this->prophesize('\MeadSteve\Console\Executor');
        $mockedExecutor->execute($expectedCommand)->willReturn($expectedOutput);

        $this->testedShell = new BasicShell(null, null, $mockedExecutor->reveal());

        $output = $this->testedShell->executeCommand($expectedCommand);

        $this->assertEquals($expectedOutput, $output);
    }
}
 