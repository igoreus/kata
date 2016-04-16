<?php

namespace Kata\BracketCheck;

/*
 * @author Igor Veremchuk igor.veremchuk@gmail.com
 */
use Kata\Util\StopWatch;

class BracketCheckImplementationOne implements BracketCheck
{
    /** @var array  */
    private $brackets = [
        '{' => '}',
        '(' => ')',
        '[' => ']',
        '<' => '>',
    ];
    /** @var array  */
    private $revertBrackets = [
        '}' => '{',
        ')' => '(',
        ']' => '[',
        '>' => '<',
    ];

    public function check($str)
    {
        $a = [];
        foreach ($this->brackets as $openBracket => $closeBracket) {
            $a[$openBracket] = [
                'indexes' => [],
                'lastIndex' => 0,
                'OpenBracketCount' => 0,
                'CloseBracketCount' => 0,
            ];
        }

        $strlen = strlen($str);

        for ($i = 0;  $i < $strlen; $i++) {
            if (isset($this->brackets[$str[$i]])) {
                $a[$str[$i]]['indexes'][] = $i;
                $a[$str[$i]]['lastIndex'] = $i;
                ++$a[$str[$i]]['OpenBracketCount'];

            } else {
                ++$a[$this->revertBrackets[$str[$i]]]['CloseBracketCount'];
                $currentBracket = $this->revertBrackets[$str[$i]];
                if (!isset($a[$currentBracket])) {
                    return false;
                }
                $lastIndex = array_pop($a[$currentBracket]['indexes']);
                foreach ($a as $key => $val) {
                    if ($lastIndex < $val['lastIndex']) {
                        return false;
                    }
                }

                $a[$currentBracket]['lastIndex'] = end($a[$currentBracket]['indexes']);
            }
        }

        foreach ($a as $key => $val) {
            if ($val['OpenBracketCount'] != $val['CloseBracketCount']) {
                return false;
            }
        }

        return true;
    }
}




