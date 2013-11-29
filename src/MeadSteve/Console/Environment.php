<?php

namespace MeadSteve\Console;

/**
 * Used to determine the nature of the operating system that php is running on.
 *
 * Class Environment
 * @package MeadSteve\Console
 */
class Environment
{
    const PREFIX_WINDOWS = "win";
    const PREFIX_LINUX = "linux";

    protected $osString;

    /**
     * @param null|string $osString If omitted will take the value of PHP_OS.
     */
    function __construct($osString = null)
    {
        if ($osString === null) {
            $this->osString = PHP_OS;
        }
        else {
            $this->osString = $osString;
        }
    }

    /**
     * @return bool
     */
    function IsWindows() {
        return substr(strtolower($this->osString), 0, 3) == self::PREFIX_WINDOWS;
    }

    /**
     * @return bool
     */
    function IsLinux() {
        if (substr(strtolower($this->osString), 0, 5) == self::PREFIX_LINUX) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    function IsUnixLike() {
        if (substr(strtolower($this->osString), 0, 5) == self::PREFIX_LINUX) {
            return true;
        }
        return false;
    }
} 