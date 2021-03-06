<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->addCommands(
    [
        new \Kata\Command\EncryptionCommand()
    ]
);

$application->run();