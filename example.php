<?php
require_once __DIR__ .  "/vendor/autoload.php";

$shell = new MeadSteve\Console\Shells\BasicShell();

$gitStatus = $shell->newCommand('git')->addArg('status')->execute();
echo implode("\n", $gitStatus);

echo PHP_EOL . PHP_EOL . "And Another way:" . PHP_EOL . PHP_EOL;

$gitStatus = $shell->executeCommand('git', array('status'));
echo implode("\n", $gitStatus);
