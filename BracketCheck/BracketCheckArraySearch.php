<?php

namespace Kata\BracketCheck;

/*
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
class BracketCheckArraySearch implements BracketCheck
{
    /** @var array  */
    private $brackets = [
        '{' => '}',
        '(' => ')',
        '[' => ']',
        '<' => '>',
    ];

    public function check($str)
    {
        $a = [];
        $strlen = strlen($str);
        for ($i = 0;  $i < $strlen; $i++) {
            if (isset($this->brackets[$str[$i]])) {
                $a[$str[$i]][] = $i;
            } else {
                $maxKey = array_search($str[$i], $this->brackets);
                foreach ($a as $key => $val) {
                    if (end($a[$maxKey]) < end($val)) {
                        return false;
                    }
                }
                array_pop($a[$maxKey]);

            }

        }

        return true;
    }
}




