<?php
require_once __DIR__ . '/vendor/autoload.php';

use Kata\BracketCheck\BracketCheckArraySplice;
use Kata\BracketCheck\BracketCheckArraySearch;
use Kata\GreedyFlorist;

$strList = [
    '((((((((([[[<>]]])))))))))',
    '[[[[]]()]]',
    '((({<()>}[])))',
    '(())[<[>]])',
];

echo 'Encription: ' . PHP_EOL;
echo 'Bracket check (ArraySplice):' . PHP_EOL;
$bracketCheck = new BracketCheckArraySplice();
foreach ($strList as $str) {
    $res = $bracketCheck->check($str);
    echo sprintf('%s => %s', $str, $res === true ? 'YES' : 'NO') . PHP_EOL;
}

echo 'Bracket check (ArraySearch):' . PHP_EOL;
$bracketCheck = new BracketCheckArraySearch();
foreach ($strList as $str) {
    $res = $bracketCheck->check($str);
    echo sprintf('%s => %s', $str, $res === true ? 'YES' : 'NO') . PHP_EOL;
}

echo 'Greedy Florist:' . PHP_EOL;
$greedyFlorist = new GreedyFlorist(3, [6, 2, 5]);

echo sprintf('3 friends, 3 flowers, cost [6, 2, 5]; sum: %s', $greedyFlorist ->calculate());

