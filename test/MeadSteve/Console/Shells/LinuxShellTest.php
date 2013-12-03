<?php

use \MeadSteve\Console\Shells\LinuxShell;

class LinuxShellTest extends \Prophecy\PhpUnit\ProphecyTestCase
{
    /**
     * @var \MeadSteve\Console\Shells\LinuxShell
     */
    protected $testedShell;

    protected function setUp()
    {
        parent::setUp();
    }

    public function testNewCommand_ReturnsCommandObject()
    {
        $this->testedShell = new LinuxShell();
        $command = $this->testedShell->newCommand("git");
        $this->assertInstanceOf('\MeadSteve\Console\Command', $command);
    }

    public function testExecuteCommand_CallsExecuteUsingExecutor()
    {
        $expectedCommand = "hello";
        $expectedOutput = array("world");

        $mockedExecutor = $this->prophesize('\MeadSteve\Console\Executor');
        $mockedExecutor->execute($expectedCommand)->willReturn($expectedOutput);

        $this->testedShell = new LinuxShell(null, $mockedExecutor->reveal());

        $output = $this->testedShell->executeCommand($expectedCommand);

        $this->assertEquals($expectedOutput, $output);
    }
}
 