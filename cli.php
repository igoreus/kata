<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new \Kata\AppBundle\Command\EncryptionCommand());

$application->run();