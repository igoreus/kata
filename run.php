<?php
require_once __DIR__ . '/vendor/autoload.php';

use Kata\BracketCheck;
use Kata\GreedyFlorist;

$strList = [
    '((((((((([[[<>]]])))))))))',
    '[[[[]]()]]',
    '((({<()>}[])))',
    '(())[<[>]])',
];

$bracketCheck = new BracketCheck();

echo 'Bracket check:' .PHP_EOL;
foreach ($strList as $str) {
    $res = $bracketCheck->check($str);
    echo sprintf('%s => %s', $str, $res === true ? 'YES' : 'NO'). PHP_EOL;
}
echo 'Greedy Florist:' .PHP_EOL;
$greedyFlorist = new GreedyFlorist(3, [6, 2, 5]);

echo sprintf('3 frends, 3 flowers, cost [6, 2, 5]; sum: %s', $greedyFlorist ->calculate());

