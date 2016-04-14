<?php

namespace Kata\BracketCheck;

/*
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
class BracketCheckArraySplice implements BracketCheck
{
    /** @var array  */
    private $brackets = [
        '{' => '}',
        '(' => ')',
        '[' => ']',
        '<' => '>',
    ];


    /**
     * @param $str
     * @return bool
     */
    public function check($str)
    {
        $arr = str_split($str);

        while(count($arr)) {
            $index = -1;
            for ($i = 0; $i < count($arr); $i++) {

                if (isset($this->brackets[$arr[$i]]) && $arr[$i+1] == $this->brackets[$arr[$i]]) {
                    $index = $i;
                    array_splice($arr, $i,  2);
                    break;
                }
            }
            if ($index == -1) {

                return false;
            }
        }

        return true;
    }
}




