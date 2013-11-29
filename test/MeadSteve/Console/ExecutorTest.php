<?php

class ExecutorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \MeadSteve\Console\Executor
     */
    protected $testedExecutor;

    protected function setUp()
    {
        $this->testedExecutor = new MeadSteve\Console\Executor();
    }

    function testExecute_ThrowsExceptionOnInvalidCommand()
    {
        $this->setExpectedException(
            'MeadSteve\Console\Exceptions\ExecutionError',
            "git: 'foobar' is not a git command. See 'git --help'."
        );
        $this->testedExecutor->execute("git foobar");
    }

    function testExecute_ReturnsArrayOnValidCommand()
    {
        $output = $this->testedExecutor->execute("git status");
        $this->assertInternalType('array', $output);
    }
}
 