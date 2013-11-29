<?php

use \MeadSteve\Console\Shell;

class ShellTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \MeadSteve\Console\Shell
     */
    protected $testedShell;

    protected function setUp()
    {
        $this->testedShell = new Shell();
    }

    public function testNewCommand_ReturnsCommandObject()
    {
        $command = $this->testedShell->newCommand("git");
        $this->assertInstanceOf('\MeadSteve\Console\Command', $command);
    }

}
 