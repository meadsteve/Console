<?php
require_once __DIR__ .  "/vendor/autoload.php";

$shell = new MeadSteve\Console\Shell();

$gitStatus = $shell->newCommand('git')->addArg('status')->execute();

echo implode("\n", $gitStatus);