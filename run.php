<?php
require_once __DIR__ . '/vendor/autoload.php';

use Kata\BracketCheck;

$strList = [
    '((((((((([[[<>]]])))))))))',
    '[[[[]]()]]',
    '((({<()>}[])))',
    '(())[<[>]])',
];

$bracketCheck = new BracketCheck($strList);
var_dump($bracketCheck->run());