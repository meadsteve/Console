<?php

use \MeadSteve\Console\Translators\FromLinuxTranslator;

class FromLinuxTranslatorTest extends \Prophecy\PhpUnit\ProphecyTestCase
{
    /**
     * @var FromLinuxTranslator
     */
    protected $testedTranslator;

    protected function setUp()
    {
        parent::setUp();
        $this->testedTranslator = new FromLinuxTranslator();
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
}
 