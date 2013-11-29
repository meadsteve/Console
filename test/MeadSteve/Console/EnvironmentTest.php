<?php

use MeadSteve\Console\Environment;

class EnvironmentTest extends PHPUnit_Framework_TestCase
{
    const WINDOWS_32 = "WIN32";
    const WINDOWS_NT = "WINNT";
    const WINDOWS_WINDOWS = "Windows";

    const LINUX_LINUX = "Linux";

    function testIsWindows_ReturnsTrueInWindowsEnvironment()
    {
        $testedEnvironment = new Environment(self::WINDOWS_WINDOWS);
        $isWindows = $testedEnvironment->isWindows();
        $this->assertTrue($isWindows);
    }

    function testIsWindows_ReturnsTrueInWindowsNTEnvironment()
    {
        $testedEnvironment = new Environment(self::WINDOWS_NT);
        $isWindows = $testedEnvironment->isWindows();
        $this->assertTrue($isWindows);
    }

    function testIsWindows_ReturnsFalseInLinuxEnvironment()
    {
        $testedEnvironment = new Environment(self::LINUX_LINUX);
        $isWindows = $testedEnvironment->isWindows();
        $this->assertFalse($isWindows);
    }

    function testIsLinux_ReturnsTrueInLinuxEnvironment()
    {
        $testedEnvironment = new Environment(self::LINUX_LINUX);
        $isLinux = $testedEnvironment->isLinux();
        $this->assertTrue($isLinux);
    }

    function testIsLinux_ReturnsFalseInWinNTEnvironment()
    {
        $testedEnvironment = new Environment(self::WINDOWS_NT);
        $isLinux = $testedEnvironment->isLinux();
        $this->assertFalse($isLinux);
    }

    function testIsUnixLike_ReturnsTrueInLinuxEnvironment()
    {
        $testedEnvironment = new Environment(self::LINUX_LINUX);
        $isUnixLike = $testedEnvironment->isUnixLike();
        $this->assertTrue($isUnixLike);
    }

    function testIsUnixLike_ReturnsFalseInWinNTEnvironment()
    {
        $testedEnvironment = new Environment(self::WINDOWS_NT);
        $isUnixLike = $testedEnvironment->isUnixLike();
        $this->assertFalse($isUnixLike);
    }

}
 