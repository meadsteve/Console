<?php

use \MeadSteve\Console\Translators\FromLinuxTranslator;

class FromLinuxTranslatorTest extends \Prophecy\PhpUnit\ProphecyTestCase
{
    /**
     * @var FromLinuxTranslator
     */
    protected $testedTranslator;

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    protected $mockEnvironment;

    protected function setUp()
    {
        parent::setUp();
        $this->mockEnvironment = $this->prophesize('\MeadSteve\Console\Environment');
        $this->testedTranslator = new FromLinuxTranslator($this->mockEnvironment->reveal());
    }

    public function testTranslate_ReturnsJustTheCommandAsStringWithNoArgs()
    {
        $expectedCommandString = 'git';
        $command = $this->prophesize('\MeadSteve\Console\Command');
        $command->getCommand()->willReturn($expectedCommandString);
        $command->getArgs()->willReturn(array());

        $translatedCommand = $this->testedTranslator->translate(
            $command->reveal()
        );

        $this->assertEquals($expectedCommandString, $translatedCommand);
    }

    public function testTranslate_SeparatesSingleArgWithSpace()
    {
        $command = $this->prophesize('\MeadSteve\Console\Command');
        $command->getCommand()->willReturn('testing');
        $command->getArgs()->willReturn(array('1'));

        $translatedCommand = $this->testedTranslator->translate(
            $command->reveal()
        );

        $this->assertEquals('testing 1', $translatedCommand);
    }

    public function testTranslate_SeparatesMultipleArgsWithSpaces()
    {
        $command = $this->prophesize('\MeadSteve\Console\Command');
        $command->getCommand()->willReturn('testing');
        $command->getArgs()->willReturn(array('1', '2'));

        $translatedCommand = $this->testedTranslator->translate(
            $command->reveal()
        );

        $this->assertEquals('testing 1 2', $translatedCommand);
    }

    public function testTranslate_SwitchedLstoDirOnWindows()
    {
        $this->mockEnvironment->isWindows()->willReturn(true);

        $command = $this->prophesize('\MeadSteve\Console\Command');
        $command->getCommand()->willReturn("ls");
        $command->getArgs()->willReturn(array());

        $translatedCommand = $this->testedTranslator->translate(
            $command->reveal()
        );

        $this->assertEquals('dir', $translatedCommand);
    }

    public function testTranslate_SwitchedWhichtoWhereOnWindows()
    {
        $this->mockEnvironment->isWindows()->willReturn(true);

        $command = $this->prophesize('\MeadSteve\Console\Command');
        $command->getCommand()->willReturn("which");
        $command->getArgs()->willReturn(array());

        $translatedCommand = $this->testedTranslator->translate(
            $command->reveal()
        );

        $this->assertEquals('where', $translatedCommand);
    }

}
 