<?php

namespace Kata\BracketCheck;

/*
 * @author Igor Veremchuk igor.veremchuk@gmail.com
 */
class BracketCheckImplementationTwo implements BracketCheck
{
    /** @var array */
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
        $count = count($arr);

        while ($count) {
            $index = -1;
            $currentKey = null;
            $previousVal = null;

            foreach ($arr as $key => &$val) {

                if (isset($currentKey)) {
                    $previousVal = $currentVal;
                    $previousKey = $currentKey;
                }
                $currentVal = $val;
                $currentKey = $key;

                if (isset($this->brackets[$previousVal]) && $currentVal == $this->brackets[$previousVal]) {
                    $index = $key;
                    unset($arr[$previousKey]);
                    unset($arr[$currentKey]);
                    $count -= 2;
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
